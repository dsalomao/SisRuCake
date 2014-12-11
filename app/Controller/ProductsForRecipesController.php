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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductsForRecipe->recursive = 0;
		$this->set('productsForRecipes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductsForRecipe->exists($id)) {
			throw new NotFoundException(__('Invalid products for recipe'));
		}
		$options = array('conditions' => array('ProductsForRecipe.' . $this->ProductsForRecipe->primaryKey => $id));
		$this->set('productsForRecipe', $this->ProductsForRecipe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsForRecipe->create();
			if ($this->ProductsForRecipe->save($this->request->data)) {
				$this->Session->setFlash(__('The products for recipe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products for recipe could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductsForRecipe->Product->find('list');
		$recipes = $this->ProductsForRecipe->Recipe->find('list');
		$measureUnits = $this->ProductsForRecipe->MeasureUnit->find('list');
		$this->set(compact('products', 'recipes', 'measureUnits'));
	}

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
		$products = $this->ProductsForRecipe->Product->find('list');
		$recipes = $this->ProductsForRecipe->Recipe->find('list');
        $this->ProductsForRecipe->Recipe->recursive = -1;
        //find related recipe been posted
        $thisRecipe = $this->ProductsForRecipe->Recipe->findById($this->request->data['Recipe']['id']);
		$this->set(compact('products', 'recipes', 'measureUnits', 'thisRecipe'));
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
			$this->Session->setFlash(__('The products for recipe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products for recipe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'Recipes','action' => 'index'));
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
        //Loading the MeasureUnits model THIS NEEDS TO BE CHANGED
        $this->loadModel('MeasureUnit');
        //Acess the newly created relationship
        $measure_units = $this->MeasureUnit->getMeasureUnits();

        $products = $this->ProductsForRecipe->Product->findAllByStatus('1',array('Product.id', 'Product.name', 'Product.measure_unit_id'),array('Product.name' => 'asc'));

        $thisRecipe = $this->ProductsForRecipe->Recipe->findMyRecipe($id);
        $this->set(compact('thisRecipe', 'products', 'measure_units'));
    }
}
