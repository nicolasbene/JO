<?php

namespace Controllers;

class UserDashboardController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotUser();
		//si le formulaire a été soumis
	    
	}

	public function display()
	{
	
		$id = $_SESSION['userId'];
		$model = new \Models\Users();
	    $users = $model -> getUserById($id);
	    
	    

	    
        $template = 'views/userDashboard.phtml';
        include 'views/layout.phtml';
	}

}