<?php
App::uses('AppModel', 'Model');
/**
 * Recipe Model
 *
 * @property ProductsForRecipes $ProductsForRecipe
 * @property RecipeForMeals $RecipeForMeal
 */
class Recipe extends AppModel {

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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'instructions' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
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
        'category' => array(
            'inList' => array(
                'rule' => array('inList', array('0', '1', '2', '3', '4', '5')),
                'message' => 'bla',
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
        'income' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'naturalNumber' => array(
                'rule' => array('naturalNumber'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductsForRecipe' => array(
			'className' => 'ProductsForRecipes',
			'foreignKey' => 'recipe_id',
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
		'RecipesForMeal' => array(
			'className' => 'RecipesForMeals',
			'foreignKey' => 'recipe_id',
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
/**
 *
 *  função para trocar o valor booleano do campo "status"
 *
 */
    public function updateStatus($id = null){
        $this->id = $id;
        $recipe = $this->find('first', array('conditions' => array('Recipe.id' => $id)));
        if($recipe['Recipe']['status']){
            $this->saveField('status', NULL);
        }else
            $this->saveField('status', true);
        //this status been returned is a boolean retrieved before saveField
        return $recipe['Recipe']['status'];
    }

    public function testeJoin($id = null){
        $this->id = $id;
        $options = array('conditions' => array('ProductsForRecipe.recipe_id' => $id), 'recursive' => 2);
        $related = $this->ProductsForRecipe->find('all', $options);
        //$relatedProducts = $related['Products'];
        //$relatedMeasureUnit = $related['MeasureUnits'];
        return $related;
        //return compact('relatedProducts', 'relatedMeasureUnit');
    }

    public function beforeSave($options = array()) {
        if ($this->data['Recipe']['category'] == 0) {
            $this->data['Recipe']['category'] = 'Entrada';
        }
        if ($this->data['Recipe']['category'] == 1) {
            $this->data['Recipe']['category'] = 'Prato base';
        }
        if ($this->data['Recipe']['category'] == 2) {
            $this->data['Recipe']['category'] = 'Prato proteico';
        }
        if ($this->data['Recipe']['category'] == 3) {
            $this->data['Recipe']['category'] = 'Guarnição';
        }
        if ($this->data['Recipe']['category'] == 4) {
            $this->data['Recipe']['category'] = 'Sobremesa';
        }
        if ($this->data['Recipe']['category'] == 5) {
            $this->data['Recipe']['category'] = 'Suco';
        }
        return true;
    }
}
