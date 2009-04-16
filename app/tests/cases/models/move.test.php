<?php 
/* SVN FILE: $Id$ */
/* Move Test cases generated on: 2009-01-08 19:01:45 : 1231455645*/
App::import('Model', 'Move');

class MoveTestCase extends CakeTestCase {
	var $Move = null;
	var $fixtures = array('app.move', 'app.user');

	function startTest() {
		$this->Move =& ClassRegistry::init('Move');
	}

	function testMoveInstance() {
		$this->assertTrue(is_a($this->Move, 'Move'));
	}

	function testMoveFind() {
		$this->Move->recursive = -1;
		$results = $this->Move->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Move' => array(
			'id'  => 1,
			'user_id'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet',
			'amount'  => 1,
			'created'  => '2009-01-08 19:00:45',
			'modified'  => '2009-01-08 19:00:45',
			'date'  => '2009-01-08 19:00:45'
			));
		$this->assertEqual($results, $expected);
	}
}
?>