<?php
//démarrer le système de session
session_start();

//autoloader
spl_autoload_register(function($class){
	
	include str_replace('\\','/',lcfirst($class)).".php";
	
});

//si je n'ai pas un paramètre page
if(!isset($_GET['page']))
{
	//lancer la page d'accueil
	$controller = new Controllers\AccueilController();
	$controller -> display();
}
else
{
	switch($_GET['page'])
	{
	    case 'accueil':
			$controller = new Controllers\AccueilController();
			$controller -> display();
			break;
			
		case 'adminConnexion':
			$controller = new Controllers\AdminConnexionController();
			break;
			
		case 'adminDashboard':
			$controller = new Controllers\AdminDashboardController();
			break;
			
		case 'adminDashboardEsport':
			$controller = new Controllers\AdminDashboardEsportController();
			$controller -> display();
			break;
		
		case 'addEsport':
			$controller = new Controllers\AdminDashboardEsportController();
			//si le formulaire a été soumis
			if(!empty($_POST))
			{
				$controller -> addSubmit();
			}
			else {
				$controller -> displayAdd();	
			}
			break;
			
		case 'modifyEsport':
			$controller = new Controllers\AdminDashboardEsportController();
			//si le formulaire a été soumis
			if(!empty($_POST))
			{
				$controller -> modifySubmit();
			}
			else 
			{
				$controller -> displayModify();	
			}
			break;
		
		case 'deleteEsport':
			$controller = new Controllers\AdminDashboardEsportController();
			$controller -> deleteEsport();
			break;
		
		case 'newUser':
			$controller = new Controllers\NewUserController();
			$controller -> display();
			break;
		
		case 'user':
			$controller = new Controllers\UserConnexionController();
			$controller -> display();
			break;
			
		case 'userDashboard':
			$controller = new Controllers\UserDashboardController();
			$controller -> display();
			break;
			
		case 'players':
			$controller = new Controllers\PlayersController();
			break;
		
		case 'esports':
			$controller = new Controllers\EsportsController();
	
	}
}
