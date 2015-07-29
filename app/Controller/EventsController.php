<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventsController extends AppController {

	var $name = 'Events';

    public $components = array('RequestHandler', 'Paginator');

    var $paginate = array(
            'recursive' => -1,
            'contain' => array(
                'EventType' => array(
                    'fields' => array('color', 'name')
                ),
                'Meal'
            ),
            'fields' => array('id', 'status', 'details', 'start', 'end', 'all_day')
    );

    public function calendar(){

    }

    public function index(){
        $this->Paginator->settings = $this->paginate;
        $events = $this->Paginator->paginate('Event', array('Event.restaurant_id' => $this->Auth->user('restaurant_id')));

        $this->set(array('events' => $events));
    }

    public function view($id = null) {
        if (!$this->Event->exists($id)) {
            $this->Session->setFlash(__('Invalid event', true));
            $this->redirect(array('action' => 'index'));
        }
        $event = $this->Event->findEvent($id);
        $this->set(array('event' => $event));
    }

    public function add() {
        if ($this->request->is('post')) {
            //resets the model state
            $this->Event->create();
            //updates the new event data with the user restaurant
            $this->request->data['Event']['restaurant_id'] = $this->Auth->user('restaurant_id');
            //if its an event "Refeição"
            if($this->request->data['Event']['event_type_id'] == 0) {
                //if the event model has been saved
                if ($this->Event->save($this->request->data)) {
                    //construct the array of Meals for the event been saved
                    $data = array(
                        'EventsMeal' => array(
                            'meal_id' => $this->request->data['Event']['meal_id'],
                            'event_id' => $this->Event->getLastInsertID()
                        )
                    );
                    //if the meal of the event has been associated, Everything's OK !!
                    if($this->Event->EventsMeal->save($data)){
                        $this->Session->setFlash(__('Sua refeição foi salva com sucesso.'));
                        return $this->redirect(array('action' => 'index'));
                    }
                    else{   //if not delete the last event added and message the user
                        $this->Event->delete($this->Event->getLastInsertID());
                        $this->Session->setFlash(__('Esta refeição não pode ser vinculado a este evento, por favor tente novamente.'));
                    }
                }
                $this->Session->setFlash(__('Houve algo de errado ao salvar seu evento, por favor tente novamente.'));
                return $this->redirect(array('action' => 'index'));
            //if its an event "Lembrete"
            } else if($this->request->data['Event']['event_type_id'] == 1) {
                //creates a php date object from the start value and add 1 hour to it
                $date = new DateTime($this->request->data['Event']['start']);
                $date->add(new DateInterval('PT01H'));
                //resets the model state
                $this->Event->create();
                //sets end value as the new date
                $this->request->data['Event']['end'] = $date->format('Y-m-d H:i:s');
                //sets status 'confirmado'
                $this->request->data['Event']['status'] = 'confirmado';
                //if 'Lembrete' event is saved Everything's OK !!
                if($this->Event->save($this->request->data)) {
                    $this->Session->setFlash(__('Seu lembrete foi salvo com sucesso.'));
                    return $this->redirect(array('action' => 'calendar'));
                //if not message the user
                }else {
                    $this->Session->setFlash(__('Seu lembrete não pode ser salvo, tente novamente.'));
                    return $this->redirect(array('action' => 'calendar'));
                }
            }
        }
        $eventTypes = $this->Event->EventType->find('list', array('conditions' => array('EventType.name' => array('Refeição', 'Lembrete'))));
        $meals = $this->Event->Meal->find('list', array('conditions' => array('Meal.restaurant_id' => $this->Auth->user('restaurant_id'), 'Meal.status' => 1)));
        $this->set(compact('eventTypes', 'meals'));
    }

    public function edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid meals for event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Event->save($this->request->data)) {
                $response[] = array('response' =>'Seu evento foi editado com sucesso.');
                $this->response->body('Ok, seu evento foi salvo com sucesso.');
                $this->response->statusCode(200);
                $this->response->send();
            } else {
                $response[] = array('response' =>'Erro ao editar o evento.');
                $this->response->body('nao rolou');
                $this->response->statusCode(500);
                $this->response->send();
            }
        } else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }

    }

    public function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Este evento não existe!', true));
            $this->redirect(array('action'=>'index'));
        }
        $event = $this->Event->findById($id);

        if(!$event['Event']['event_type_id']) {
            if($event['Event']['status'] == 'confirmado'){
                $this->Session->setFlash(__('Esta refeição já foi concluída e não pode ser deletada dos históricos'));
                $this->redirect(array('action'=>'view', $id));
            }
        }

        if($event['Event']['event_type_id'] == 2) {
            $this->Session->setFlash(__('Este é um evento de reajuste em estoque e como tal não pode ser deletado.', true));
            $this->redirect(array('action'=>'view', $id));
        }

        if ($this->Event->delete($id)) {
            $this->Session->setFlash(__('Evento deletado com sucesso', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Houve um erro durante o processo, por favor tente novamente.', true));
        $this->redirect(array('action'=>'view', $id));
    }

    public function get_all() {
        $events = $this->Event->find(
            'all',
            array(
                'conditions' => array('Event.restaurant_id' => $this->Auth->user('restaurant_id')),
                'recursive' => 0,
                'contain' => array(
                    'EventType' => array(
                        'fields' => array('color', 'name')
                    ),
                    'Meal' => array()
                ),
                'fields' => array('id', 'status', 'details', 'start', 'end', 'all_day')
            )
        );

        foreach($events as $event) {
            if($event['Event']['all_day'] == 1) {
                $allday = true;
                $end = $event['Event']['start'];
            } else {
                $allday = false;
                $end = $event['Event']['end'];
            }
            $data[] = array(
                'id' => $event['Event']['id'],
                'type' => $event['EventType']['name'],
                'start'=> $event['Event']['start'],
                'details'=> $event['Event']['details'],
                'status'=> $event['Event']['status'],
                'end' => $end,
                'allDay' => $allday,
                'meal' => ($event['Meal']) ? $event['Meal'][0]['code'] : '',
                'url' => Router::url('/').'events/view/'.$event['Event']['id'],
                'className' => $event['EventType']['color']
            );
        }
        echo json_encode($data);
        $this->autoRender = false;
	}

    public function output_meal($meal_id = null, $event_id = null){

        $mealIngredients = $this->Event->constructIngredientsArray($meal_id);
        $event = $this->Event->findById($event_id);

        $this->set(array('mealIngredients' => $mealIngredients, 'event' => $event, 'meal_id' => $meal_id));
    }

    public function output($meal_id = null, $event_id = null) {
        $this->autoRender = false;

        $mealIngredients = $this->Event->constructIngredientsArray($meal_id);

        $data_product_model = array();
        $data_output_model = array();

        $timezone = date_default_timezone_get();
        date_default_timezone_set($timezone);
        $today = date('Y-m-d');

        foreach($mealIngredients as $ingredient):
            if(!$ingredient['canOutput']) {
                $this->Session->setFlash(__('Não pudemos dar baixa, há ingredientes ultrapassando a quantidade disponível em estoque.', true));
                $this->redirect(array('action' => 'view', $event_id));
            }
            $data_product_model[] = array(
                'id' => $ingredient['product_id'],
                'load_stock' => $ingredient['load_stock'] - $ingredient['output']
            );
            $data_output_model[] = array(
                'load_stock' => $ingredient['load_stock'] - $ingredient['output'],
                'quantity' => $ingredient['output'],
                'date_of_submission' => $today,
                'product_id' => $ingredient['product_id'],
                'event_id' => $event_id
            );
        endforeach;

        $this->Event->create();
        $this->Event->id = $event_id;
        $this->Event->ProductOutput->create();

        if($this->Event->ProductOutput->saveMany($data_output_model)) {
            if($this->Event->saveField('status', 'confirmado')) {
                if($this->Event->ProductOutput->Product->saveMany($data_product_model)) {
                    $this->Session->setFlash(__('A baixa em estoque desta refeição foi realizada com sucesso.', true));
                    $this->redirect(array('action' => 'view', $event_id));
                } else {
                    $this->Event->ProductOutput->deleteAll(array('ProductOutput.event_id' => $event_id));
                    $this->Event->saveField('status', 'agendado');
                    $this->Session->setFlash(__('Algum ou todos os produtos não puderam ter suas quantidades em estoque modificadas.', true));
                    $this->redirect(array('action' => 'view', $event_id));
                }
            }else {
                $this->Event->ProductOutput->deleteAll(array('ProductOutput.event_id' => $event_id));
                $this->Session->setFlash(__('O status do evento não pode ser alterado de "agendado" para "confirmado".', true));
                $this->redirect(array('action' => 'view', $event_id));
            }
        }else {
            $this->Session->setFlash(__('Algo de errado ocorreu durante a operação, por favor tente novemante.', true));
            $this->redirect(array('action' => 'view', $event_id));
        }
        $this->set(array('data_product_model' => $data_product_model, 'data_output_model' => $data_output_model, 'today' => $today));
    }
}
?>
