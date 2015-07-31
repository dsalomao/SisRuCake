<?php
App::uses('AppModel', 'Model');
/**
 * ProductsForRecipe Model
 *
 * @property Product $Product
 * @property Recipe $Recipe
 * @property MeasureUnit $MeasureUnit
 */
class ProductsForRecipe extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'quantity' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo não pode estar vazio.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Este campo deve ser uma quantidade numérica válida.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'recipe_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'measure_unit_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function findByRecipeId($id = null){
        $options = array(
            'conditions' => array('ProductsForRecipe.recipe_id' => $id),
            'fields' => array('ProductsForRecipe.id', 'ProductsForRecipe.quantity'),
            'recursive' => 0,
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name'
                        )
                    ),
                    'fields' => array('Product.id', 'Product.name')
                ),
                'Recipe' => array(
                    'fields' => array('Recipe.id', 'Recipe.name')
                )
            )
        );
        $related = $this->find('all', $options);
        return $related;
    }

    public function getProductsAndMUnits () {
        $options = array(
            'conditions' => array('Product.status' => 1),
            'fields' => array('Product.id', 'Product.name'),
            'order' => array('Product.name' => 'asc'),
            'recursive' => 0,
            'contain' => array(
                'MeasureUnit' => array(
                    'fields' => array('MeasureUnit.name')
                )
            ),
        );
        return $this->Product->find('all', $options);
    }

    public function getRelatedProduct($id = null) {
        return $this->Product->find(
            'first',
            array(
                'conditions' => array('Product.id' => $id),
                'recursive' => 0
            )
        );
    }

    public function getRelatedRecipe($id = null) {
        return $this->Recipe->find(
            'first',
            array(
                'conditions' => array('Recipe.id' => $id),
                'recursive' => 0
            )
        );
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
