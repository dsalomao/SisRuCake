<?php
/**
 * SuppliesProductFixture
 *
 */
class SuppliesProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'quantity' => array('type' => 'float', 'null' => true, 'default' => null),
		'price' => array('type' => 'float', 'null' => true, 'default' => null),
		'date_of_entry' => array('type' => 'date', 'null' => true, 'default' => null),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_supplies_stocks_supplier_id' => array('column' => 'supplier_id', 'unique' => 0),
			'FK_supplies_stocks_product_id' => array('column' => 'product_id', 'unique' => 0)
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
			'price' => 1,
			'date_of_entry' => '2014-08-03',
			'supplier_id' => 1,
			'product_id' => 1
		),
	);

}
