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
        $ingredient = $this->ProductsForRecipe->findById($id, array('contain' => array()));
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsForRecipe->save($this->request->data)) {
				$this->Session->setFlash('Seu ingrediente foi salvo com sucesso.', 'success');
				return $this->redirect(array('controller' => 'recipes', 'action' => 'view', $ingredient['ProductsForRecipe']['recipe_id']));
			} else {
				$this->Session->setFlash('Não conseguimos salvar seu ingrediente, tente novamente.', 'fail');
                return $this->redirect(array('controller' => 'recipes', 'action' => 'view', $ingredient['ProductsForRecipe']['recipe_id']));
			}
		} else {
			$options = array('conditions' => array('ProductsForRecipe.' . $this->ProductsForRecipe->primaryKey => $id));
			$this->request->data = $this->ProductsForRecipe->find('first', $options);
		}
        $products = $this->ProductsForRecipe->getProductsAndMUnits();
        $this->ProductsForRecipe->Recipe->recursive = -1;
        //find related recipe been posted
        $thisRecipe = $this->ProductsForRecipe->Recipe->findById($this->request->data['Recipe']['id']);
		$this->set(compact('products', 'thisRecipe', 'ingredient'));
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
			$this->Session->setFlash('O ingrediente foi retirado com sucesso.', 'success');
		} else {
			$this->Session->setFlash('O ingrediente não pode sr deletado, tente novamente.', 'fail');
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
                $this->Session->setFlash('Seu ingrediente foi salvo com sucesso.', 'success');
                return $this->redirect(array('controller' => 'recipes','action' => 'view', $id));
            } else {
                $this->Session->setFlash('Seu ingrediente não pode ser adicionado, tente novamente.', 'fail');
            }
        }

        $products = $this->ProductsForRecipe->getProductsAndMUnits();

        $thisRecipe = $this->ProductsForRecipe->Recipe->findMyRecipe($id);
        $this->set(compact('thisRecipe', 'products'));
    }
}
