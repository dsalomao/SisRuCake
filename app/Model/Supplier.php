<?php
App::uses('AppModel', 'Model');
/**
 * Supplier Model
 *
 * @property SuppliesProduct $SuppliesProduct
 */
App::uses('BrValidation', 'Localized.Validation');
class Supplier extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Por favor de um nome "fantasia" ao fornecedor.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'alphaNumeric' => array(
                'rule' => array('alphaNumeric'),
                'message' => 'Nomes fantasia devem conter apenas letras e números.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),

		),
		'business_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Por favor de a razão social do fornecedor.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Por favor de o código do fornecedor.',
				'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'alphaNumeric' => array(
                'rule' => array('alphaNumeric'),
                'message' => 'Códigos devem conter apenas letras e números.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cnpj' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'este campo precisa estar preenchido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'cnpj' => array(
                    'rule' => '/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/',
                    'message' => 'Este campo tem de ser um CNPJ brasileiro (XX.XXX.XXX/XXXX-XX).'
            )
		),
		'contact' => array(
			'phone' => array(
				'rule' => '/^(\(11\) [9][0-9]{4}-[0-9]{4})|(\(1[2-9]\) [5-9][0-9]{3}-[0-9]{4})|(\([2-9][1-9]\) [5-9][0-9]{3}-[0-9]{4})$/',
				'message' => 'Este campo deve ser um número de telefone válido.',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SuppliesProduct' => array(
			'className' => 'SuppliesProduct',
			'foreignKey' => 'supplier_id',
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

    public function getAllSuppliers(){
        $conditions = array(
            'created BETWEEN (curdate() - interval 7 day)' .
            ' and (curdate() - interval 0 day))'
        );;
    }

    public function updateStatus($id = null){
        $this->id = $id;
        $supplier = $this->find('first', array('conditions' => array('Supplier.id' => $id)));
        if($supplier['Supplier']['status'])
            $this->saveField('status', false);
        else
            $this->saveField('status', true);
        //this status been returned is a boolean retrieved before saveField
        return $supplier['Supplier']['status'];
    }

}
