<?php

require_once('AdminController.php');
require_once('model/TintucModel.php');
require_once('../inc/functions.php');

class TintucController extends AdminController{

	function listTintuc(){
		$id_loai = (int)$_GET['id_loai'];
		if($id_loai=='' || $id_loai<=0){
			header('Location:../404.html');
			return;
		}
		$model = new TintucModel;
		$tintuc = $model->getListTintucByIdLoaitin($id_loai);
		$loaitin = $model->geLoaitinById($id_loai);

		$arrData = array('tintuc'=>$tintuc, 'loaitin'=>$loaitin);
		return $this->loadView('list_tintuc',$arrData);
	}
}



?>