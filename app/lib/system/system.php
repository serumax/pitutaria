<?php
importLib('mq.mq');
class System{
	private static $_MQ = null;
	private function _getMq(){
		if(!System::$_MQ){
			if (defined('SYSTEM_MQ_CONN')){
				System::$_MQ = new MQ(SYSTEM_MQ_CONN, array('persistentConnection'=>false, 'persistentMessages'=>true));
			}
		}
		return System::$_MQ;
		
	}
	/**
	 * Send a system notification
	 *
	 * @param unknown_type $command
	 * @param unknown_type $arguments
	 * @return unknown
	 */
	function notify($command, $arguments = null){
		$MQ = System::_getMq();
		if (!$MQ || !defined('SYSTEM_QUEUE')){
			return;
		}
		$queueName = '/queue/' . SYSTEM_QUEUE;
		return $MQ->send($queueName, $command, $arguments);
	}
}
?>