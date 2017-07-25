<?php

include('controller.php');
class TypeController extends controller{

	public function getType(){
		return $this->loadView('loaitin');
	}



	
}



?>
