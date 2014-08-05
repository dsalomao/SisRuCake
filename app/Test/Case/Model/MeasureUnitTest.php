<?php
App::uses('MeasureUnit', 'Model');

/**
 * MeasureUnit Test Case
 *
 */
class MeasureUnitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.measure_unit',
		'app.product',
		'app.restaurant',
		'app.user',
		'app.meal',
		'app.recipe',
		'app.products_for_recipe',
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
		$this->MeasureUnit = ClassRegistry::init('MeasureUnit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeasureUnit);

		parent::tearDown();
	}

}
