<?php
App::uses('AppModel', 'Model');
/**
 * MealsForEvent Model
 *
 * @property Meal $Meal
 * @property Event $Event
 */
class MealsForEvent extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


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
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
