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
	public $components = array('Paginator', 'Session', 'Auth');

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
 * addMeal method
 *
 * @return void
 */
	public function add_meal() {
		if ($this->request->is('post')) {
			$meal_code = '';
			foreach($this->request->data['RecipesForMeal'] as $recipe){
				$recipe_name = $this->RecipesForMeal->Recipe->find('first', array('conditions' => array('Recipe.id' => $recipe['recipe_id']), 'fields' => array('name')));
				$meal_code .= '<'.$recipe_name['Recipe']['name'].'>';
			}
			$meal = array('code' => $meal_code, 'description' => '', 'status' => 1, 'restaurant_id' => $this->Auth->user('restaurant_id'));
			if($this->RecipesForMeal->Meal->save($meal)){
				$last_meal_id = $this->RecipesForMeal->Meal->getLastInsertID();
				for($i = 0; $i <6; $i++){
					$this->request->data['RecipesForMeal'][$i]['meal_id'] = $last_meal_id;
				}
				if ($this->RecipesForMeal->saveMany($this->request->data['RecipesForMeal'])) {
					$this->Session->setFlash('Sua nova refeição foi salva com sucesso.', 'success');
					return $this->redirect(array('controller' => 'Meals', 'action' => 'view', $last_meal_id));
				} else {
					$this->set(array('request' => $this->request->data, 'meal_id' => $last_meal_id));
					$this->RecipesForMeal->Meal->delete($last_meal_id);
					$this->Session->setFlash('Suas novas receitas não puderam ser vinculadas à nova refeição, tente novamente', 'fail');
					//return $this->redirect(array('controller' => 'Meals', 'action' => 'index'));
				}
			} else {
				$this->Session->setFlash('Sua nova refeição não pode ser criada, tente novamente', 'fail');
				//return $this->redirect(array('controller' => 'Meals', 'action' => 'index'));
			}

		}

		$options = array(
			'recursive' => -1,
			'conditions' => array(
				'Recipe.status' => 1,
			),
			'fields' => array('Recipe.id', 'Recipe.name', 'Recipe.income')
		);
		$recipes = $this->RecipesForMeal->Recipe->find('all', $options);
		$this->set(array('recipes' => $recipes));
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
