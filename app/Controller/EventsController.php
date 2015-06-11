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
        $eventTypes = $this->Event->EventType->find('list');
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
        $this->Event->recursive = -1;
        $event = $this->Event->findById($event_id);                                                 // get event
        $meal = $this->Event->Meal->findMealToOutput($meal_id);                      // get related meal
        $mealIngredients = array();
        foreach($meal['RecipesForMeal'] as $recipes):                                               // for each recipe
            foreach($recipes['Recipe']['ProductsForRecipe'] as $product):                           // for each productForRecipe
                if(!isset($mealIngredients[$product['Product']['id']])){                            // if the product has not yet been initialized in mealIngredients array
                    $mealIngredients[$product['Product']['id']] =  array(                           // initialize the new ingredient
                        'product_id' => $product['Product']['id'],
                        'code' => $product['Product']['code'],
                        'load_stock' => $product['Product']['load_stock'],
                        'output' => $product['quantity'] * $recipes['portion_multiplier'],
                        'name' => $product['Product']['name'],
                        'measure_unit' => $product['Product']['MeasureUnit']['name'],
                        'canOutput' => (($product['quantity'] * $recipes['portion_multiplier']) <= $product['Product']['load_stock']) ? true : false,
                    );
                }else {
                    $mealIngredients[$product['Product']['id']]['output'] += ($product['quantity'] * $recipes['portion_multiplier']);
                    $mealIngredients[$product['Product']['id']]['canOutput'] = ($mealIngredients[$product['Product']['id']]['output'] > $mealIngredients[$product['Product']['id']]['load_stock']) ? false : true ;
                }
            endforeach;
        endforeach;
        $this->set(array('mealIngredients' => $mealIngredients, 'event' => $event));
    }
}
?>
