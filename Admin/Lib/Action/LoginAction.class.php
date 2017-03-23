<?php
class LoginAction extends Action{
	public function index(){
		$this->display();
	}

	public function login () {
		if (!$this->isPost()) halt('页面不存在');

		//if ($_SESSION['verify'] != $this->_post('code', 'md5')) {
		//	$this->error('验证码错误');
		//}

		
		
		
		
		$db = M('AdminUser');
		$user = $db->where(array('username' =>  $this->_post('username')))->find();
     
		if (!$user || $user['password'] !=  $this->_post('password')) {
			$this->error('帐号或密码错误');
		}

        if ($_SESSION['verify'] !== $this->_post('code', 'md5')){
        	$this->error('验证码错误');
        }
		session('uid', $user['id']);
		session('uname', $user['username']);

		$this->redirect('Index/index');
	}
	/**
	 * 异步验证验证码
	 */
	Public function checkVerify () {
		if (!$this->isAjax()) halt('页面不存在');

		if ($_SESSION['verify'] == $this->_post('code', 'md5')) {
			echo 1;
		} else {
			echo 0;
		}
	}

	/**
	 * 验证码图片
	 */
	Public function verify () {
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}

	public function logout () {
		session_unset();
        session_destroy();
        redirect('index');
	}

}