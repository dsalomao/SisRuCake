<?php
App::uses('ProductsForEvent', 'Model');

/**
 * ProductsForEvent Test Case
 *
 */
class ProductsForEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.products_for_event',
		'app.product',
		'app.restaurant',
		'app.user',
		'app.measure_unit',
		'app.products_for_recipe',
		'app.recipe',
		'app.recipes_for_meals',
		'app.supplies_product',
		'app.supplier',
		'app.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductsForEvent = ClassRegistry::init('ProductsForEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductsForEvent);

		parent::tearDown();
	}

}
