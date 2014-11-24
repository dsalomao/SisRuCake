<?php
App::uses('ManualAdjustment', 'Model');

/**
 * ManualAdjustment Test Case
 *
 */
class ManualAdjustmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.manual_adjustment',
		'app.product',
		'app.restaurant',
		'app.user',
		'app.measure_unit',
		'app.products_for_recipe',
		'app.recipe',
		'app.recipes_for_meals',
		'app.supplies_product',
		'app.supplier',
		'app.products_for_event',
		'app.event',
		'app.event_type',
		'app.meals_for_event',
		'app.meal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ManualAdjustment = ClassRegistry::init('ManualAdjustment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ManualAdjustment);

		parent::tearDown();
	}

}
