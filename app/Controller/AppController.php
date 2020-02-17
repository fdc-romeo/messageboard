<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'DebugKit.Toolbar',
		'Session',
	    'RequestHandler',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'home'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'home' => array('controller' => 'users', 'action' => 'home'),
            'userprofile' => array('controller' => 'users', 'action' => 'userprofile'),
            'updateprofile' => array('controller' => 'users', 'action' => 'updateprofile'),
            'register' => array('controller' => 'users', 'action' => 'thankyou'),
			'authError' => 'You must be logged in to view this page.',
			'loginError' => 'Invalid Username or Password entered, please try again.',
			'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
 
        ));


	// only allow the login controllers only
	public function beforeFilter() {
        $this->Auth->allow('login','register','thankyou');
    }
	
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role	
		return true;
	}
	
}
