<?php

require_once('dbconnect.php');
 
class UserModel extends database{

	function findUser($email,$passcode=0){
		//$sql = "SELECT * FROM users WHERE  email = '$email' AND (passcode=$passcode OR 1=1 )  ";
		$sql = "SELECT * FROM users WHERE  email = '$email'";
		if($passcode != 0){
			$sql .= "  AND passcode='$passcode'";
		}
		$this->setQuery($sql);
		return $this->loadRow();
	}

	function addUser($name,$email,$password, $passcode){ //đăng kí tài khoản
		$sql = "INSERT INTO users (name,email,password, passcode) VALUES (?,?,?,?)";
		$this->setQuery($sql);
		$this->execute(array($name,$email,$password,$passcode));
		return $this->getLastId();
	}

	function activeUser($id){
		$sql = "UPDATE users SET active=1 WHERE id=$id";
		$this->setQuery($sql);
		return $this->execute();
	}






}


?>