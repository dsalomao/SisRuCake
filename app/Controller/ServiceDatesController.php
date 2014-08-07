<?php
App::uses('AppController', 'Controller');
/**
 * ServiceDates Controller
 *
 * @property ServiceDate $ServiceDate
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ServiceDatesController extends AppController {

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
		$this->ServiceDate->recursive = 0;
		$this->set('serviceDates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ServiceDate->exists($id)) {
			throw new NotFoundException(__('Invalid service date'));
		}
		$options = array('conditions' => array('ServiceDate.' . $this->ServiceDate->primaryKey => $id));
		$this->set('serviceDate', $this->ServiceDate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ServiceDate->create();
			if ($this->ServiceDate->save($this->request->data)) {
				$this->Session->setFlash(__('The service date has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service date could not be saved. Please, try again.'));
			}
		}
		$meals = $this->ServiceDate->Meal->find('list');
		$this->set(compact('meals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ServiceDate->exists($id)) {
			throw new NotFoundException(__('Invalid service date'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ServiceDate->save($this->request->data)) {
				$this->Session->setFlash(__('The service date has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service date could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ServiceDate.' . $this->ServiceDate->primaryKey => $id));
			$this->request->data = $this->ServiceDate->find('first', $options);
		}
		$meals = $this->ServiceDate->Meal->find('list');
		$this->set(compact('meals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ServiceDate->id = $id;
		if (!$this->ServiceDate->exists()) {
			throw new NotFoundException(__('Invalid service date'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ServiceDate->delete()) {
			$this->Session->setFlash(__('The service date has been deleted.'));
		} else {
			$this->Session->setFlash(__('The service date could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    /**
     * calendar method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function calendar() {
        $meals = $this->ServiceDate->Meal->find('all', array('Meal.status' => 1));
        $this->set(compact('meals'));
    }
}
