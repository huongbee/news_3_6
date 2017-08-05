<?php

include('controller.php');
include('model/DetailModel.php');

class DetailController extends controller{

	public function getDetail(){

		if(!isset($_GET['id']) || $_GET['id']=='' || !isset($_GET['id_loai']) || $_GET['id_loai']==''){
			include('404.html');
			return ;
		}

		$id = $_GET['id'];

		$model = new DetailModel;
		$tintuc = $model->getDetailNews($id);

		$id_loai = $tintuc->id_loaitin;
		if($id_loai != $_GET['id_loai']){
			include('404.html');
			return ;
		}

		$comment = $model->getComment($id);
		$relatedNews = $model->getRelatedNews($id, $_GET['id_loai']);

		$arrData = array(
						'tintuc'=>$tintuc, 
						'comment'=>$comment,
						'relatedNews'=>$relatedNews
						);

		return $this->loadView('chitiettin',$arrData);
	}



	
}



?>
