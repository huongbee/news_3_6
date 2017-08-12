<?php
include('../inc/mail.php');
require_once('../model/UserModel.php');
class AjaxController{

	public function getResetPasscode(){

		$email = $_GET['mail'];
		$model = new UserModel;
		$user = $model->findUser(trim($email));
		if($user){
			$passcode = rand(100000,999999);
			$tieudemail = "<p>Reset Passcode</p>";
			$tomtat = "Chào bạn";
			$noidung = "
				<h2>Chào bạn $user->name</h2>
				<p style='color:blue'>Vui lòng <a href='http://localhost/news3_6/active_account.php?email=$email'>chọn tôi</a> để kích hoạt tài khoản</p>
				<div>Mã kích hoạt của bạn là: <h3>$passcode</h3></div>
			";

			Mailer($email,$user->name,$tieudemail,$tomtat,$noidung);
			$result = $model->updatePasscode($passcode,$email);
			if($result){
				echo 'true';
			}
			else{
				echo 'false'; //1false
			}
			
			
		}
		else{
			echo 'false'; //false
		}
	}
}

?>