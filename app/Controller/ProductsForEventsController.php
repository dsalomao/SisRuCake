<?php
App::uses('AppController', 'Controller');
/**
 * ProductsForEvents Controller
 *
 * @property ProductsForEvent $ProductsForEvent
 * @property PaginatorComponent $Paginator
 * @property sessionComponent $session
 * @property SessionComponent $Session
 */
class ProductsForEventsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->ProductsForEvent->recursive = -1;
        $productsForEvents = $this->ProductsForEvent->find('all', array(
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array()
                ),
                'Event' => array()
            )
        ));
        $this->Paginator->paginate();
        $this->set(array('productsForEvents' => $productsForEvents));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductsForEvent->exists($id)) {
			throw new NotFoundException(__('Invalid products for event'));
		}
		$options = array('conditions' => array('ProductsForEvent.' . $this->ProductsForEvent->primaryKey => $id));
		$this->set('productsForEvent', $this->ProductsForEvent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsForEvent->create();
			if ($this->ProductsForEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The products for event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products for event could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductsForEvent->Product->find('list');
		$events = $this->ProductsForEvent->Event->find('list');
		$this->set(compact('products', 'events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductsForEvent->exists($id)) {
			throw new NotFoundException(__('Invalid products for event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsForEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The products for event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products for event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsForEvent.' . $this->ProductsForEvent->primaryKey => $id));
			$this->request->data = $this->ProductsForEvent->find('first', $options);
		}
		$products = $this->ProductsForEvent->Product->find('list');
		$events = $this->ProductsForEvent->Event->find('list');
		$this->set(compact('products', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductsForEvent->id = $id;
		if (!$this->ProductsForEvent->exists()) {
			throw new NotFoundException(__('Invalid products for event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductsForEvent->delete()) {
			$this->Session->setFlash(__('The products for event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products for event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function submit_product($event_id = null, $product_id = null){

        $event = $this->ProductsForEvent->Event->findEvent($event_id);
        $target_product = $this->ProductsForEvent->Product->findById($product_id);

        if ($this->request->is('post')) {
            $this->ProductsForEvent->create();
            $this->ProductsForEvent->set(array('event_id' => $event_id, 'product_id' => $product_id));
            if($target_product['Product']['load_stock'] > $this->request->data['ProductsForEvent']['quantity']){
                if ($this->ProductsForEvent->save($this->request->data)) {
                    $target_product['Product']['load_stock'] = $target_product['Product']['load_stock'] - $this->request->data['ProductsForEvent']['quantity'];
                    $this->ProductsForEvent->Product->id = $product_id;
                    $this->ProductsForEvent->Product->saveField('load_stock', $target_product['Product']['load_stock']);
                    $this->Session->setFlash(__('The products for event has been saved.'));
                    return $this->redirect(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'view', $event_id));
                } else {
                    $this->Session->setFlash(__('The products for event could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Este produto não pode ser atualizado devido a falta do mesmo em estoque.'));
            }
        }
        $this->set(array('event' => $event, 'product' => $target_product));
    }
}
