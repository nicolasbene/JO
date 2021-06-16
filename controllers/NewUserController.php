<?php

namespace Controllers;

class NewUserController {
    private $message1;
    private $message2;
    
    public function __construct()
    {
    	$this -> message1 = "";
        $this -> message2 = "";

        if(!empty($_POST))
		{
		    $this -> submit();
		
	    }
	    if(isset($_GET['action']) && $_GET['action'] == 'deco')
		{
			$this -> disconnect();
		}
		
    }
    
	public function display()
	{
		$model = new \Models\Esport();
		$esports = $model -> getAllEsports();
		
		$model2 = new \Models\Continent();
		$continents = $model2 -> getAllContinents();
		
		$model3 = new \Models\Pays();
		$countries = $model3 -> getAllPays();
		
		//afficher le formulaire de connexion
        $template = 'views/newUser.phtml';
        include 'views/layout.phtml';
	}
	public function disconnect()
	{
	    //je déconnecte l'utilisateur
		session_destroy();
		header('location:index.php');
		exit;
}
	
	//traitement du formulaire
	public function submit()
	{
		if (isset( $_POST['firstName']) && !empty($_POST['firstName']) && isset( $_POST['lastName']) && !empty($_POST['lastName']) && isset( $_POST['email']) && !empty($_POST['email']) && isset( $_POST['age']) && !empty($_POST['age']) &&isset( $_POST['continent']) &&  !empty($_POST['continent']) && isset( $_POST['esport']) && !empty($_POST['esport']) && isset( $_POST['pays']) && !empty($_POST['pays']) && isset( $_POST['password']) && !empty($_POST['password']))
        {
			include 'models/Users.php';
			//préparer les données pour les mettre dans la base de données
			$firstName = $_POST['firstName'];
			$lastName= $_POST['lastName'];
			$email = $_POST['email'];
			$age= $_POST['age'];
			$pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$pays = $_POST['pays'];
			$esport = $_POST['esport'];
			$continent = $_POST['continent'];
			
			//comparer avec ce que j'ai en bdd
			$model = new \Models\Users();
			
			try 
			{
				//mettre les datas en bdd
				$model -> AddUser($email, $pw, $firstName, $lastName, $age, $pays, $esport);
				
				//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
				$user = $model -> getUserByEmail($email);
				
				$_SESSION['user'] = $firstName.' '.$lastName;
				$_SESSION['userId'] = $user['userId'];
				
				header('location:index.php?page=userDashboard');
					exit;
			}
			catch(\Exception $e)
			{
				$this -> message1 = "Cet email est déjà utilisé";
			}

        }
	}
	
}

