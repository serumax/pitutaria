<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
	var $components = array('Email','ckdb');
	var $uses = array('User', 'Account');

	
	function beforeFilter(){
		$this->SkAuth->allow('logout');
		$this->SkAuth->allow('create');
		$this->SkAuth->allow('add');
		parent::beforeFilter();
	}
	function my(){
		
		$userId = $this->getLoggedUser();
		$user = $this->User->getProfileInfo($userId);
		$viewVars = compact(
			'user'
		);
		
		$this->set($viewVars);
	}
	
	function login() {

		if ($this->SkAuth->user()) {
				
			if (!empty($this->data) && $this->data['User']['remember_me']) {
			
				$cookie = array();
				$cookie['username'] = $this->data['User']['username'];
				$cookie['password'] = $this->data['User']['password'];
				$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
				unset($this->data['User']['remember_me']);
			}
			$this->redirect($this->SkAuth->redirect());
		}
		if (empty($this->data)) {

			$cookie = $this->Cookie->read('Auth.User');
			if (!is_null($cookie)) {
				if ($this->SkAuth->login($cookie)) {
					//  Clear auth message, just in case we use it.
					$this->Session->del('Message.auth');
					$this->redirect($this->SkAuth->redirect());
				} else { // Delete invalid Cookie
					$this->Cookie->del('Auth.User');
				}
			}
		}
	}
	
	function logout() {
		$this->Session->setFlash(__('logged_out', true), 'default');
		$this->redirect($this->SkAuth->logout());
	}

	function create($param=false){

		if (!empty($this->data) and !$param){
			$user = array(
				'User'=>array(
					'name'=> $this->data['User']['name'],
					'last_name'=> $this->data['User']['last_name'],
					'active'=>0
				),
				'Account'=>array(
					'type_id'=>$this->User->Account->Type->get('EMAIL'),
					'username'=> $this->data['User']['username'],
					'password'=> $this->data['User']['password'],
					'active'=>0
				)
			);
         	$results = $this->User->register($user);

		$login = array(
			'username' => $user['Account']['username'],
			'password' => $user['Account']['password']
		);
		$this->SkAuth->login($login);
		
		$usuario = $this->SkAuth->user();		
		$this->Email->to = 'contacto@maxvillegas.com';
		$this->Email->replyTo = 'contacto@maxvillegas.com';
		$this->Email->subject = 'Bienvenido a nuestra cosa genial';
		$this->Email->from = 'WebApp <contacto@maxvillegas.com>';
		$this->Email->template = 'default';
		$this->Email->sendAs = 'both';
		$textBody = "Estimado Usuario"."\n" ;
		$textBody .= "Hemos creado su cuenta, puede revisarla en:" ."\n" ;
		$textBody .= "http://localhost/marketjob/users/confirmation/" . md5($usuario['User']['Account']['username'])."/" ."\n" ;
		$textBody .= "Atentamente" ;
		$this->Email->send($textBody);
		$this->redirect('/users/create/thank');
		exit();
		}
		
		//temporal hasta implementar la capa de queue de tareas pesadas
		if($param=="thank" && $this->data){
			$usuario = $this->SkAuth->user();
			$var['username']=$this->data['User']['Email'];
			
			$update=$this->ckdb->update($usuario['User']['Account']['id'],$var,'accounts');
  		}
		$this->set(compact('param', 'usuario'));
	}
	
	function confirmation($param){
		$usuario = $this->SkAuth->user();
			if ( $usuario['User']['Account']['active']==0  && $usuario['User']['User']['active']==0 ){
				$active['active']=1;
				$update=$this->ckdb->update($usuario['User']['User']['id'],$active,'users');
				$update=$this->ckdb->update($usuario['User']['Account']['id'],$active,'accounts');
				
				$viewVars = compact(
					'param',
					'usuario'
				);
				$this->set($viewVars);

			}
				echo $param = md5($usuario['User']['Account']['username']);
        }
}
?>