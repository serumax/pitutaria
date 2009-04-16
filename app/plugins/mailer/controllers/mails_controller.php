<?php
class MailsController extends AppController {

	var $name = 'Mails';
	var $helpers = array('Html', 'Form');

	function index() {
		
		$userId = $this->getLoggedUser();
		$this->Move->amount($userId);
		$recentMoves = $this->Move->recentsForUser($userId);
		
		
		
		$viewVars = compact('recentMoves');
		
		$this->set($viewVars);
		
	}
}
?>