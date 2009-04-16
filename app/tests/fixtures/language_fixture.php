<?php 
/* SVN FILE: $Id$ */
/* Language Fixture generated on: 2009-01-16 15:01:04 : 1232132524*/

class LanguageFixture extends CakeTestFixture {
	var $name = 'Language';
	var $table = 'languages';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'language' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'code' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'language'  => 'Lorem ipsum dolor sit amet',
			'code'  => 'Lorem ip'
			));
}
?>