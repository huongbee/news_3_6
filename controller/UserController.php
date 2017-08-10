<?php

include('inc/mail.php');
include('controller.php');
require_once('model/UserModel.php');

class UserController extends controller{

	public function getRegister(){
		return $this->loadView('dang_ki');
	}

	public function postRegister($name,$email,$password){
		$model = new UserModel;

		$checkUser = $model->findUser(trim($email));
		//var_dump($checkUser); die;
		if($checkUser->id >0){
			setcookie('loi','Email đã có người sử dụng',time()+2);
			header('Location:register.php');
			return;
		}
		//echo $checkUser->id; die;
		$passcode = rand(100000,999999);

		$result = $model->addUser($name,$email,md5($password.'huong'),$passcode);
		if($result>0){

			$tieudemail = "<p>Kích hoạt tài khoản</p>";
			$tomtat = "Chào bạn";
			$noidung = "
				<h2>Chào bạn $name</h2>
				<p style='color:blue'>Vui lòng <a href='http://localhost/news3_6/active_account.php?email=$email'>chọn tôi</a> để kích hoạt tài khoản</p>
				<div>Mã kích hoạt của bạn là: <h3>$passcode</h3></div>
				<img src='https://www.w3schools.com/css/trolltunga.jpg'>
			";

			Mailer($email,$name,$tieudemail,$tomtat,$noidung);
			setcookie('thanhcong','Đăng kí thành công. Vui lòng kiểm tra hộp thư để kích hoạt tài khoản',time()+2);
			header('Location:active_account.php?email='.$email);
		}
		else{
			setcookie('loi','Có lỗi xảy ra, vui lòng thử lại',time()+2);
			header('Location:register.php');
		}
	}

	public function getActiveAccount(){
		if(!isset($_GET['email']) || $_GET['email']=='' ){
			include('404.html');
			return ;
		}

		$email = $_GET['email'];

		return $this->loadView('active_account',$email);
	}


	public function postActiveAccount($email,$passcode){
		$model = new UserModel;
		$user = $model->findUser($email,$passcode);
		//var_dump($user); die;
		if($user){
			//user active
			$result = $model->activeUser($user->id);
			if($result){
				setcookie('thanhcong','Kích hoạt tài khoản thành công',time()+2);
				header('Location:./login.php');
			}
			else{
				setcookie('loi','Kích hoạt tài khoản thành công',time()+2);
				header('Location:active_account.php?email='.$email);
			}			

		}
		else{
			setcookie('loi','Mã kích hoạt không đúng',time()+2);
			header('Location:active_account.php?email='.$email);
		}
	}


	public function getLogin(){
		return $this->loadView('dangnhap');
	}
	
}



?>
