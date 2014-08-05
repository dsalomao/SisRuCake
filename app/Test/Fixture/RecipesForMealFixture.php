<?php
/**
 * RecipesForMealFixture
 *
 */
class RecipesForMealFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'recipe_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'meal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'date_of_service' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_recipes_for_meals_recipe_id_idx' => array('column' => 'recipe_id', 'unique' => 0),
			'FK_recipes_for_meals_meal_id_idx' => array('column' => 'meal_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'recipe_id' => 1,
			'meal_id' => 1,
			'date_of_service' => '2014-07-05'
		),
	);

}
