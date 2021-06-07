<?php

namespace Controllers;

class AccueilController
{

	public function display()
	{
	    $model = new \Models\Esport();
		$esports = $model -> getAllEsports();
		
		$template = 'views/accueil.phtml';
         include 'views/layout.phtml';
	}
}