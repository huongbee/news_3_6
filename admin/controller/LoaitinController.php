<?php

require_once('AdminController.php');
require_once('model/LoaitinModel.php');
require_once('../inc/functions.php');

class LoaitinController extends AdminController{

	function listLoaitin(){
		$id_loai = (int)$_GET['id_loai'];
		if($id_loai=='' || $id_loai<=0){
			header('Location:../404.html');
			return;
		}
		$model = new LoaitinModel;
		$data = $model->getListLoaitinByAliasTheloai($id_loai);
		$theloai = $model->getTheLoaiById($id_loai);

		$arrData = array('loaitin'=>$data, 'theloai'=>$theloai);
		return $this->loadView('list_loaitin',$arrData);
	}
}



?>