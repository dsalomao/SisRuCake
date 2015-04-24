<?php
App::uses('AppController', 'Controller');
/**
 * ProductsForRecipes Controller
 *
 * @property ProductsForRecipe $ProductsForRecipe
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsForRecipesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductsForRecipe->exists($id)) {
			throw new NotFoundException(__('Invalid products for recipe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsForRecipe->save($this->request->data)) {
				$this->Session->setFlash(__('The products for recipe has been saved.'));
				return $this->redirect(array('controller' => 'Recipes', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products for recipe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsForRecipe.' . $this->ProductsForRecipe->primaryKey => $id));
			$this->request->data = $this->ProductsForRecipe->find('first', $options);
		}
        $products = $this->ProductsForRecipe->Product->find(
            'all',
            array(
                'conditions' => array('Product.status' => 1),
                'fields' => array('Product.id', 'Product.name'),
                'order' => array('Product.name' => 'asc'),
                'recursive' => 0,
                'contain' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                    )
                ),
            )
        );
        $this->ProductsForRecipe->Recipe->recursive = -1;
        //find related recipe been posted
        $thisRecipe = $this->ProductsForRecipe->Recipe->findById($this->request->data['Recipe']['id']);
		$this->set(compact('products', 'thisRecipe'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductsForRecipe->id = $id;
		if (!$this->ProductsForRecipe->exists()) {
			throw new NotFoundException(__('Invalid products for recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProductsForRecipe->delete()) {
			$this->Session->setFlash(__('O ingrediente foi retirado com sucesso.'));
		} else {
			$this->Session->setFlash(__('The products for recipe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'Recipes','action' => 'deleted_index'));
	}

/**
 * add_ingredient method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function add_ingredient($id = null) {

        if ($this->request->is('post')) {
            $this->ProductsForRecipe->create();
            //find the related product been posted
            $relatedProductId = $this->request->data['ProductsForRecipe']['product_id'];
            $relatedProduct = $this->ProductsForRecipe->getRelatedProduct($relatedProductId);
            //if product measure unit is an integer type measure unit
            if($relatedProduct['MeasureUnit']['int_only']){
                //change validation to naturalNumber type
                $this->ProductsForRecipe->changeQuantityValidation();
            }
            //find related recipe been posted
            $thisRecipe = $this->ProductsForRecipe->getRelatedRecipe($id);
            //this productsForRecipe object created in line 126 = recipe id
            $this->ProductsForRecipe->set('recipe_id', $thisRecipe['Recipe']['id']);
            if ($this->ProductsForRecipe->save($this->request->data)) {
                $this->Session->setFlash(__('Seu ingrediente foi salvo com sucesso.'));
                return $this->redirect(array('controller' => 'recipes','action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('Seu ingrediente não pode ser salvo, tente novamente.'));
            }
        }

        $products = $this->ProductsForRecipe->Product->find(
            'all',
            array(
                'conditions' => array('Product.status' => 1),
                'fields' => array('Product.id', 'Product.name'),
                'order' => array('Product.name' => 'asc'),
                'recursive' => 0,
                'contain' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                    )
                ),
            )
        );

        $thisRecipe = $this->ProductsForRecipe->Recipe->findMyRecipe($id);
        $this->set(compact('thisRecipe', 'products'));
    }
}
