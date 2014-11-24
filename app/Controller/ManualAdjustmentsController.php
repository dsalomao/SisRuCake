<?php
App::uses('AppController', 'Controller');
/**
 * ManualAdjustments Controller
 *
 * @property ManualAdjustment $ManualAdjustment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ManualAdjustmentsController extends AppController {

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
        $this->ManualAdjustment->recursive = -1;
        $manualAdjustments = $this->ManualAdjustment->find('all', array(
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array()
                )
            )
        ));
        $this->Paginator->paginate();
        $this->set(array('manualAdjustments' => $manualAdjustments));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ManualAdjustment->exists($id)) {
			throw new NotFoundException(__('Invalid manual adjustment'));
		}
		$options = array('conditions' => array('ManualAdjustment.' . $this->ManualAdjustment->primaryKey => $id));
		$this->set('manualAdjustment', $this->ManualAdjustment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ManualAdjustment->create();
			if ($this->ManualAdjustment->save($this->request->data)) {
				$this->Session->setFlash(__('The manual adjustment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manual adjustment could not be saved. Please, try again.'));
			}
		}
		$products = $this->ManualAdjustment->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ManualAdjustment->exists($id)) {
			throw new NotFoundException(__('Invalid manual adjustment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ManualAdjustment->save($this->request->data)) {
				$this->Session->setFlash(__('The manual adjustment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manual adjustment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ManualAdjustment.' . $this->ManualAdjustment->primaryKey => $id));
			$this->request->data = $this->ManualAdjustment->find('first', $options);
		}
		$products = $this->ManualAdjustment->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ManualAdjustment->id = $id;
		if (!$this->ManualAdjustment->exists()) {
			throw new NotFoundException(__('Invalid manual adjustment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ManualAdjustment->delete()) {
			$this->Session->setFlash(__('The manual adjustment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The manual adjustment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function manual_submit($product_id = null){

        $target_product = $this->ManualAdjustment->Product->findById($product_id);

        if ($this->request->is('post')) {
            $this->ManualAdjustment->create();
            $this->ManualAdjustment->set(array('product_id' => $product_id));
            if($target_product['Product']['load_stock'] >= $this->request->data['ManualAdjustment']['quantity']){
                if ($this->ManualAdjustment->save($this->request->data)) {
                    $target_product['Product']['load_stock'] = $target_product['Product']['load_stock'] - $this->request->data['ManualAdjustment']['quantity'];
                    $this->ManualAdjustment->Product->id = $product_id;
                    $this->ManualAdjustment->Product->saveField('load_stock', $target_product['Product']['load_stock']);
                    $this->Session->setFlash(__('The products for event has been saved.'));
                    return $this->redirect(array('controller' => 'products', 'action' => 'view', $product_id));
                } else {
                    $this->Session->setFlash(__('The products for event could not be saved. Please, try again.'));
                }
            }
            else {
                $this->Session->setFlash(__('Este produto não pode ser atualizado devido a falta do mesmo em estoque.'));
            }
        }
        $this->set(array('product' => $target_product));
    }
}
