<?php 
/* SVN FILE: $Id$ */
/* MovesController Test cases generated on: 2009-01-08 19:01:02 : 1231455662*/
App::import('Controller', 'Moves');

class TestMoves extends MovesController {
	var $autoRender = false;
}

class MovesControllerTest extends CakeTestCase {
	var $Moves = null;

	function setUp() {
		$this->Moves = new TestMoves();
		$this->Moves->constructClasses();
	}

	function testMovesControllerInstance() {
		$this->assertTrue(is_a($this->Moves, 'MovesController'));
	}

	function tearDown() {
		unset($this->Moves);
	}
}
?>