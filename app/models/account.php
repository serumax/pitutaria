<?php
class Account extends AppModel {

	var $name = 'Account';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Type' => array('className' => 'Type',
								'foreignKey' => 'type_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	
	function beforeSave(){
		

		if ($this->existsAccount($this->data)){
			$this->invalidate('username', __('username_already_taken', true));
		}
		return $this->validates();
		
	}
	
	function addToUser($user_id, $account = array()){
		
		if (is_array($user_id)){
			$account = $user_id['Account'];
			if (!empty($user_id['Account']['user_id'])){
				$user_id = $user_id['Account']['user_id'];
			} elseif (!empty($user_id['User']['id'])){
				$user_id = $user_id['User']['id'];
			} else {
				$user_id = null;
			}
		}
		
		if (empty($user_id)){
			return false;
		}
		
		$data = array('Account'=>$account);
		$data ['Account']['user_id'] = $user_id;
		$this->create();
		if (!$this->save($data)){
			return false;			
		}
		
		return true;
		
	}
	
	function isAccountAssociatedToAnotherUser($account){
		return $this->hasAny(
			array(
				'Account.type_id'=>$account['Account']['type_id'],
				'Account.username'=>$account['Account']['username'],
				'Account.user_id<>' . $account['Account']['user_id']
			)
		);	
	}
	
	function existsAccount($account){
		return $this->hasAny(
			array(
				'Account.type_id'=>$account['Account']['type_id'],
				'Account.username'=>$account['Account']['username'],
			)
		);
	}
}
?>