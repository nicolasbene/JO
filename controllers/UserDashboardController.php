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
	   /* $id = $_SESSION['idUser'];
		$model = new \Models\Users();
	    $user = $model -> getUserById($id);*/
            $template = 'views/userDashboard.phtml';
            include 'views/layout.phtml';
	}

}