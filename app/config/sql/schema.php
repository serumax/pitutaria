<?php 
/* SVN FILE: $Id$ */
/* Skadi schema generated on: 2009-03-09 18:03:53 : 1236632993*/
class SkadiSchema extends CakeSchema {
	var $name = 'Skadi';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $accounts = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'type_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'username' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'password' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'active' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $languages = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'language' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $translations = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'language_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'key' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'value' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $types = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'type' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'description' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $users = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'active' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'last_name' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'avatar' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'nickname' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
}
?>