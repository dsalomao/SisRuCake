<?php
App::uses('ProductsForRecipe', 'Model');

/**
 * ProductsForRecipe Test Case
 *
 */
class ProductsForRecipeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.products_for_recipe',
		'app.product',
		'app.restaurant',
		'app.user',
		'app.meal',
		'app.recipe',
		'app.measure_unit',
		'app.supplies_product',
		'app.supplier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductsForRecipe = ClassRegistry::init('ProductsForRecipe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductsForRecipe);

		parent::tearDown();
	}

}
