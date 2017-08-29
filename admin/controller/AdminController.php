<?php
ob_start();
session_start();
class AdminController {

	function __construct(){
		if(!isset($_SESSION['admin'])){
			//echo 12345;
			header('Location:dangnhap.php');
		}
		
	}

	function loadView($view, $data=array()){

		
		require_once("views/layout.php");

	}
}


?>