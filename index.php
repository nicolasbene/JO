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
			
		case 'admin':
			$controller = new Controllers\AdminController();
			break;
			
		case 'dashboard':
			$controller = new Controllers\DashboardController();
			break;
			
		case 'dashboardEsport':
			$controller = new Controllers\EsportController();
			$controller -> display();
			break;
		
		case 'addEsport':
			$controller = new Controllers\EsportController();
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
			$controller = new Controllers\EsportController();
			//si le formulaire a été soumis
			if(!empty($_POST))
			{
				$controller -> modifySubmit();
			}
			else {
				$controller -> displayModify();	
			}
			break;
			
		case 'deleteEsport':
			$controller = new Controllers\EsportController();
			$controller -> deleteEsport();
			break;
		
		case 'connexion':
			$controller = new Controllers\UserConnexionController();
			break;
		
		case 'newUser':
			$controller = new Controllers\NewUserController();
			break;
			
		case 'userDashboard':
			$controller = new Controllers\UserDashboardController();
			break;
	
		
	
		
	}
}
