<?php
App::uses('AppModel', 'Model');
/**
 * RecipesForMeal Model
 *
 * @property Recipe $Recipe
 * @property Meal $Meal
 */
class RecipesForMeal extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'portion_multiplier' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo não pode estar vazio.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'naturalNumber' => array(
                'rule' => array('naturalNumber'),
                'message' => 'Este campo tem de ser um valor inteiro.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'category' => array(
            'inList' => array(
                'rule' => array('inList', array('Entrada', 'Prato Base', 'Prato Proteico', 'Salada', 'Sobremesa', 'Suco')),
                'message' => 'selecione uma categoria válida.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo deve ser preenchido.',
                //'allowEmpty' => false ,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Podem ser selecionadas apenas uma receita por categoria.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Meal' => array(
			'className' => 'Meal',
			'foreignKey' => 'meal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function hasRecipeForMeal($recipe_id = null, $meal_id = null){
        $options = array(
            'conditions' => array('RecipesForMeal.meal_id' => $meal_id, 'RecipesForMeal.recipe_id' => $recipe_id),
            'recursive' => -1
        );
        $count = $this->find('count', $options);
        if($count)
            return true;
        else
            return false;
    }

    public function getAlreadySavedRecipesForThisMeal($meal_id = null){
        $options = array(
            'fields' => 'RecipesForMeal.recipe_id',
            'conditions' => array('RecipesForMeal.meal_id' => $meal_id),
            'recursive' => -1
        );
        $recipesForMeal = $this->find('list', $options);
        return $recipesForMeal;
    }

    public function findActiveRecipes(){
        $options = array('conditions' => array('status' => 1));
        $active = $this->Recipe->find('list', $options);
        return $active;
    }

    public function findActiveMeals(){
        $options = array('conditions' => array('status' => 1));
        $active = $this->Meal->find('list', $options);
        return $active;
    }

    public function findByMealId($id = null){
        $options = array(
            'conditions' => array('RecipesForMeal.meal_id' => $id),
            'recursive' => 0,
            'contain' => array(
                'Recipe' => array(
                    'ProductsForRecipe' => array(
                        'Product' => array(
                            'MeasureUnit' => array(
                                'fields' => array('MeasureUnit.name')
                            ),
                            'fields' => array('Product.id', 'Product.name', 'Product.code', 'Product.load_stock')
                        )
                    )
                ),
                'Meal' => array()
            )
        );
        return $related = $this->find('all', $options);
    }
}
