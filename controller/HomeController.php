<?php

include_once('controller.php');

class HomeController extends controller{

	function getIndex(){
		return $this->loadView('trangchu');
	}
}

?>