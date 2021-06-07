<?php

namespace Controllers;

class DashboardController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
		$this -> display();
	}
	
	public function display()
	{
	
            $template = 'views/dashboard.phtml';
            include 'views/layout.phtml';
	}
}
