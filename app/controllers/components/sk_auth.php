<?php
/**
 * Authentication component
 *
 * Manages user logins and permissions.
 *
 * PHP versions 4 and 5
 *
 */

App::import(array('Router', 'Security', 'Auth'));

/**
 * Authentication control component class
 *
 * Binds access control with user authentication and session management.
 *
 * @package       app
 * @subpackage    app.components
 */

class SkAuthComponent extends AuthComponent {

	function login($data = null){
		$loggedIn = parent::login($data);
		if (!empty($loggedIn)){
			$this->initializeSession();
		}
		return $loggedIn;
	}
/**
 * Identifies a user based on specific criteria.
 *
 * @param mixed $user Optional. The identity of the user to be validated.
 *              Uses the current user session if none specified.
 * @param array $conditions Optional. Additional conditions to a find.
 * @return array User record data, or null, if the user could not be identified.
 * @access public
 */
	function identify($user = null, $conditions = null) {
		
		$User = getModel('User');
		
		if (!empty($user['User.username'])){
			$user['username'] = $user['User.username'];
			unset($user['User.username']);
		}
		if (!empty($user['User.password'])){
			$user['password'] = $user['User.password'];
			unset($user['User.password']);
		}
		
		$valid = $User->identify(
			$user
		);
		return $valid;
	}
	
	function initializeSession(){
		//Initialize session values, if any.
	}

}
?>