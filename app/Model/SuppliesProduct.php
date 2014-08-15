<?php
App::uses('AppModel', 'Model');
/**
 * SuppliesProduct Model
 *
 * @property Supplier $Supplier
 * @property Product $Product
 */
class SuppliesProduct extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'invoice';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'quantity' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                    //'message' => 'Your custom message here',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
		),
		'price' => array(
			'money' => array(
				'rule' => array('money'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_of_entry' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'invoice' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function getRelatedProduct($id = null) {
        return $this->Product->find(
            'first',
            array(
                'conditions' => array('Product.id' => $id),
                'recursive' => 0
            )
        );
    }

    public function findRelatedByProduct($id = null){
        $options = array(
            'conditions' => array('SuppliesProduct.product_id' => $id),
            'recursive' => 0,
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name'
                        )
                    ),
                    'fields' => array('Product.id', 'Product.name')
                ),
                'Supplier' => array(
                    'fields' => array('Supplier.id', 'Supplier.name')
                )
            )
        );
        $related = $this->find('all', $options);
        return $related;
    }

    public function findRelatedBySupplier($id = null){
        $options = array(
            'conditions' => array('SuppliesProduct.supplier_id' => $id),
            'fields' => array('SuppliesProduct.quantity', 'SuppliesProduct.price', 'SuppliesProduct.date_of_entry'),
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name'
                        )
                    ),
                    'fields' => array('Product.id', 'Product.name','Product.code')
                )
            )
        );
        $related = $this->find('all', $options);
        return $related;
    }

    public function findAllSupplied(){
        $options = array(
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                    ),
                    'fields' => array('Product.id', 'Product.name')
                ),
                'Supplier' => array(
                    'fields' => array('Supplier.id', 'Supplier.name')
                )
            )
        );
        $related = $this->find('all', $options);
        return $related;
    }

    public function changeQuantityValidation(){
        $this->validator()->add(
            'quantity',
            array(
                'naturalNumber' => array(
                    'rule'    => 'naturalNumber',
                    'message' => 'Esta unidade de medida recebe apenas valores inteiros'
                ),
            )
        );
        return false;
    }
}
