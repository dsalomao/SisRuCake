<?php
App::uses('AppController', 'Controller');
/**
 * Suppliers Controller
 *
 * @property Supplier $Supplier
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SuppliersController extends AppController {

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
		$this->Supplier->recursive = 0;
		$this->set('suppliers', $this->Paginator->paginate('Supplier',  array('Supplier.status' => true)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Supplier->exists($id)) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        $this->Supplier->SuppliesProduct->recursive = -1;
        $suppliedProducts = $this->Supplier->SuppliesProduct->findRelatedBySupplier($id);
        //$related = $this->SuppliesProduct->findRelatedBySupplier($id);
        /*foreach($supplier['SuppliesProduct'] as $suppliedProduct):
            $this->Supplier->SuppliesProduct->Product->recursive = 0;
            $supplier['RelatedProducts'][] = $this->Supplier->SuppliesProduct->Product->findById($suppliedProduct['product_id']);
            $i = $i + 1;
        endforeach;*/
        $this->Supplier->recursive = -1;
        $supplier = $this->Supplier->findById($id);
        $this->set(array('suppliedProducts' => $suppliedProducts, 'supplier' => $supplier));
        $this->Paginator->paginate();
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Supplier->create();
			if ($this->Supplier->save($this->request->data)) {
				$this->Session->setFlash(__('The supplier has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.'));
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
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Supplier->save($this->request->data)) {
				$this->Session->setFlash(__('The supplier has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
			$this->request->data = $this->Supplier->find('first', $options);
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
		$this->Supplier->id = $id;
		if (!$this->Supplier->exists()) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Supplier->delete()) {
			$this->Session->setFlash(__('The supplier has been deleted.'));
		} else {
			$this->Session->setFlash(__('The supplier could not be deleted. Please, try again.'));
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
        $this->Supplier->id = $id;
        if (!$this->Supplier->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->Supplier->updateStatus($id)) {
            $this->Session->setFlash(__('O fornecedor foi deletado.'));
            return $this->redirect(array('action' => 'deleted_index'));
        } else {
            $this->Session->setFlash(__('O fornecedor foi restaurado.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

/**
 * deleted_index method
 *
 * @return void
 */
    public function deleted_index() {
        $this->Supplier->recursive = 0;
        $this->set('suppliers', $this->Paginator->paginate('Supplier', array('Supplier.status' => false)));
    }
}
