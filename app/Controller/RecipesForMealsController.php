<?php
App::uses('AppController', 'Controller');
/**
 * RecipesForMeals Controller
 *
 * @property RecipesForMeal $RecipesForMeal
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RecipesForMealsController extends AppController {

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
		$this->RecipesForMeal->recursive = 0;
		$this->set('recipesForMeals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RecipesForMeal->exists($id)) {
			throw new NotFoundException(__('Invalid recipes for meal'));
		}
		$options = array('conditions' => array('RecipesForMeal.' . $this->RecipesForMeal->primaryKey => $id));
		$this->set('recipesForMeal', $this->RecipesForMeal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecipesForMeal->create();
			if ($this->RecipesForMeal->save($this->request->data)) {
				$this->Session->setFlash(__('The recipes for meal has been saved.'));
				return $this->redirect(array('controller' => 'Meals', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes for meal could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->RecipesForMeal->findActiveRecipes();
		$meals = $this->RecipesForMeal->findActiveMeals();
		$this->set(compact('recipes', 'meals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RecipesForMeal->exists($id)) {
			throw new NotFoundException(__('Invalid recipes for meal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RecipesForMeal->save($this->request->data)) {
				$this->Session->setFlash(__('The recipes for meal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes for meal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RecipesForMeal.' . $this->RecipesForMeal->primaryKey => $id));
			$this->request->data = $this->RecipesForMeal->find('first', $options);
		}
		$recipes = $this->RecipesForMeal->Recipe->find('list');
		$meals = $this->RecipesForMeal->Meal->find('list');
		$this->set(compact('recipes', 'meals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RecipesForMeal->id = $id;
		if (!$this->RecipesForMeal->exists()) {
			throw new NotFoundException(__('Invalid recipes for meal'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecipesForMeal->delete()) {
			$this->Session->setFlash(__('The recipes for meal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The recipes for meal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    /**
     * calendar method
     *
     * @return void
     */
    public function calendar() {
        $this->RecipesForMeal->recursive = 0;
        $this->set('recipesForMeals', $this->Paginator->paginate());
    }
}
