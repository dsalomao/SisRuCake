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

    public $components = array('RequestHandler');

    var $paginate = array(
            'limit' => 15
    );

    function index(){
        $eventTypes = $this->Event->EventType->find('list');
        $meals = $this->Event->MealsForEvent->Meal->find('list');
        $this->set(array('eventTypes' => $eventTypes, 'meals' => $meals));
    }

    function post_event(){
        if($this->request->is('post')){
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                if($this->request->data['Event']['event_type_id'] == 0) {
                    $data = array(
                        'MealsForEvent' => array(
                            'meal_id' => $this->request->data['Event']['meal_id'],
                            'event_id' => $this->Event->getLastInsertID()
                        )
                    );
                    $this->Event->MealsForEvent->add_from_calendar($data);
                }

                $event = $this->Event->findById($this->Event->getLastInsertID());

                if($event['Event']['all_day'] == 1) {
                    $allday = true;
                    $end = $event['Event']['start'];
                } else {
                    $allday = false;
                    $end = $event['Event']['end'];
                }
                $data[] = array(
                    'id' => $event['Event']['id'],
                    'title'=>$event['Event']['title'],
                    'allDay' => $allday,
                    'start'=>$event['Event']['start'],
                    'end' => $end,
                    'url' => Router::url('/') . 'events/view/'.$event['Event']['id'],
                    'className' => $event['EventType']['color']
                );
                $this->response->body(json_encode($data), 'Ok, seu evento foi salvo com sucesso.');
                $this->response->statusCode(200);
                $this->response->send();
            } else {
                $response[] = array('response' =>'Erro ao salvar o evento.');
                $this->response->body(json_encode($response));
                $this->response->statusCode(500);
                $this->response->send();
            }
        }
    }

    function get_all() {
        $events = $this->Event->find(
            'all',
            array(
                'recursive' => 0,
                'contain' => array(
                    'EventType' => array(
                        'fields' => array('color')
                    )
                ),
                'fields' => array('id', 'title', 'status', 'details', 'start', 'end', 'all_day')
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
                'title'=>$event['Event']['title'],
                'start'=>$event['Event']['start'],
                'details'=>$event['Event']['details'],
                'status'=>$event['Event']['status'],
                'end' => $end,
                'allDay' => $allday,
                //'url' => Router::url('/') . 'events/view/'.$event['Event']['id'],
                'className' => $event['EventType']['color']
            );
        }
        echo json_encode($data);
        $this->autoRender = false;
	}

	function view($id = null) {
		if (!$this->Event->exists($id)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
        $event = $this->Event->findEvent($id);
		$this->set(array('event' => $event));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
                $this->set('response', 'Erro ao salvar o evento.');
			}
		}

		$this->set(array('eventTypes' => $this->Event->EventType->find('list'),'meals' => $this->Event->MealsForEvent->Meal->find('list')));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function delete($id = null) {
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

        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function feed($id=null) {
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Event->find('all', $conditions);
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
					'title'=>$event['Event']['title'],
					'start'=>$event['Event']['start'],
					'end' => $end,
					'allDay' => $allday,
					'url' => Router::url('/') . 'full_calendar/events/view/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $event['EventType']['color']
			);
		}
		$this->set("json", json_encode($data));
	}

        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function update() {
		$vars = $this->params['url'];
		$this->Event->id = $vars['id'];
		$this->Event->saveField('start', $vars['start']);
		$this->Event->saveField('end', $vars['end']);
		$this->Event->saveField('all_day', $vars['allday']);
	}

}
?>
