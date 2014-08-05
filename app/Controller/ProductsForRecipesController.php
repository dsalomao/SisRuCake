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
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products for recipe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsForRecipe.' . $this->ProductsForRecipe->primaryKey => $id));
			$this->request->data = $this->ProductsForRecipe->find('first', $options);
		}
		$products = $this->ProductsForRecipe->Product->find('list');
		$recipes = $this->ProductsForRecipe->Recipe->find('list');
		$measureUnits = $this->ProductsForRecipe->MeasureUnit->find('list');
		$this->set(compact('products', 'recipes', 'measureUnits'));
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
            if ($this->ProductsForRecipe->save($this->request->data)) {
                $this->Session->setFlash(__('Deu certo.'));
                return $this->redirect(array('controller' => 'recipes','action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The supplies product could not be saved. Please, try again.'));
            }
        }

        $products = $this->ProductsForRecipe->Product->find(
            'list',
            array(
                'conditions' => array('Product.status' => 1),
                'recursive' => -1
            )
        );
        $recipes = $this->ProductsForRecipe->Recipe->find(
            'list',
            array(
                'conditions' => array('Recipe.id' => $id),
                'recursive' => -1
            )
        );

        $thisRecipe = $this->ProductsForRecipe->Recipe->find(
            'first',
            array(
                'conditions' => array('Recipe.id' => $id),
                'recursive' => -1
            )
        );
        $measureUnits = $this->ProductsForRecipe->MeasureUnit->find('list');
        $this->set(compact('thisRecipe','recipes', 'products', 'measureUnits'));
    }
}
