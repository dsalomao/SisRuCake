<?php
App::uses('MeasuresUnit', 'Model');

/**
 * MeasuresUnit Test Case
 *
 */
class MeasuresUnitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.measures_unit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MeasuresUnit = ClassRegistry::init('MeasuresUnit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeasuresUnit);

		parent::tearDown();
	}

}
