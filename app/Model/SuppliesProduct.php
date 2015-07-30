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
                'message' => 'Este campo deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Apenas números neste campo.',
                //'allowEmpty' => false,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
		),
		'price' => array(
			'money' => array(
				'rule' => array('numeric'),
                'message' => 'Este campo tem de ser um valor monetário válido.',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'date_of_entry' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo deve ser preenchido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'date' => array(
                'rule' => array('date'),
                'message' => 'Este campo deve ser uma data.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
		),
        'expiration' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'date' => array(
                'rule' => array('date'),
                'message' => 'Este campo deve ser uma data.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'invoice' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo deve ser preenchido.',
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
		),
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'restaurant_id',
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

    public function canILoadStock($id = null, $quantity = null) {
        $options = array(
            'fields' => array('Product.load_max', 'Product.load_stock'),
            'conditions' => array('Product.id' => $id)
        );
        $product_properties = $this->Product->find('first', $options);
        if($product_properties['Product']['load_stock'] + $quantity <= $product_properties['Product']['load_max'])
            return true;
        else
            return false;
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
