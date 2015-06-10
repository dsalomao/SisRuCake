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
            'recursive' => 0,
            'contain' => array(
                'EventType' => array(
                    'fields' => array('color', 'name')
                ),
                'MealsForEvent' => array(
                    'Meal' => array()
                )
            ),
            'fields' => array('id', 'status', 'details', 'start', 'end', 'all_day')
    );

    public function calendar(){

    }

    public function output_meal($meal_id = null, $event_id = null){
        $this->Event->recursive = -1;
        $event = $this->Event->findById($event_id);
        $meal = $this->Event->MealsForEvent->Meal->findMealToOutput($meal_id);
        $mealIngredients = array();
        foreach($meal['RecipesForMeal'] as $recipes):
            foreach($recipes['Recipe']['ProductsForRecipe'] as $product):
                if(!isset($mealIngredients[$product['Product']['id']])){
                    $mealIngredients[$product['Product']['id']] =  array(
                        'product_id' => $product['Product']['id'],
                        'code' => $product['Product']['code'],
                        'load_stock' => $product['Product']['load_stock'],
                        'output' => $product['quantity'] * $recipes['portion_multiplier'],
                        'name' => $product['Product']['name'],
                        'measure_unit' => $product['Product']['MeasureUnit']['name'],
                    );
                }else {
                    $mealIngredients[$product['Product']['id']]['output'] += ($product['quantity'] * $recipes['portion_multiplier']);
                }
            endforeach;
        endforeach;
        $this->set(array('mealIngredients' => $mealIngredients, 'event' => $event));
    }

    public function index(){
        $this->Paginator->settings = $this->paginate;
        $events = $this->Paginator->paginate('Event', array('Event.restaurant_id' => $this->Auth->user('restaurant_id')));

        $this->set(array('events' => $events));
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
                    'MealsForEvent' => array(
                        'Meal' => array()
                    )
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
                'start'=>$event['Event']['start'],
                'details'=>$event['Event']['details'],
                'status'=>$event['Event']['status'],
                'end' => $end,
                'allDay' => $allday,
                'meal' => ($event['EventType']['name']=='Refeição') ? $event['MealsForEvent'][0]['Meal']['code'] : '',
                'url' => ($event['EventType']['name']=='Refeição') ? Router::url('/').'events/view/'.$event['Event']['id']:'',
                'className' => $event['EventType']['color']
            );
        }
        echo json_encode($data);
        $this->autoRender = false;
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
                        'MealsForEvent' => array(
                            'meal_id' => $this->request->data['Event']['meal_id'],
                            'event_id' => $this->Event->getLastInsertID()
                        )
                    );
                    if($this->Event->MealsForEvent->add_from_calendar($data)){
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
        $meals = $this->Event->MealsForEvent->Meal->find('list', array('conditions' => array('Meal.restaurant_id' => $this->Auth->user('restaurant_id'), 'Meal.status' => 1)));
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
}
?>
