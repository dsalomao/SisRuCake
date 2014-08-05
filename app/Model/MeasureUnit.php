<?php
App::uses('AppModel', 'Model');
/**
 * MeasureUnit Model
 *
 * @property Product $Product
 * @property ProductsForRecipe $ProductsForRecipe
 * @property SuppliesProduct $SuppliesProduct
 */
class MeasureUnit extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'measure_unit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ProductsForRecipe' => array(
			'className' => 'ProductsForRecipe',
			'foreignKey' => 'measure_unit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SuppliesProduct' => array(
			'className' => 'SuppliesProduct',
			'foreignKey' => 'measure_unit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
