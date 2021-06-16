<?php

namespace Controllers;

class PlayersController 
{
		public function __construct()
	{
		$this -> display();
	}
	
	public function display()
	{
			$model = new \Models\Users();
			$players = $model -> getAllUsers();
		
		//afficher le formulaire de connexion
		
            $template = 'views/players.phtml';
            include 'views/layout.phtml';
	}
}
