<?php 
/* SVN FILE: $Id$ */
/* Translation Test cases generated on: 2009-01-16 15:01:22 : 1232132542*/
App::import('Model', 'Translation');

class TranslationTestCase extends CakeTestCase {
	var $Translation = null;
	var $fixtures = array('app.translation', 'app.language');

	function startTest() {
		$this->Translation =& ClassRegistry::init('Translation');
	}

	function testTranslationInstance() {
		$this->assertTrue(is_a($this->Translation, 'Translation'));
	}

	function testTranslationFind() {
		$this->Translation->recursive = -1;
		$results = $this->Translation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Translation' => array(
			'id'  => 1,
			'language_id'  => 1,
			'key'  => 'Lorem ipsum dolor sit amet',
			'value'  => 'Lorem ipsum dolor sit amet'
			));
		$this->assertEqual($results, $expected);
	}
}
?>