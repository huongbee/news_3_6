<?php

include_once('model/TypeModel.php');
include_once('controller.php');
include_once('pager.php');


class TypeController extends controller{

	public function getType(){

		$model = new TypeModel;

		$id = $_GET['id'];
		$tintuc = $model->getNewsByIdTypePhantrang($id,-1,0);//chưa phân trang
		$totalItem = count($tintuc);
		//echo $totalItem; die;
		$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
		$soluong = 10;
		$sotranghienthi = 5;

		$pager = new pagination($totalItem, $currentPage, $soluong, $sotranghienthi);
		$pageHTML = $pager->showPagination();

		$vitri = ($currentPage - 1)*$soluong;
		$tintuc = $model->getNewsByIdTypePhantrang($id,$vitri,$soluong);//đã phân trang


		$theloai_loaitin = $model->getTheloaiLoaitin($id);

		$arrData = array('tintuc'=>$tintuc,
						'theloai_loaitin'=>$theloai_loaitin,
						'pageHTML'=>$pageHTML
					);

		return $this->loadView('loaitin',$arrData);
	}



	
}


?>
