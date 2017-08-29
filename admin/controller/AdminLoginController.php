<?php
require_once('model/AdminModel.php');
require_once('AdminController.php');

class AdminLoginController {

	public function getFormLogin(){

		require_once('views/login.php');
	}

	public function postLogin(){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$model = new AdminModel;
		$admin = $model->findAdmin($email, $password);

		if($admin){
			$_SESSION['avatar'] = $admin->avatar;
			$_SESSION['admin'] = $admin->name;
			header('Location:index.php');
		}
		else{
			$_COOKIE['loi'] = 'Sai thông tin đăng nhập';
			header('Location:dangnhap.php');
		}
		return false;
	}
}


?>