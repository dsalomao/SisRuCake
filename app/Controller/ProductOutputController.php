<?php
App::uses('AppController', 'Controller');
/**
 * ProductOutput Controller
 *
 * @property ProductOutput $ManualAdjustment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductOutputController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'ProductOutput.date_of_submission' => 'desc'
        ),
        'contain' => array(
            'Product' => array(
                'MeasureUnit' => array(
                    'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                )
            )
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->ProductOutput->recursive = -1;
        $ProductOutputs = $this->ProductOutput->find('all', array(
            'conditions' => array('ProductOutput.restaurant_id' => $this->Auth->user('restaurant_id')),
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array()
                )
            ),
            'order' => array('ProductOutput.created' => 'desc')
        ));
        $this->Paginator->paginate();
        $this->set(array('ProductOutputs' => $ProductOutputs));
	}

/**
 * manual_submit method
 *
 * @param string $product_id
 * @return void
 */

    public function manual_submit($product_id = null){

        $target_product = $this->ProductOutput->Product->findById($product_id);

        if($target_product['MeasureUnit']['int_only']){
            //change validation to naturalNumber type
            $this->ProductOutput->changeQuantityValidation();
        }

        if ($this->request->is('post')) {
            $this->ProductOutput->create();
            $this->ProductOutput->set(array('product_id' => $product_id));
            if($target_product['Product']['load_stock'] - $this->request->data['ProductOutput']['quantity'] >= $target_product['Product']['load_min']){
                $this->request->data['ProductOutput']['restaurant_id'] = $this->Auth->user('restaurant_id');
                if ($this->ProductOutput->save($this->request->data)) {
                    $target_product['Product']['load_stock'] -= $this->request->data['ProductOutput']['quantity'];
                    $this->ProductOutput->Product->id = $product_id;
                    $this->ProductOutput->Product->saveField('load_stock', $target_product['Product']['load_stock']);
                    $this->Session->setFlash(__('A baixa em estoque de seu produto foi realizada com sucesso.'));
                    return $this->redirect(array('controller' => 'products', 'action' => 'view', $product_id));
                } else {
                    $this->Session->setFlash(__('As quantidades do produto não poderam ser alteradas.'));
                }
            }
            else {
                $this->Session->setFlash(__('Este produto não pode ser atualizado devido a falta do mesmo em estoque.'));
            }
        }
        $this->set(array('product' => $target_product));
    }

/**
 * output_history method
 *
 * @param string $product_id
 * @return void
 */

    public function output_history($product_id = null){
        if (!$this->ProductOutput->Product->exists($product_id)) {
            throw new NotFoundException(__('Invalid manual adjustment'));
        }
        $this->Paginator->settings = $this->paginate;

        $options = array('ProductOutput.product_id' => $product_id);
        $this->set('ProductOutputs', $this->Paginator->paginate('ProductOutput', $options));
    }
}
