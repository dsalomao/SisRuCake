<?php
App::uses('ServiceDate', 'Model');

/**
 * ServiceDate Test Case
 *
 */
class ServiceDateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.service_date',
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
		$this->ServiceDate = ClassRegistry::init('ServiceDate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ServiceDate);

		parent::tearDown();
	}

}
