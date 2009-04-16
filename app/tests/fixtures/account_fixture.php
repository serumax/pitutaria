<?php 
/* SVN FILE: $Id$ */
/* Account Fixture generated on: 2009-01-05 21:01:17 : 1231205597*/

class AccountFixture extends CakeTestFixture {
	var $name = 'Account';
	var $table = 'accounts';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'user_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'type_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'username' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'password' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'active' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 4),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'user_id'  => 1,
			'type_id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'active'  => 1,
			'created'  => '2009-01-05 21:33:17',
			'modified'  => '2009-01-05 21:33:17'
			));
}
?>