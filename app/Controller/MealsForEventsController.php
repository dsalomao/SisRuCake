<?php
App::uses('AppController', 'Controller');
/**
 * MealsForEvents Controller
 *
 * @property MealsForEvent $MealsForEvent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MealsForEventsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MealsForEvent->recursive = 0;
		$this->set('mealsForEvents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MealsForEvent->exists($id)) {
			throw new NotFoundException(__('Invalid meals for event'));
		}
		$options = array('conditions' => array('MealsForEvent.' . $this->MealsForEvent->primaryKey => $id));
		$this->set('mealsForEvent', $this->MealsForEvent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MealsForEvent->create();
			if ($this->MealsForEvent->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The meals for event has been saved.'));
				return $this->redirect(array('controller' => 'Events', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meals for event could not be saved. Please, try again.'));
			}
		}
		$meals = $this->MealsForEvent->Meal->find('list');
        $eventTypes = $this->MealsForEvent->Event->EventType->find('list');
		$this->set(compact('meals', 'eventTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MealsForEvent->exists($id)) {
			throw new NotFoundException(__('Invalid meals for event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MealsForEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The meals for event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meals for event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MealsForEvent.' . $this->MealsForEvent->primaryKey => $id));
			$this->request->data = $this->MealsForEvent->find('first', $options);
		}
		$meals = $this->MealsForEvent->Meal->find('list');
		$events = $this->MealsForEvent->Event->find('list');
		$this->set(compact('meals', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MealsForEvent->id = $id;
		if (!$this->MealsForEvent->exists()) {
			throw new NotFoundException(__('Invalid meals for event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MealsForEvent->delete()) {
			$this->Session->setFlash(__('The meals for event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The meals for event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
