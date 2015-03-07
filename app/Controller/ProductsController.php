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
	public $components = array('Paginator', 'Session', 'Auth');

    public $paginate = array(
        'Product' => array(
            'conditions' => array('Product.status' => true),
            'limit' => 10,
            'order' => array(
                'Product.name' => 'asc'
            )
        ),
        'SuppliesProduct' => array(
            'recursive' => 0,
            'fields' => array('SuppliesProduct.id', 'SuppliesProduct.quantity', 'SuppliesProduct.price', 'SuppliesProduct.date_of_entry', 'SuppliesProduct.expiration'),
            'contain' => array(
                'Supplier' => array(
                    'fields' => array('Supplier.id', 'Supplier.name')
                )
            ),
            'limit' => 5,
            'order' => array(
                'SuppliesProduct.date_of_entry' => 'desc'
            )
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;

        $this->Paginator->settings = $this->paginate['Product'];
		$this->set('products', $this->Paginator->paginate('Product', array('Product.restaurant_id' => $this->Auth->user('restaurant_id'))));
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

        if($this->request->is('ajax')){
            $this->layout = 'ajax';
        }

        $this->Product->recursive = 0;

        $product = $this->Product->findProductById($id);
        $this->Paginator->settings = $this->paginate['SuppliesProduct'];
        $lastEntrys = $this->Paginator->paginate('SuppliesProduct', array('SuppliesProduct.product_id' => $id));

		$this->set(array('product' => $product, 'lastEntrys' => $lastEntrys));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
            $this->request->data['Product']['name'] = ucfirst($this->request->data['Product']['name']);
            $this->request->data['Product']['code'] = strtoupper($this->request->data['Product']['code']);
            $this->request->data['Product']['load_stock'] = 0;
            $this->request->data['Product']['status'] = 1;
            $this->request->data['Product']['restaurant_id'] = $this->Auth->user('restaurant_id');
            if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('O produto foi adicionado com sucesso.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O produto não pode ser adicionado, tente novamente.'));
			}
		}
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
            throw new NotFoundException(__('Produto inválido.'));
        }
        $product = $this->Product->findProductById($id);
        if($product[0]['Product']['load_stock']){
            $this->Session->setFlash(__('Este produto contém itens em estoque e não pode ser editado.'));
            return $this->redirect(array('action' => 'index'));
        }
        else{
            if ($this->request->is(array('post', 'put'))) {
                $this->request->data['Product']['name'] = ucfirst($this->request->data['Product']['name']);
                $this->request->data['Product']['code'] = strtoupper($this->request->data['Product']['code']);
                if ($this->Product->save($this->request->data)) {
                    $this->Session->setFlash(__('O produto foi editado com sucesso.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O produto não pode ser editado, tente novamente.'));
                }
            } else {
                $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
                $this->request->data = $this->Product->find('first', $options);
            }
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
            throw new NotFoundException(__('Produto inexistente.'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->Product->updateStatus($id)) {
            $this->Session->setFlash(__('O produto foi desativado'));
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
        $this->set('products', $this->Paginator->paginate('Product', array('Product.status' => 0, 'Product.restaurant_id' => $this->Auth->user('restaurant_id'))));
    }
}
