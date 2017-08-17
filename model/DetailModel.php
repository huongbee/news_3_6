<?php
require_once('dbconnect.php');

class DetailModel extends database{

	public function getDetailNews($id){
		$sql = "SELECT * FROM tintuc WHERE id=$id";
		$this->setQuery($sql);
		return $this->loadRow();
	} 

	public function getComment($id_tin, $vitri,$soluong){ //có phân trang
		$sql = "SELECT comment.*,users.name 
				FROM comment 
				INNER JOIN users 
					ON users.id=comment.id_user 
				WHERE id_tintuc=$id_tin 
				ORDER BY comment.id DESC ";
		if($vitri>=0){
			$sql .= " LIMIT $vitri,$soluong";
		}
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

	public function addComment($id_tin,$id_user,$content){
		$sql = "INSERT INTO comment(id_tintuc,id_user,content) VALUES(?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($id_tin,$id_user,$content));
		if($result){
			return $this->getLastId();
		}
		else{
			return false;
		}
	}
}



?>