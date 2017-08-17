<?php

include('controller.php');
include('model/DetailModel.php');
include('pager.php');

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

		$comment = $model->getComment($id,-1,5);
		$tongsoCMT = count($comment);
		$tranghientai = isset($_GET['page']) ? $_GET['page'] : 1;
		$soluongcmt1trang = 5;
		$sotranghienthi = 5;

		$pager = new pagination($tongsoCMT, $tranghientai, $soluongcmt1trang, $sotranghienthi);

		$cmtHTML = $pager->showPagination();

		$vitri = ($tranghientai-1)*$soluongcmt1trang;
		$comment = $model->getComment($id,$vitri,$soluongcmt1trang);

		$relatedNews = $model->getRelatedNews($id, $id_loai);

		$arrData = array(
						'tintuc'=>$tintuc, 
						'comment'=>$comment,
						'relatedNews'=>$relatedNews,
						'cmtHTML'=>$cmtHTML
						);

		return $this->loadView('chitiettin',$arrData);
	}



	
}



?>
