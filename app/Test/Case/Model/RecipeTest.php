<?php
App::uses('Recipe', 'Model');

/**
 * Recipe Test Case
 *
 */
class RecipeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recipe',
		'app.products_for_recipe',
		'app.product',
		'app.restaurant',
		'app.user',
		'app.measure_unit',
		'app.supplies_product',
		'app.supplier',
		'app.recipes_for_meal',
		'app.meal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Recipe = ClassRegistry::init('Recipe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recipe);

		parent::tearDown();
	}

/**
 * testUpdateStatus method
 *
 * @return void
 */
	public function testUpdateStatus() {
	}

}
