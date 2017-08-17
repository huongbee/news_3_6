<?php

include_once('dbconnect.php');

class HomeModel extends database{

	public function getMenu(){
		$sql = "SELECT theloai.name, GROUP_CONCAT(loaitin.id, '--', loaitin.name, '--', loaitin.alias) as LoaiTin FROM theloai INNER JOIN loaitin ON theloai.id = loaitin.id_theloai GROUP BY theloai.name";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}



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

	public function getTinXemNhieu(){
		$sql = "SELECT * FROM tintuc  ORDER BY views DESC LIMIT 0,5";
		$this->setQuery($sql);

		return $this->loadAllRows();

	}

	public function search($keyword){
		$sql = "SELECT * FROM tintuc 
				WHERE title LIKE '%$keyword%' 
					OR summary LIKE '%$keyword%' ";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
}




?>