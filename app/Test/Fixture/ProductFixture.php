<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'load_min' => array('type' => 'float', 'null' => true, 'default' => null),
		'load_max' => array('type' => 'float', 'null' => true, 'default' => null),
		'load_stock' => array('type' => 'float', 'null' => true, 'default' => null),
		'status' => array('type' => 'binary', 'null' => true, 'default' => null, 'length' => 1),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'restaurant_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'measure_unit_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_measure_unit_id_idx' => array('column' => 'measure_unit_id', 'unique' => 0),
			'FK_restaurants_id_idx' => array('column' => 'restaurant_id', 'unique' => 0),
			'FK_products_supplier_id_idx' => array('column' => 'supplier_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'load_min' => 1,
			'load_max' => 1,
			'load_stock' => 1,
			'status' => 'Lorem ipsum dolor sit ame',
			'created' => '2014-07-07',
			'modified' => '2014-07-07',
			'restaurant_id' => 1,
			'measure_unit_id' => 1,
			'supplier_id' => 1
		),
	);

}
