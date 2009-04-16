<?php
class DashboardController extends AppController {

	var $name = 'Dashboard';
	var $uses = null;
	var $helpers = array('Html', 'Form');

	function index() {
		$viewVars = array();
		$viewVars['user'] = $this->getLoggedUser(true);
		
		$this->set($viewVars);
		
	}
}
?>