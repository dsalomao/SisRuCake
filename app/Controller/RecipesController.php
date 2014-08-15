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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->Paginator->paginate('Recipe', array('Recipe.status' => true)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        $this->loadModel('ProductsForRecipe');
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
        $this->Recipe->recursive = -1;
        $recipe = $this->Recipe->findById($id);
        $related = $this->ProductsForRecipe->findByRecipeId($id);
        $this->set(array('recipe' => $recipe, 'related' => $related));
        $this->Paginator->paginate();
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
            $this->request->data['Recipe']['status'] = 1;
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		}
        $categories = array('Entrada', 'Prato base', 'Prato proteico', 'Guarnição', 'Sobremesa', 'Suco');
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
        if (!$this->Recipe->exists()) {
            throw new NotFoundException(__('Invalid Recipe'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->Recipe->updateStatus($id)) {
            $this->Session->setFlash(__('O produto foi deletado'));
            return $this->redirect(array('action' => 'deleted_index'));
        } else {
            $this->Session->setFlash(__('O produto foi restaurado.'));
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
        $this->set('recipes', $this->Paginator->paginate('Recipe', array('Recipe.status' => 0)));
    }
}
