<?php

include_once('model/TypeModel.php');
include_once('controller.php');


class TypeController extends controller{

	public function getType(){

		$model = new TypeModel;

		$id = $_GET['id'];
		$tintuc = $model->getNewsByIdType($id);

		$arrData = array('tintuc'=>$tintuc);

		return $this->loadView('loaitin',$arrData);
	}



	
}



?>
