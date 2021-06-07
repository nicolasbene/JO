<?php

namespace Controllers;

class PaysController {
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
		$this ->  display();
	}

 	public function display()
	{
	    $model = new \Models\Pays();
		$categories = $model -> getAllPays();
            $template = 'views/pays.phtml';
            include 'views/layout.phtml';
	}
	
 
}
    