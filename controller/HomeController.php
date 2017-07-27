<?php

include_once('controller.php');
include_once('model/HomeModel.php');

class HomeController extends controller{

	function getIndex(){

		$model = new HomeModel;
		$slide = $model->getSlide();
		$tinnoibat = $model->getTinNoibat();
		$tinmoinhat1tin = $model->getTinMoiNhat1Tin();
		$tinmoinhat = $model->getTinMoiNhat();
		$tinxemnhieu = $model->getTinXemNhieu();
		
		$arrData = array(
			'slide'=>$slide, 
			'tinnoibat'=>$tinnoibat,
			'tinmoinhat1tin'=>$tinmoinhat1tin,
			'tinmoinhat'=>$tinmoinhat,
			'tinxemnhieu'=>$tinxemnhieu
		);

		return $this->loadView('trangchu',$arrData);
	}
}

?>