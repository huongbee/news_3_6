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
		$result = $model->editTheloai($name,$newAlias, $oldAlias);

		$flag = true;
		//$hinh = $_FILES['hinh'];
		if($_FILES['hinh']['name'] !=''){
			$nameImg = date('Y-m-d').'-'.time().'-'.$_FILES['hinh']['name'];

			move_uploaded_file($_FILES['hinh']['tmp_name'], "../public/images/tintuc/$nameImg");

			$hinh = $model->editImgTheloai($nameImg,$oldAlias);

			if($hinh){

				$flag = true;
			}
			else{
				$flag = false;
			}

		}
		if($result && $flag){
			$oldImg = $_POST['name_img'];
			unlink("../public/images/tintuc/$oldImg");
			
			setcookie('thanhcong','Sửa thành công', time()+2);
			header('Location:index.php');
			return;
		}
		setcookie('thatbai','Sửa không thành công. Vui lòng thử lại', time()+2);
		return ;
		



	}
}




?>