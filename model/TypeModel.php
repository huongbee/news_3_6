<?php

include_once('dbconnect.php');


class TypeModel extends database{

	function getNewsByIdType($id_loai){
		$sql = "SELECT * FROM tintuc WHERE id_loaitin = $id_loai";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
}


?>