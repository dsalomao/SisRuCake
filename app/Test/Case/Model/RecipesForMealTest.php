<?php
App::uses('RecipesForMeal', 'Model');

/**
 * RecipesForMeal Test Case
 *
 */
class RecipesForMealTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recipes_for_meal',
		'app.recipe',
		'app.user',
		'app.restaurant',
		'app.product',
		'app.measure_unit',
		'app.products_for_recipe',
		'app.supplies_product',
		'app.supplier',
		'app.meal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecipesForMeal = ClassRegistry::init('RecipesForMeal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecipesForMeal);

		parent::tearDown();
	}

}
