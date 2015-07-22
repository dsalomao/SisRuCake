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
            $this->Event->create();
            $this->request->data['Event']['restaurant_id'] = $this->Auth->user('restaurant_id');
            if ($this->Event->save($this->request->data)) {
                if($this->request->data['Event']['event_type_id'] == 0) {
                    $data = array(
                        'EventsMeal' => array(
                            'meal_id' => $this->request->data['Event']['meal_id'],
                            'event_id' => $this->Event->getLastInsertID()
                        )
                    );
                    if($this->Event->EventsMeal->save($data)){
                        $this->Session->setFlash(__('Sua refeição foi salva com sucesso.'));
                        return $this->redirect(array('action' => 'index'));
                    }
                    else{
                        $this->Event->delete($this->Event->getLastInsertID());
                        $this->Session->setFlash(__('Esta refeição não pode ser vinculado a este evento, por favor tente novamente.'));
                    }
                }
                $this->Session->setFlash(__('Seu Lembrete foi salvo com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The Event could not be saved. Please, try again.'));
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
            $this->Session->setFlash(__('Invalid id for event', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Event->delete($id)) {
            $this->Session->setFlash(__('Event deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Event was not deleted', true));
        $this->redirect(array('action' => 'index'));
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
                'url' => ($event['EventType']['name']=='Refeição') ? Router::url('/').'events/view/'.$event['Event']['id']:'',
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
            if($this->Event->saveField('status', 'completo')) {
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
                $this->Session->setFlash(__('O status do evento não pode ser alterado de "agendado" para "completo".', true));
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
