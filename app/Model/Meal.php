<?php
App::uses('AppModel', 'Model');
/**
 * Meal Model
 *
 * @property RecipesForMeal $RecipesForMeal
 * @property Event $Event
 */
class Meal extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'RecipesForMeal' => array(
			'className' => 'RecipesForMeal',
			'foreignKey' => 'meal_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'MealsForEvent' => array(
            'className' => 'MealsForEvent',
            'foreignKey' => 'meal_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
    /*
	public $hasAndBelongsToMany = array(
		'Event' => array(
			'className' => 'Event',
			'joinTable' => 'events_meals',
			'foreignKey' => 'meal_id',
			'associationForeignKey' => 'event_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
*/
    /**
     *
     *  função para trocar o valor booleano do campo "status"
     *
     */
    public function updateStatus($id = null){
        $this->id = $id;
        $meal = $this->find('first', array('conditions' => array('Meal.id' => $id)));
        if($meal['Meal']['status']){
            $this->saveField('status', false);
        }else
            $this->saveField('status', true);
        //this status been returned is a boolean retrieved before saveField
        return $meal['Meal']['status'];
    }

    public function findByMealId($id = null){
        $options = array(
            'conditions' => array('Meal.id' => $id),
            'recursive' => 0,
            'contain' => array(
            )
        );
        return $meal = $this->find('first', $options);
    }

    public function findMealToOutput($id = null){
        $options = array(
            'conditions' => array('Meal.id' => $id),
            'recursive' => 0,
            'contain' => array(
                'RecipesForMeal' => array(
                    'Recipe' => array(
                        'ProductsForRecipe' => array(
                            'Product' => array(
                                'MeasureUnit' => array()
                            )
                        )
                    )
                ),
            )
        );
        return $meal = $this->find('first', $options);
    }
}
