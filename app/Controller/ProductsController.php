<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

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
		$this->Product->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('Product.status' => true),
            'limit' => 10
        );
		$this->set('products', $this->Paginator->paginate('Product'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
        $this->Product->recursive = 0;
        $product = $this->Product->findProductById($id);
        $related = $this->Product->SuppliesProduct->findRelatedByProduct($id);
		$this->set(array('product' => $product, 'related' => $related));
        $this->Paginator->paginate();

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
            $this->request->data['Product']['load_stock'] = 0;
            $this->request->data['Product']['status'] = 1;
            if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$restaurants = $this->Product->Restaurant->find('list');
		$measureUnits = $this->Product->MeasureUnit->find('list');
		$this->set(compact('restaurants', 'measureUnits'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$restaurants = $this->Product->Restaurant->find('list');
		$measureUnits = $this->Product->MeasureUnit->find('list');
		$this->set(compact('restaurants', 'measureUnits', 'suppliers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * logical_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function logical_delete($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->Product->updateStatus($id)) {
            $this->Session->setFlash(__('O produto foi deletado'));
            return $this->redirect(array('action' => 'deleted_index'));
        } else {
            $this->Session->setFlash(__('O produto foi restaurado.'));
            return $this->redirect(array('action' => 'index'));
        }

    }

/**
 * deleted_index method
 *
 * @return void
 */
    public function deleted_index() {
        $this->Product->recursive = 0;
        $this->set('products', $this->Paginator->paginate('Product', array('Product.status' => 0)));
    }
}
