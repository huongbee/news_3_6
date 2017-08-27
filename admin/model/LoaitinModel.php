<?php
include_once('dbconnect.php');
class LoaitinModel extends database{

	public  function getListLoaitinByAliasTheloai($id_loai){
		$sql = "SELECT * FROM loaitin WHERE id_theloai = $id_loai";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


	public function getTheLoaiById($id_loai){
		$sql = "SELECT * FROM theloai WHERE id = $id_loai";
		$this->setQuery($sql);
		return $this->loadRow();
	}
}


?>