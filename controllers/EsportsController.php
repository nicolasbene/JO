<?php

namespace Controllers;

class EsportsController 
{
		public function __construct()
	{
		$this -> display();
	}
	
	public function display()
	{
			$model = new \Models\Esport();
			$esports = $model -> getAllEsports();
		
		//afficher le formulaire de connexion
		
            $template = 'views/esports.phtml';
            include 'views/layout.phtml';
	}
}
