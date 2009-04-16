<?php 
/* SVN FILE: $Id$ */
/* Type Fixture generated on: 2009-01-05 21:01:19 : 1231205539*/

class TypeFixture extends CakeTestFixture {
	var $name = 'Type';
	var $table = 'types';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'type' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'description' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(
		array(
			'id'  => 1,
			'type'  => 'EMAIL',
			'description'  => 'Email Access',
			'created'  => '2009-01-05 21:32:19',
			'modified'  => '2009-01-05 21:32:19'
		),
		array(
			'id'  => 2,
			'type'  => 'TWITTER',
			'description'  => 'Twitter Access',
			'created'  => '2009-01-05 21:32:19',
			'modified'  => '2009-01-05 21:32:19'
		)
	);
}
?>