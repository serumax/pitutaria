<?php
App::import('Vendor', 'stomp', array('file'=> 'stomp' . DS . 'Stomp.php'));
class MQ{
	
	private $_mqConnection = null;
	private $_messageFormat = 'json';
	
	function __construct($conn = null, $options = array()){
		$this->_clearErrors();
		$defaultOptions = array(
			'persistentConnection'=>false,
			'persistentMessages'=>false
		);
		$options = am($defaultOptions, $options);
		$this->options = $options;
		if (!$conn){
			if (defined('MQ_CONN')){
				$conn = MQ_CONN;
			} 
		}
		if (!$conn){
			$this->_addError('No Connection available');
			return false;
		}
		$this->_mqConnection = new Stomp($conn);
		if ($this->options['persistentConnection']){
			$this->_mqConnection->connect();
		}
		return true;
	}
	
	function __destruct(){
		$this->_clearErrors();
		if ($this->options['persistentConnection']){
			$this->_mqConnection->disconnect();
		}
	}
	
	/**
	 * Send a command to a MQ
	 *
	 * @param string $queueName
	 * @param mixed $command
	 * @param mixed $arguments
	 * @return boolean
	 */
	function send($queueName, $command, $arguments = null){
		$this->_clearErrors();
		if (!$this->_mqConnection){
			$this->_addError('No MQ Connection available!');
			return false;
		}
		if (!$command || !$queueName){
			$this->_addError('No Command or queueName');
			return false;
		}
		
		if (!is_array($command)){
			$command = $this->createCommand($command, $arguments);
		}

		if (!$this->options['persistentConnection']){
			$this->_mqConnection->connect();
		}

		switch ($this->_messageFormat){
			case "php":
				$serializedMessage = serialize($command);
				break;
			case "json": 
			default:
				$serializedMessage = json_encode($command);
				break;
		}
		
		$headers = array();
		
		if ($this->options['persistentMessages']){
			$headers['persistent'] = 'true';
		}
		$rsp = $this->_mqConnection->send($queueName,  $serializedMessage, $headers);
		
		if (!$this->options['persistentConnection']){
			$this->_mqConnection->disconnect();
		}
		
		return $rsp;
	}
	/**
	 * Create a command to be published to a MQ
	 *
	 * @param mixed $command
	 * @param mixed $arguments 
	 * @return string
	 */
	function createCommand($command, $arguments = null){
		$rtn = array('command'=>$command);
		if ($arguments){
			$rtn['arguments'] = $arguments;
		}
		return $rtn;
	}
	
	
	//Error Handling
	/**
	 * Get last command errors, if any
	 *
	 * @return array or null
	 */
	function errors(){
		return $this->_errors;
	}
	
	
	private function _clearErrors(){
		$this->errors = array();
	}
	
	private function _addError($error){
		$this->errors[] = $error; 
	}
}
?>