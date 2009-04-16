<?php
class User extends AppModel {

	var $name = 'User';
	
	var $actsAs = array('Cacheable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Account' => array('className' => 'Account',
								'foreignKey' => 'user_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

	function beforeSave(){
		return true;
	}
	
	function afterSave($created){
		if ($created){
			$invalid = false;
			$status = array();

			//Add first account
			$account = array(
				'Account'=>$this->data['Account']
			);
			$account['Account']['user_id'] = $this->id;
			if (!$this->Account->addToUser($account)){
				$status['Account'] = $this->Account->invalidFields();
				$invalid = true;
			}

			//Check if user creation is complete
			if ($invalid){
				$this->data = array('status'=>$status);
				$this->delete();
				return;
			}
		}

		
		
	}
	
	
	/**
	 * Creates a new user
	 *
	 * @param unknown_type $user
	 * @return unknown
	 */
	function register($user){
		
		if (empty($user['Account'])){
			$user = array('Account'=>$user);
		}
		
		$this->create();
		$result = $this->save($user);
		if (!empty($result['status'])){
			return false;
		}
		return true;

	}
	
	function identify($user){
		if (empty($user['Account'])){
			$user = array('Account'=>$user);
		}
		
		$account = $this->Account->find(
			'first',
			array(
				'conditions'=>array(
					'Account.username'=>$user['Account']['username'],
					'Account.password'=>$user['Account']['password'],
				)
			)
		);
		if ($account){
			return $account;
		}
	}
	
	
	function getProfileInfo($userId){
		$user = $this->find(
			'first',
			array(
				'conditions'=>array('User.id'=>1),
				'cache'=>true
			)
		);
		return $user;
	}
	
	function update($user){
		return $this->save($user);
	}
}
?>
