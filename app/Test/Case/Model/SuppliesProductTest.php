<?php
App::uses('SuppliesProduct', 'Model');

/**
 * SuppliesProduct Test Case
 *
 */
class SuppliesProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.supplies_product',
		'app.supplier',
		'app.product',
		'app.restaurant',
		'app.user',
		'app.measure_unit',
		'app.products_for_recipe',
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
		$this->SuppliesProduct = ClassRegistry::init('SuppliesProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SuppliesProduct);

		parent::tearDown();
	}

}
