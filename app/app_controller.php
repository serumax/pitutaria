<?php
/**
 * Main App Controller File
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @copyright		Copyright 2007-2008, 3HN Deisngs.
* @author			Baz L
* @link			http://www.WebDevelopment2.com/
 */

/**
 * Main App Controller Class
 *
 * @author	Baz L
  */
App::import('Core', 'l10n');
class AppController extends Controller {

	var $components = array('SkAuth', 'Cookie', 'P28n');

/**
 * Load the Authentication
 * 
 *
 * @access public
 */
	function beforeFilter(){
		//Set up Auth Component
		$this->SkAuth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->SkAuth->loginRedirect = '/';
		$this->SkAuth->logoutRedirect =  array('controller' => 'users', 'action' => 'login');
		$this->SkAuth->autoRedirect = false;
		$this->SkAuth->allow('*');
		//  Additional criteria for loging.
		//$this->SkAuth->userScope = array('User.active' => 1); //user needs to be active.
	}
	function beforeRender(){
		$this->set('loggedUser', $this->getLoggedUser(true));
	}
	
	function getLoggedUser($complete = false){
		$user = $this->SkAuth->user();
		if ($user){
			$user = $user['User']; 
			if ($complete){
				return $user;
			} else {
				return $user['User']['id'];
			}
		}
		return false;
	}
}
?>