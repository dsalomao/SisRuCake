<?php
App::uses('AppController', 'Controller');
/**
 * SuppliesProducts Controller
 *
 * @property SuppliesProduct $SuppliesProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SuppliesProductsController extends AppController {

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
		$this->SuppliesProduct->recursive = 2;
		$this->set('suppliesProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SuppliesProduct->exists($id)) {
			throw new NotFoundException(__('Invalid supplies product'));
		}
		$options = array('conditions' => array('SuppliesProduct.' . $this->SuppliesProduct->primaryKey => $id));
		$this->set('suppliesProduct', $this->SuppliesProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SuppliesProduct->create();
			if ($this->SuppliesProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The supplies product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplies product could not be saved. Please, try again.'));
			}
		}

		$suppliers = $this->SuppliesProduct->Supplier->find('list');
		$products = $this->SuppliesProduct->Product->find('list');
		$measureUnits = $this->SuppliesProduct->MeasureUnit->find('list');
		$this->set(compact('suppliers', 'products', 'measureUnits'));
	}

/**
 * add_load_stock method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function add_load_stock($id = null) {
        if ($this->request->is('post')) {
            $this->SuppliesProduct->create();
            $product = $this->SuppliesProduct->getRelatedProduct($id);
            $this->SuppliesProduct->set('product_id', $product['Product']['id']);
            if ($this->SuppliesProduct->save($this->request->data)) {
                $relatedProduct = $this->SuppliesProduct->getRelatedProduct($id);
                $relatedProduct['Product']['load_stock'] = $relatedProduct['Product']['load_stock'] + $this->request->data['SuppliesProduct']['quantity'];
                $this->SuppliesProduct->Product->id = $id;
                $this->SuppliesProduct->Product->saveField('load_stock', $relatedProduct['Product']['load_stock']);
                $this->Session->setFlash(__('The supplies product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The supplies product could not be saved. Please, try again.'));
            }
        }

        $product = $this->SuppliesProduct->Product->find(
                'first',
                array(
                    'conditions' => array('Product.id' => $id),
                    'recursive' => -1
                )
        );
        $suppliers = $this->SuppliesProduct->Supplier->find(
                'list',
                array(
                        'conditions' => array('Supplier.status' => 1),
                        'recursive' => -1
                )
        );
        $this->set(compact('suppliers', 'product'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SuppliesProduct->exists($id)) {
			throw new NotFoundException(__('Invalid supplies product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SuppliesProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The supplies product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplies product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SuppliesProduct.' . $this->SuppliesProduct->primaryKey => $id));
			$this->request->data = $this->SuppliesProduct->find('first', $options);
		}
		$suppliers = $this->SuppliesProduct->Supplier->find('list');
		$products = $this->SuppliesProduct->Product->find('list');
		$measureUnits = $this->SuppliesProduct->MeasureUnit->find('list');
		$this->set(compact('suppliers', 'products', 'measureUnits'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SuppliesProduct->id = $id;
		if (!$this->SuppliesProduct->exists()) {
			throw new NotFoundException(__('Invalid supplies product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SuppliesProduct->delete()) {
			$this->Session->setFlash(__('The supplies product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The supplies product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
