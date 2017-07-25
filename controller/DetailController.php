<?php

include('controller.php');
class DetailController extends controller{

	public function getDetail(){
		return $this->loadView('chitiettin');
	}



	
}



?>
