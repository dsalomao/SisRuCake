<?php
App::uses('AppModel', 'Model');
/**
 * ProductOutput Model
 *
 * @property Product $Product
 */
class ProductOutput extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'quantity' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'Este campo precisa ser um número decimal.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo deve ser preenchido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'date_of_submission' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'Este campo precisa ser uma data válida.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
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
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'event_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);

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
        $this->validator()->remove('quantity', 'decimal');
        return false;
    }

    public function getRestaurantOutputs($restaurant_id = null) {
        $this->recursive = -1;
        $outputs = $this->find('all', array(
            'fields' => array('quantity', 'date_of_submission', 'event_id'),
            'order' => array('date_of_submission DESC'),
            'contain' => array(
                'Product' => array(
                    'conditions' => array('Product.restaurant_id' => $restaurant_id),
                    'fields' => array('name'),
                    'MeasureUnit' => array(
                        'fields' => 'name'
                    )
                ),
                'Event' => array(
                    'fields' => array(),
                    'EventType' => array(
                        'fields' => array('name')
                    )
                ),
            )
        ));
        return $outputs;
    }
}
