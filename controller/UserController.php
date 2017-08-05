<?php

include('controller.php');
require_once('model/UserModel.php');

class UserController extends controller{

	public function getRegister(){
		return $this->loadView('dangki');
	}

	public function postRegister($name,$email,$password){
		$model = new UserModel;
		$result = $model->addUser($name,$email,md5($password.'huong'));
		if($result>0){
			echo 'thành công';
		}
		else{
			echo 'thất bại';
		}
	}


	public function getLogin(){
		return $this->loadView('dangnhap');
	}
	
}



?>
