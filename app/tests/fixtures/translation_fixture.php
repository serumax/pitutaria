<?php 
/* SVN FILE: $Id$ */
/* Translation Fixture generated on: 2009-01-16 15:01:22 : 1232132542*/

class TranslationFixture extends CakeTestFixture {
	var $name = 'Translation';
	var $table = 'translations';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'language_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'key' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'value' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 1024),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'language_id'  => 1,
			'key'  => 'Lorem ipsum dolor sit amet',
			'value'  => 'Lorem ipsum dolor sit amet'
			));
}
?>