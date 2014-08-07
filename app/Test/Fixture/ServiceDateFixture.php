<?php
/**
 * ServiceDateFixture
 *
 */
class ServiceDateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'service_date' => array('type' => 'date', 'null' => false, 'default' => null, 'key' => 'primary'),
		'meal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'service_date'), 'unique' => 1),
			'FK_service_dates_id_idx' => array('column' => 'meal_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'service_date' => '2014-08-07',
			'meal_id' => 1
		),
	);

}
