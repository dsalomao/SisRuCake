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
