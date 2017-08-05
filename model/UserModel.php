<?php

require_once('dbconnect.php');
 
class UserModel extends database{

	function addUser($name,$email,$password){ //đăng kí tài khoản
		$sql = "INSERT INTO users (name,email,password) VALUES (?,?,?)";
		$this->setQuery($sql);
		$this->execute(array($name,$email,$password));
		return $this->getLastId();
	}

}


?>