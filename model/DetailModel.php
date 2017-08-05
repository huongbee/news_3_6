<?php
require_once('dbconnect.php');

class DetailModel extends database{

	public function getDetailNews($id){
		$sql = "SELECT * FROM tintuc WHERE id=$id";
		$this->setQuery($sql);
		return $this->loadRow();
	} 

	public function getComment($id_tin){
		$sql = "SELECT comment.*,users.name 
				FROM comment 
				INNER JOIN users 
					ON users.id=comment.id_user 
				WHERE id_tintuc=$id_tin";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function getRelatedNews($id_related_new, $id_loai){
		$sql = "SELECT * 
				FROM tintuc 
				WHERE id_loaitin=$id_loai 
					AND noibat=1 
					AND id <> $id_related_new
				ORDER BY id DESC 
				LIMIT 0,5";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
}



?>