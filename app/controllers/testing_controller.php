<?php
class TestingController extends AppController {

	var $name = 'Testing';
	var $uses = null;
	var $helpers = array('Html', 'Form');
	function beforeFilter(){
		$this->SkAuth->allow('pub');
		parent::beforeFilter();
	}
	function priv(){
		pr($this->Session->read('nombre'));
		echo "hola";
		die();
	}
	
	function pub(){
		echo "pub";
		die();
	}
}
?>