<?php

include_once('controller.php');
include_once('model/HomeModel.php');

class HomeController extends controller{

	function getIndex(){

		$model = new HomeModel;
		$slide = $model->getSlide();

		$tintuc = 'asas';
		
		$arrData = array('slide'=>$slide, 'tintuc'=>$tintuc);

		return $this->loadView('trangchu',$arrData);
	}
}

?>