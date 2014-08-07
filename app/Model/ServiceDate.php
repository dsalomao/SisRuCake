<?php
App::uses('AppModel', 'Model');
/**
 * ServiceDate Model
 *
 * @property Meal $Meal
 */
class ServiceDate extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'service_date';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'service_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meal_id' => array(
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
		'Meal' => array(
			'className' => 'Meal',
			'foreignKey' => 'meal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
