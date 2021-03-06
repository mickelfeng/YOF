<?php

class RegisterController extends BasicController {

	private $m_user;

	private function init(){
		$this->m_user = $this->load('user');
		$userID = $this->getSession('userID');

		if($userID){
			jsRedirect('/user/profile');
		}
	}

	public function indexAction() {
        
  	}
  	
  	public function registerActAction(){
		$m['username'] = $this->getPost('username');
		$m['password'] = $this->getPost('password');
		
		$userID = $this->m_user->Insert($m);
		if(!$userID){
			$msg = '注册失败,请重试';
			$url = '/register';
		}else{
			$msg = '注册成功,请登录';
			$url = '/login';
		}

		jsAlert($msg);
		jsRedirect($url);
	}

}
