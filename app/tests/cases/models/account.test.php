<?php 
/* SVN FILE: $Id$ */
/* Account Test cases generated on: 2009-01-05 21:01:19 : 1231205599*/
App::import('Model', 'Account');

class AccountTestCase extends CakeTestCase {
	var $Account = null;
	var $fixtures = array('app.account', 'app.user', 'app.type');

	function startTest() {
		$this->Account =& ClassRegistry::init('Account');
	}

	function testAccountInstance() {
		$this->assertTrue(is_a($this->Account, 'Account'));
	}

	function testAccountFind() {
		$this->Account->recursive = -1;
		$results = $this->Account->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Account' => array(
			'id'  => 1,
			'user_id'  => 1,
			'type_id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'active'  => 1,
			'created'  => '2009-01-05 21:33:17',
			'modified'  => '2009-01-05 21:33:17'
			));
		$this->assertEqual($results, $expected);
	}
}
?>