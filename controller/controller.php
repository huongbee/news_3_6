<?php
include_once('model/HomeModel.php');

class controller{

	/*public $menu;

	public function __construct(){
		$model = new HomeModel;
		$menu2 = $model->getMenu();
		return $this->menu = $menu2;
	}*/
	//C2


	function loadView($view, $data=array()){

		//C1
		$model = new HomeModel;
		$menu = $model->getMenu();

		//C2
		//$menu = $this->menu;
		include "views/layout.php";
	}


}




?>