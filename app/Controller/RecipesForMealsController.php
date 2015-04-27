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
 * add method
 *
 * @return void
 */
	public function add($meal_id = null) {
		if ($this->request->is('post')) {
			$this->RecipesForMeal->create();
            $this->RecipesForMeal->set('meal_id', $meal_id);
			if ($this->RecipesForMeal->save($this->request->data)) {
				$this->Session->setFlash(__('Sua receita foi adicionada com sucesso.'));
				return $this->redirect(array('controller' => 'Meals', 'action' => 'view', $meal_id));
			} else {
				$this->Session->setFlash(__('Sua receita não pode ser adicionada, tente novamente.'));
			}
		}
        $this->RecipesForMeal->Meal->recursive = -1;
		$meal = $this->RecipesForMeal->Meal->findById($meal_id);
        $alreadySavedRecipes = $this->RecipesForMeal->getAlreadySavedRecipesForThisMeal($meal_id);
        $options = array(
            'recursive' => -1,
            'conditions' => array(
                'NOT' => array(
                    'Recipe.id' => $alreadySavedRecipes
                ),
            ),
            'fields' => array('Recipe.id', 'Recipe.name', 'Recipe.income')
        );
		$recipes = $this->RecipesForMeal->Recipe->find('all', $options);
		$this->set(compact('meal', 'recipes'));
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
		return $this->redirect(array('controller' => 'Meals', 'action' => 'index'));
	}
}
