<?php
App::uses('Meal', 'Model');

/**
 * Meal Test Case
 *
 */
class MealTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meal',
		'app.recipes_for_meal',
		'app.recipe',
		'app.products_for_recipes',
		'app.recipes_for_meals'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Meal = ClassRegistry::init('Meal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Meal);

		parent::tearDown();
	}

}
