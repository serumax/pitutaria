<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2009-01-05 21:01:57 : 1231205577*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user', 'app.account', 'app.type');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function xtestUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function xtestUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 1,
			'active'  => 1,
			'created'  => '2009-01-05 21:32:57',
			'modified'  => '2009-01-05 21:32:57'
			));
		$this->assertEqual($results, $expected);
	}
	
	function testUserRegister(){
		$user = array(
			'Account'=>array(
				'type_id'=>$this->User->Account->Type->get('EMAIL'),
				'username'=>'pviojo@gmail.com',
				'password'=>'12345678',
			)
		);
		pr($user);
		$results = $this->User->register($user);
		
	}
}
?>
