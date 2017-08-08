<?php

include('inc/mail.php');
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

			$tieudemail = "<p>Kích hoạt tài khoản</p>";
			$tomtat = "Chào bạn";
			$noidung = "
				<h2>Chào bạn $name</h2>
				<p style='color:blue'>Vui lòng <a href='http://localhost/news3_6/'>chọn tôi</a> để kích hoạt tài khoản</p>
				<img src='https://www.w3schools.com/css/trolltunga.jpg'>
			";

			Mailer($email,$name,$tieudemail,$tomtat,$noidung);
			setcookie('thanhcong','Đăng kí thành công. Vui lòng kiểm tra hộp thư để kích hoạt tài khoản',time()+2);
			header('Location:dangnhap');
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
