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
				'message' => 'Este campo deve ser preenchido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo deve ser preenchido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Este campo permite apenas letras e números.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Este código de receita já se encontra em uso.',
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
                'rule' => array('inList', array('Entrada', 'Prato base', 'Prato proteico', 'Salada', 'Sobremesa', 'Suco')),
                'message' => 'selecione uma categoria válida.',
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
        'income' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo deve ser preenchido.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'naturalNumber' => array(
                'rule' => array('naturalNumber'),
                'message' => 'Este campo deve ser um número inteiro.',
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
			'className' => 'ProductsForRecipe',
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
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'restaurant_id',
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
            $this->saveField('status', false);
        }else
            $this->saveField('status', true);
        //this status been returned is a boolean retrieved before saveField
        return $recipe['Recipe']['status'];
    }

    public function findMyRecipe($id = null) {
        $options = array(
            'conditions' => array('Recipe.id' => $id),
            'recursive' => -1
        );

        return $this->find( 'first', $options);
    }

    public function countRecipeIngredients($id = null){
        $options = array(
            'recursive' => 0,
            'conditions' => array('ProductsForRecipe.recipe_id' => $id),
            'fields' => array('id', 'name', 'code', 'income', 'category')
        );
        return $this->ProductsForRecipe->find('count', $options);
    }
}
