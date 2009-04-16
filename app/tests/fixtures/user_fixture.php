<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2009-01-05 21:01:57 : 1231205577*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'active' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 4),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'active'  => 1,
			'created'  => '2009-01-05 21:32:57',
			'modified'  => '2009-01-05 21:32:57'
			));
}
?>