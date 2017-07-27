<?php

include('dbconnect.php');

class HomeModel extends database{

	public function getSlide(){
		$sql = "SELECT * FROM slide";
		$this->setQuery($sql);

		return $this->loadAllRows();

	}


	public function getTinNoibat(){
		$sql = "SELECT * FROM tintuc WHERE noibat = 1 ORDER BY id DESC LIMIT 0,10";
		$this->setQuery($sql);

		return $this->loadAllRows();

	}

	public function getTinMoiNhat1Tin(){
		$sql = "SELECT * FROM tintuc  ORDER BY id DESC LIMIT 0,1";
		$this->setQuery($sql);

		return $this->loadRow();

	}

	public function getTinMoiNhat(){
		$sql = "SELECT * FROM tintuc  ORDER BY id DESC LIMIT 1,10";
		$this->setQuery($sql);

		return $this->loadAllRows();

	}
}




?>