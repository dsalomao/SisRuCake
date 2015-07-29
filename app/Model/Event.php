<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property EventType $EventType
 * @property ProductsForEvent $ProductsForEvent
 * @property Meal $Meal
 */
class Event extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'details';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'details' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
		'start' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
                'message' => 'Este campo deve ser preenchido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'datetime' => array(
                'rule' => array('datetime'),
                //'message' => 'Your custom message here',
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
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'restaurant_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */

    public $hasAndBelongsToMany = array(
        'Meal' =>
            array(
                'className' => 'Meal',
                'joinTable' => 'events_meals',
                'foreignKey' => 'event_id',
                'associationForeignKey' => 'meal_id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => ''
            )
    );

    public $hasMany = array(
        'ProductOutput' => array(
            'className' => 'ProductOutput',
            'foreignKey' => 'event_id',
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

    public function findEvent($id = null){
        $options = array(
            'conditions' => array('Event.id' => $id),
            'recursive' => 0,
            'contain' => array(
                'Meal' => array(
                    'RecipesForMeal' => array(
                        'Recipe' => array(
                            'ProductsForRecipe' => array(
                                'Product' => array(
                                    'MeasureUnit' => array()
                                )
                            )
                        )
                    )
                ),
                'EventType' => array(),
                'ProductOutput' => array(
                    'Product' => array()
                )
            )
        );
        $event = $this->find('first', $options);
        return $event;
    }

    public function constructIngredientsArray($meal_id = null) {
        $this->recursive = -1;
        $meal = $this->Meal->findMealToOutput($meal_id);                                            // get related meal
        $mealIngredients = array();

        foreach($meal['RecipesForMeal'] as $recipes):                                               // for each recipe
            foreach($recipes['Recipe']['ProductsForRecipe'] as $product):                           // for each productForRecipe
                if(!isset($mealIngredients[$product['Product']['id']])){                            // if the product has not yet been initialized in mealIngredients array
                    $mealIngredients[$product['Product']['id']] =  array(                           // initialize the new ingredient
                        'product_id' => $product['Product']['id'],
                        'name' => $product['Product']['name'],
                        'code' => $product['Product']['code'],
                        'load_stock' => $product['Product']['load_stock'],
                        'output' => $product['quantity'] * $recipes['portion_multiplier'],
                        'available' => ($product['Product']['load_stock'] - $product['Product']['load_min'] <= 0) ? 0 : $product['Product']['load_stock'] - $product['Product']['load_min'],
                        'measure_unit' => $product['Product']['MeasureUnit']['name'],
                        'canOutput' => (($product['quantity'] * $recipes['portion_multiplier']) <= $product['Product']['load_stock'] - $product['Product']['load_min']) ? true : false,
                    );
                }else {
                    $mealIngredients[$product['Product']['id']]['output'] += ($product['quantity'] * $recipes['portion_multiplier']);
                    $mealIngredients[$product['Product']['id']]['canOutput'] = ($mealIngredients[$product['Product']['id']]['output'] > $mealIngredients[$product['Product']['id']]['load_stock']) ? false : true ;
                }
            endforeach;
        endforeach;

        return $mealIngredients;
    }
}
