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
		'recipe_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meal_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
		),
        'category' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'quantity' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
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

    public function findRelatedByMeal($id = null){
        $options = array(
            'conditions' => array('RecipesForMeal.meal_id' => $id),
            'recursive' => 2
        );
        $related = $this->find('all', $options);
        return $related;
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
}
