<?php
App::uses('AppController', 'Controller');
/**
 * MeasureUnits Controller
 *
 * @property MeasureUnit $MeasureUnit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MeasureUnitsController extends AppController {

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
		$this->MeasureUnit->recursive = 0;
		$this->set('measureUnits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MeasureUnit->exists($id)) {
			throw new NotFoundException(__('Invalid measure unit'));
		}
		$options = array('conditions' => array('MeasureUnit.' . $this->MeasureUnit->primaryKey => $id));
		$this->set('measureUnit', $this->MeasureUnit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MeasureUnit->create();
			if ($this->MeasureUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The measure unit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measure unit could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MeasureUnit->exists($id)) {
			throw new NotFoundException(__('Invalid measure unit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MeasureUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The measure unit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measure unit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MeasureUnit.' . $this->MeasureUnit->primaryKey => $id));
			$this->request->data = $this->MeasureUnit->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MeasureUnit->id = $id;
		if (!$this->MeasureUnit->exists()) {
			throw new NotFoundException(__('Invalid measure unit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MeasureUnit->delete()) {
			$this->Session->setFlash(__('The measure unit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The measure unit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
