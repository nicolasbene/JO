<?php

namespace Controllers;

class UserDashboardController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotUser();
		//si le formulaire a été soumis
	    $this -> display();
	}

	public function display()
	{
		var_dump($_SESSION);
		$id = $_SESSION['idUser'];
		$model = new \Models\Users();
	    $users = $model -> getUserById($id);
	    
        $template = 'views/userDashboard.phtml';
        include 'views/layout.phtml';
	}

}