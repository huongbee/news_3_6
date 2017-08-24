<?php
require_once('AdminController.php');
require_once('model/TheloaiModel.php');
require_once('../inc/functions.php');

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


	public function postEditTheloai(){
		$name = $_POST['nameTL'];
		$newAlias = changeTitle($name);

		$oldAlias = $_GET['alias'];

		$model = new TheloaiModel;
		
		$flag = true;
		if($_FILES['hinh']['name'] !=''){
			$nameImg = date('Y-m-d').'-'.time().'-'.$_FILES['hinh']['name'];

			$ck_upload = move_uploaded_file($_FILES['hinh']['tmp_name'], "../public/images/tintuc/$nameImg");
			if(!$ck_upload){
				setcookie('thatbai','Thư mục không tồn tại', time()+2);
				header('Location:index.php');
				return ;
			}
			$hinh = $model->editImgTheloai($nameImg,$oldAlias);
			$result = $model->editTheloai($name,$newAlias, $oldAlias);
			if($result && $hinh){			
				$oldImg = $_POST['name_img'];
				unlink("../public/images/tintuc/$oldImg");
				$flag = true;
			}
			else{
				$flag = false;
			}
		}
		else{
			$result = $model->editTheloai($name,$newAlias, $oldAlias);
		}
		if(!$result || !$flag){
			setcookie('thatbai','Sửa không thành công. Vui lòng thử lại', time()+2);
			return ;
		}
		setcookie('thanhcong','Sửa thành công', time()+2);
		header('Location:index.php');
		return;
	}

	function deleteTheLoai(){
		$alias = $_GET['alias'];
		if($alias==""){
			echo 'false';
			return;
		}
		$model = new TheloaiModel;
		$result = $model->deleteTheloai($alias);
		if($result){
			echo 'true';
		}
		else{
			echo 'false';
		}
		/*if($result){
			setcookie('thanhcong','Xóa thành công', time()+2);
		}
		else{
			setcookie('thatbai','Sửa không thành công. Vui lòng thử lại', time()+2);
		}
		header('Location:index.php');*/
		return;
	}
}




?>