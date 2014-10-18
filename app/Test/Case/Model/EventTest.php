<?php
App::uses('Event', 'Model');

/**
 * Event Test Case
 *
 */
class EventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event',
		'app.event_type',
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
		'app.meal',
		'app.events_meal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Event = ClassRegistry::init('Event');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Event);

		parent::tearDown();
	}

}
