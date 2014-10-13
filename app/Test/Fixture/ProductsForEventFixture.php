<?php
/**
 * ProductsForEventFixture
 *
 */
class ProductsForEventFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'products_for_event';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'date_of_submition' => array('type' => 'date', 'null' => false, 'default' => null),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_products_for_event_product_id_idx' => array('column' => 'product_id', 'unique' => 0),
			'FK_products_for_event_event_id_idx' => array('column' => 'event_id', 'unique' => 0)
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
			'quantity' => 1,
			'date_of_submition' => '2014-10-03',
			'product_id' => 1,
			'event_id' => 1
		),
	);

}
