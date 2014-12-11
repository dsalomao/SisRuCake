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
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductOutput->exists($id)) {
			throw new NotFoundException(__('Invalid manual adjustment'));
		}
		$options = array('conditions' => array('ProductOutput.' . $this->ProductOutput->primaryKey => $id));
		$this->set('ProductOutput', $this->ProductOutput->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductOutput->create();
			if ($this->ProductOutput->save($this->request->data)) {
				$this->Session->setFlash(__('The manual adjustment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manual adjustment could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductOutput->Product->find('list');
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
		if (!$this->ProductOutput->exists($id)) {
			throw new NotFoundException(__('Invalid manual adjustment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductOutput->save($this->request->data)) {
				$this->Session->setFlash(__('The manual adjustment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manual adjustment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductOutput.' . $this->ProductOutput->primaryKey => $id));
			$this->request->data = $this->ProductOutput->find('first', $options);
		}
		$products = $this->ProductOutput->Product->find('list');
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
		$this->ProductOutput->id = $id;
		if (!$this->ProductOutput->exists()) {
			throw new NotFoundException(__('Invalid manual adjustment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductOutput->delete()) {
			$this->Session->setFlash(__('The manual adjustment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The manual adjustment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function manual_submit($product_id = null){

        $target_product = $this->ProductOutput->Product->findById($product_id);

        if ($this->request->is('post')) {
            $this->ProductOutput->create();
            $this->ProductOutput->set(array('product_id' => $product_id));
            if($target_product['Product']['load_stock'] - $this->request->data['ProductOutput']['quantity'] >= $target_product['Product']['load_min']){
                if ($this->ProductOutput->save($this->request->data)) {
                    $target_product['Product']['load_stock'] = $target_product['Product']['load_stock'] - $this->request->data['ProductOutput']['quantity'];
                    $this->ProductOutput->Product->id = $product_id;
                    $this->ProductOutput->Product->saveField('load_stock', $target_product['Product']['load_stock']);
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

    public function output_history($product_id = null){
        if (!$this->ProductOutput->Product->exists($product_id)) {
            throw new NotFoundException(__('Invalid manual adjustment'));
        }
        $this->Paginator->settings = $this->paginate;

        $options = array('ProductOutput.product_id' => $product_id);
        $this->set('ProductOutputs', $this->Paginator->paginate('ProductOutput', $options));
    }
}
