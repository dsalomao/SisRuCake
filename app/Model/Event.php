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
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start' => array(
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
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductsForEvent' => array(
			'className' => 'ProductsForEvent',
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
		),
        'MealsForEvent' => array(
            'className' => 'MealsForEvent',
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
        ),
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
                'EventType' => array()
            )
        );
        $event = $this->find('first', $options);
        return $event;
    }

}
