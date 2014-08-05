<?php
App::uses('Restaurant', 'Model');

/**
 * Restaurant Test Case
 *
 */
class RestaurantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.restaurant',
		'app.product',
		'app.measure_unit',
		'app.products_for_recipe',
		'app.recipe',
		'app.user',
		'app.meal',
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
		$this->Restaurant = ClassRegistry::init('Restaurant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Restaurant);

		parent::tearDown();
	}

}
