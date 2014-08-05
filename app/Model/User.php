<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Restaurant $Restaurant
 * @property Meal $Meal
 * @property Recipe $Recipe
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'restaurant_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Restaurant' => array(
			'className' => 'Restaurant',
			'foreignKey' => 'restaurant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
