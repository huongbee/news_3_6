<?php
require_once('AdminController.php');
require_once('model/TheloaiModel.php');

class TheloaiController extends AdminController{


	public function getListTheloai(){

		$model = new  TheloaiModel;
		$theloai = $model->selectTheloai();
		return $this->loadView('list_theloai',$theloai);

	}

	public function getEditTheLoai(){
		$alias = $_GET['alias'];

		$model = new TheloaiModel;
		$theloai = $model->selectTheloaiByAlias($alias);

		return $this->loadView('edit_theloai',$theloai);
	}
}




?>