<?php
include_once('dbconnect.php');
class TintucModel extends database{

	public  function getListTintucByIdLoaitin($id_loai){
		$sql = "SELECT * FROM tintuc WHERE id_loaitin = $id_loai";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


	public function geLoaitinById($id_loai){
		$sql = "SELECT * FROM loaitin WHERE id = $id_loai";
		$this->setQuery($sql);
		return $this->loadRow();
	}
}


?>