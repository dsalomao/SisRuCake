<?php
App::uses('AppController', 'Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RecipesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * Pagination
 *
 * @var array
 */

    public $paginate = array(
        'Recipe' => array(
            'conditions' => array('Recipe.status' => true),
            'limit' => 10,
            'order' => array(
                'Recipe.name' => 'asc'
            )
        ),
        'ProductsForRecipe' => array(
            'recursive' => 0,
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name')
                    ),
                    'fields' => array('Product.id', 'Product.name')
                )
            ),
            'fields' => array('ProductsForRecipe.id', 'ProductsForRecipe.quantity'),
            'limit' => 10
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recipe->recursive = 0;
        $this->Paginator->settings = $this->paginate['Recipe'];
		$this->set('recipes', $this->Paginator->paginate('Recipe', array('Recipe.restaurant_id' => $this->Auth->user('restaurant_id'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
        $this->Recipe->recursive = -1;
        $recipe = $this->Recipe->findById($id);
        $this->Paginator->settings = $this->paginate['ProductsForRecipe'];
        $related = $this->Paginator->paginate('ProductsForRecipe', array('ProductsForRecipe.recipe_id' => $id));
        $this->set(array('recipe' => $recipe, 'related' => $related));
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
            $this->request->data['Recipe']['name'] = ucfirst($this->request->data['Recipe']['name']);
            $this->request->data['Recipe']['code'] = strtoupper($this->request->data['Recipe']['code']);
            $this->request->data['Recipe']['status'] = 0;
            $this->request->data['Recipe']['restaurant_id'] = $this->Auth->user('restaurant_id');
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('Sua receita foi salva com sucesso à lista de receitas desativadas, edite-a e quando pronta mude seu estado para ativo.'));
				return $this->redirect(array('action' => 'view', $this->Recipe->id));
			} else {
				$this->Session->setFlash(__('Sua receita não pode ser salva, tente novamente.'));
			}
		}
        $categories = array('Entrada' => 'Entrada', 'Prato base' => 'Prato base', 'Prato proteico' => 'Prato proteico', 'Guarnição' => 'Guarnição', 'Sobremesa' => 'Sobremesa', 'Suco' => 'Suco');
        $this->set(array('categories' => $categories));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Recipe']['name'] = ucfirst($this->request->data['Recipe']['name']);
            $this->request->data['Recipe']['code'] = strtoupper($this->request->data['Recipe']['code']);
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('A receita foi salva com sucesso.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A receita não pode ser salva, por favor tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->Session->setFlash(__('The recipe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The recipe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * logical_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function logical_delete($id = null) {
        $this->Recipe->id = $id;
        $recipe = $this->Recipe->findById($id);
        $ingredients = $this->Recipe->countRecipeIngredients($id);
        if($ingredients) {
            if (!$this->Recipe->exists()) {
                throw new NotFoundException(__('Receita inválida.'));
            }
            $this->request->onlyAllow('post', 'logical_delete');
            if ($this->Recipe->updateStatus($id)) {
                $this->Session->setFlash(__("'%s' foi desativada com sucesso", $recipe['Recipe']['code']));
                return $this->redirect(array('action' => 'deleted_index'));
            } else {
                $this->Session->setFlash(__("'%s' foi reativada com sucesso", $recipe['Recipe']['code']));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__("'%s' não tem nenhum ingrediente ainda, portanto não pode ser ativada.", $recipe['Recipe']['code']));
            return $this->redirect(array('action' => 'index'));
        }
    }

/**
 * deleted_index method
 *
 * @return void
 */
    public function deleted_index() {
        $this->Recipe->recursive = 0;
        $this->set('recipes', $this->Paginator->paginate('Recipe', array('Recipe.status' => 0, 'Recipe.restaurant_id' => $this->Auth->user('restaurant_id'))));
    }
}
