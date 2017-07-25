<?php

include('controller.php');
class UserController extends controller{

	public function getRegister(){
		return $this->loadView('dangki');
	}


	public function getLogin(){
		return $this->loadView('dangnhap');
	}
	
}



?>
