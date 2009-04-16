<?php 
/* SVN FILE: $Id$ */
/* Type Test cases generated on: 2009-01-05 21:01:19 : 1231205539*/
App::import('Model', 'Type');

class TypeTestCase extends CakeTestCase {
	var $Type = null;
	var $fixtures = array('app.type');

	function startTest() {
		$this->Type =& ClassRegistry::init('Type');
	}

	function testTypeInstance() {
		$this->assertTrue(is_a($this->Type, 'Type'));
	}

	function testTypeFind() {
		$this->Type->recursive = -1;
		$results = $this->Type->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Type' => array(
			'id'  => 1,
			'type'  => 'EMAIL',
			'created'  => '2009-01-05 21:32:19',
			'modified'  => '2009-01-05 21:32:19'
			));
		$this->assertEqual($results, $expected);
	}
}
?>