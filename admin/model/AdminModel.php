<?php

include('dbconnect.php');
class AdminModel extends database{

	public function findAdmin($email, $password){
		$sql = "SELECT * FROM admin
				WHERE email='$email'
				AND password = '$password'";
		$this->setQuery($sql);
		return $this->loadRow();
	}
}


?>