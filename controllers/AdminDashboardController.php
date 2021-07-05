<?php

namespace Controllers;

class AdminDashboardController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
		$this -> display();
		
		
	    if(isset($_GET['action']) && $_GET['action'] == 'deco')
		{
			$this -> disconnect();
		}
	}
	
	
	public function display()
	{
	
            $template = 'views/adminDashboard.phtml';
            include 'views/layout.phtml';
	}
	
	
	public function disconnect()
	{
	    //je déconnecte l'utilisateur
			session_destroy();
			header('location:index.php');
			exit;
	}
}
