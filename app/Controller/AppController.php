<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * Components
 *
 * @var array
 */
    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'dashboard'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authError' => 'Seu papel de usuário não tem permissão para acessar esta área do sistema.',
            'loginError' => 'Seu nome de usuário e/ou senha estão incorretos, tente novamente.',
            'authorize' => 'Controller'
        )
    );

/**
 *  Print_array method
 *
 *  @param array $arr
 */
    public function print_arr($arr) {
        echo '<pre>';
        print_r($arr);
        echo '< /pre>';
    }

/**
 *  Default isAuthorized method here authorizing admin to acces every action. If not admin deny all
 *
 *  @param array $user
 *  @return boolean
 */
    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'Administrador') {
            return true;
        }

        if (in_array($this->action, array('index', 'deleted_index', 'view'))) {
            return true;
        }
        // Default deny
        return false;
    }

/**
 *  Default beforeFilter method for allowing an action to be visible without authentication
 *
 *  @return void

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('');
    }
 */
}
