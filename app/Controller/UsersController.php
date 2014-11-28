<?php

/**
 * The app class is responsible for path management, class location and class loading. Make sure you follow the File and Class Name Conventions.
 */
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
            //echo $this->print_arr($this->request->data);
            $filename = null;
            if (
                !empty($this->request->data['User']['image_url']['tmp_name'])
                && is_uploaded_file($this->request->data['User']['image_url']['tmp_name'])
            ){
                // Strip path information
                $filename = basename($this->request->data['User']['image_url']['name']);
                move_uploaded_file(
                    $this->request->data['User']['image_url']['tmp_name'],
                    WWW_ROOT . 'img' . DS . 'users' . DS .$filename
                );
            }

            // Set the file-name only to save in the database
            $this->request->data['User']['image_url'] = $filename;
            //$fileOK = $this->uploadFile('../webroot/img/users', $this->request->data['User']['image_url']);
            //echo $this->print_arr($fileOK);
            //if(array_key_exists('urls', $fileOK)) {
                // save the url in the form data
                //$this->request->data['User']['image_url'] = $fileOK['urls'][0];
            //}
            if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('O usuário foi salvo com sucesso.'));
				return $this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('O usuário não pôde ser salvo, tente novamente.'));
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
            $this->Session->setFlash(__('Valores de nome de usuário e/ou senha inválidos, tente novamente.'));
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

/**
 *  Default isAuthorized method been overwriten to allow all registered users to access some methods and limit others
 *
 *  @param array $user
 *  @return boolean
 */
    public function isAuthorized($user) {
        // Every registered user can access these actions
        if (in_array($this->action, array('logout'))) {
            return true;
        }

        // If action been called is in this list.
        if (in_array($this->action, array('edit', 'logical_delete'))) {
            $userManipulatedId = (int) $this->request->params['pass'][0];
            //If user is an Auxiliar, dont authoriza.
            if($user['role'] == 'Auxiliar'){
                //If user been edited or deleted is the same accessing the action, authorize.
                if($userManipulatedId == $user['id'])
                    return true;
                return false;
            }
        }
        //In case user has already been authorized by AppController
        return parent::isAuthorized($user);
    }
}
