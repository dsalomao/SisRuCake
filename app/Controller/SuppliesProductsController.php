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
 * Helpers
 *
 * @var array
 */
    public $helpers = array('Form', 'Html', 'Number');

/**
 * Paginate variable
 *
 * @var array
 */
    public $paginate = array(
        'limit' => 10,
        'contain' => array(
            'Product' => array(
                'MeasureUnit' => array(
                    'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                ),
                'fields' => array('Product.id', 'Product.name')
            ),
            'Supplier' => array(
                'fields' => array('Supplier.id', 'Supplier.name')
            )
        ),
        'order' => array('SuppliesProduct.date_of_entry' => 'desc')
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SuppliesProduct->recursive = -1;
        $this->Paginator->settings = $this->paginate;
        $suppliesProducts = $this->Paginator->paginate('SuppliesProduct', array('SuppliesProduct.restaurant_id' => $this->Auth->user('restaurant_id')));

		$this->set(array('suppliesProducts' => $suppliesProducts));
	}

/**
 * add_load_stock method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function add_load_stock($id = null) {

        $relatedProduct = $this->SuppliesProduct->getRelatedProduct($id);
        //if product measure unit is an integer type measure unit
        if($relatedProduct['MeasureUnit']['int_only']){
            //change validation to naturalNumber type
            $this->SuppliesProduct->changeQuantityValidation();
        }

        if ($this->request->is('post')) {
            $this->SuppliesProduct->create();
            $this->SuppliesProduct->set('product_id', $relatedProduct['Product']['id']);
            if($this->SuppliesProduct->canILoadStock($id, $this->request->data['SuppliesProduct']['quantity'])){
                $this->request->data['SuppliesProduct']['restaurant_id'] = $this->Auth->user('restaurant_id');
                if ($this->SuppliesProduct->save($this->request->data)) {
                    $relatedProduct['Product']['load_stock'] = $relatedProduct['Product']['load_stock'] + $this->request->data['SuppliesProduct']['quantity'];
                    $this->SuppliesProduct->Product->id = $id;
                    $this->SuppliesProduct->Product->saveField('load_stock', $relatedProduct['Product']['load_stock']);
                    $this->Session->setFlash('O produto em estoque teve suas quantidades editadas com sucesso.', 'success');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Não foi possível editar as quantidades do produto, tente novamente.', 'fail');
                }
            }
            else{
                $this->Session->setFlash('Não foi possível editar as quantidades do produto, limite máximo de estoque atingido.', 'warning');
                return $this->redirect(array('action' => 'index'));
            }
        }

        $product = $this->SuppliesProduct->Product->findById($id);

        $suppliers = $this->SuppliesProduct->Supplier->find(
                'list',
                array(
                        'conditions' => array('Supplier.status' => 1, 'Supplier.restaurant_id' => $this->Auth->user('restaurant_id')),
                        'recursive' => -1
                )
        );
        $this->set(compact('suppliers', 'product'));
    }

}
