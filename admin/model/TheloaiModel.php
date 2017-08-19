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
}



?>