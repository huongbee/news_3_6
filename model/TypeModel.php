<?php

include_once('dbconnect.php');


class TypeModel extends database{

	/*function getNewsByIdType($id_loai){
		$sql = "SELECT * FROM tintuc WHERE id_loaitin = $id_loai";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}*/

	function getNewsByIdTypePhantrang($id_loai,$vitri,$soluong){
		$sql = "SELECT * FROM tintuc WHERE id_loaitin = $id_loai";
		if($vitri>=0){
			$sql .= " LIMIT $vitri,$soluong";
		}
		$this->setQuery($sql);
		return $this->loadAllRows();
	}





	function getTheloaiLoaitin($id){
		$sql = "SELECT theloai.name AS tenTheloai, loaitin.name AS tenLoaitin 
				FROM `loaitin` 
				INNER JOIN theloai 
					ON theloai.id = loaitin.id_theloai 
				WHERE loaitin.id = $id";

		$this->setQuery($sql);
		return $this->loadRow();
	}
}


?>