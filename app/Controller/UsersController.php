<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate('User', array('User.status' => true)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
            $this->request->data['User']['status'] = 1;
            if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$restaurants = $this->User->Restaurant->find('list');
        $roles = array('Administrador', 'Auxiliar', 'Cliente');
        $this->set(compact('restaurants', 'roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$restaurants = $this->User->Restaurant->find('list');
		$this->set(compact('restaurants'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->User->updateStatus($id)) {
            $this->Session->setFlash(__('O usuário foi desativado'));
            return $this->redirect(array('action' => 'deleted_index'));
        } else {
            $this->Session->setFlash(__('O usuário foi restaurado.'));
            return $this->redirect(array('action' => 'index'));
        }

    }
    /**
     * deleted_index method
     *
     * @return void
     */
    public function deleted_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate('User', array('User.status' => 0)));
    }

    /**
     * login method
     *
     * @return url stored in Auth component
     */
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->Redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    /**
     * logout method
     *
     * @return url stored in Auth component
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function beforeFilter() {
        $this->Auth->allow('edit');
    }
}
