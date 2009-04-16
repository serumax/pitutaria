<?php 
/* SVN FILE: $Id$ */
/* Move Fixture generated on: 2009-01-08 19:01:45 : 1231455645*/

class MoveFixture extends CakeTestFixture {
	var $name = 'Move';
	var $table = 'moves';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'user_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'description' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 500),
			'amount' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'date' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'user_id'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet',
			'amount'  => 1,
			'created'  => '2009-01-08 19:00:45',
			'modified'  => '2009-01-08 19:00:45',
			'date'  => '2009-01-08 19:00:45'
			));
}
?>