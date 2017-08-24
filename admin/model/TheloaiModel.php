<?php

include_once('dbconnect.php');

class TheloaiModel extends database{

	function selectTheloai(){
		$sql = "SELECT * FROM theloai";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function selectTheloaiByAlias($alias){
		$sql = "SELECT * FROM theloai WHERE alias='$alias'";
		$this->setQuery($sql);
		return $this->loadRow();
	}


	function editTheloai($name,$newAlias, $oldAlias){
		$sql = "UPDATE theloai 
				SET name='$name', alias = '$newAlias' 
				WHERE alias = '$oldAlias'";
		$this->setQuery($sql);
		return $this->execute();
	}

	function editImgTheloai($image, $alias){
		$sql = "UPDATE theloai 
				SET image = '$image' 
				WHERE alias = '$alias'";
		$this->setQuery($sql);
		return $this->execute();
	}


	function deleteTheloai($alias){
		$sql = "DELETE FROM theloai 
				WHERE alias = '$alias'";
		$this->setQuery($sql);
		return $this->executeCustom();
	}
}



?>