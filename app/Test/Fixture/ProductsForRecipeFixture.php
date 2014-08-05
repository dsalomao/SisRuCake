<?php
/**
 * ProductsForRecipeFixture
 *
 */
class ProductsForRecipeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'quantity' => array('type' => 'float', 'null' => true, 'default' => null),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'recipe_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'measure_unit_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_products_as_ingredients_recipe_id_idx' => array('column' => 'recipe_id', 'unique' => 0),
			'FK_products_as_ingredients_product_id_idx' => array('column' => 'product_id', 'unique' => 0),
			'FK_products_as_ingredients_measure_unit_id_idx' => array('column' => 'measure_unit_id', 'unique' => 0)
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
			'product_id' => 1,
			'recipe_id' => 1,
			'measure_unit_id' => 1
		),
	);

}
