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
            ),
            'Event' =>array(
                'EventType' => array('fields' => 'name')
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
        $outputs = $this->ProductOutput->getRestaurantOutputs($this->Auth->user('restaurant_id'));
        $this->Paginator->paginate();
        $this->set(array('outputs' => $outputs));
	}

/**
 * manual_submit method
 *
 * @param string $product_id
 * @return void
 */

    public function manual_submit($product_id = null){
        //get the product to be manually submitted
        $target_product = $this->ProductOutput->Product->findById($product_id);

        if($target_product['MeasureUnit']['int_only']){
            //change validation to naturalNumber type if needed
            $this->ProductOutput->changeQuantityValidation();
        }

        if ($this->request->is('post')) {
            $this->request->data['ProductOutput']['product_id'] = $product_id;

            //if the product doesnt trespass the min. load stock constraint
            if($target_product['Product']['load_stock'] - $this->request->data['ProductOutput']['quantity'] >= $target_product['Product']['load_min']) {

                $this->ProductOutput->create();
                //get any manual submission at the selected date
                $submittedThisDay = $this->ProductOutput->Event->find('first', array('conditions' => array('Event.start LIKE' => '%'.$this->request->data['ProductOutput']['date_of_submission'].'%', 'Event.event_type_id' => 2)));
                //if there is no manual submission at selected date
                if(!$submittedThisDay) {
                    //construct a new manual submission event
                    $newManualSubmitEvent = array(
                        'Event' => array(
                            'details' => 'Estes detalhes foram adicionados automaticamente durante o cadastro do evento, eles podem ser alterados quando necessário.',
                            'start' => $this->request->data['ProductOutput']['date_of_submission'],
                            'end' => $this->request->data['ProductOutput']['date_of_submission'],
                            'all_day' => 1,
                            'status' => 'agendado',
                            'active' => 1,
                            'event_type_id' => 2,
                            'restaurant_id' => $this->Auth->user('restaurant_id')
                        )
                    );
                    $this->ProductOutput->Event->create();
                    //if new event has not been saved, reload page a show message
                    if(!$this->ProductOutput->Event->save($newManualSubmitEvent)) {
                        $this->Session->setFlash(__('Não pudemos criar um novo evento de ajuste manual em estoque, tente novamente.', 'fail'));
                        return $this->redirect(array('controller' => 'productOutput', 'action' => 'manual_submit', $product_id));
                    }

                    $this->request->data['ProductOutput']['event_id'] = $this->ProductOutput->Event->id;
                } else {
                    $this->request->data['ProductOutput']['event_id'] = $submittedThisDay['Event']['id'];
                }

                if ($this->ProductOutput->save($this->request->data)) {
                    $target_product['Product']['load_stock'] -= $this->request->data['ProductOutput']['quantity'];
                    $this->ProductOutput->Product->id = $product_id;
                    $this->ProductOutput->Product->saveField('load_stock', $target_product['Product']['load_stock']);
                    $this->Session->setFlash(__('A baixa em estoque de seu produto foi realizada com sucesso.', 'success'));
                    return $this->redirect(array('controller' => 'products', 'action' => 'view', $product_id));
                } else {
                    $this->Session->setFlash(__('Algo deu errado enquanto o reajuste estava sendo salvo.', 'fail'));
                    return $this->redirect(array('controller' => 'products', 'action' => 'view', $product_id));
                }
            } else {
                $this->Session->setFlash(__('Esta operação não pode ser realizada, restrição de estoque mínimo quebrada.', 'warning'));
                return $this->redirect(array('controller' => 'products', 'action' => 'view', $product_id));
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
