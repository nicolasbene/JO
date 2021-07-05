<?php

namespace Controllers;

class UserConnexionController {
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
		//afficher le formulaire de connexion
            $template = 'views/userConnexion.phtml';
            include 'views/layout.phtml';
	}
	public function disconnect()
	{
	    //je déconnecte l'utilisateur
			session_destroy();
			header('location:index.php');
			exit;
	}
	public function submit() 
	{
	    	include 'models/Users.php';
			
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			//comparer avec ce que j'ai en bdd
			$model = new \Models\Users();
			//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
			$user = $model -> getUserByEmail($email);
			
			//si l'identifiant existe dans la base alors âdmin contiendra les infos de cet user
			
			//sinon $user contiendra false
			
			if(!$user)
			{
				$this -> message1 = "Mauvais identifiant";

			}
			else
			{
				//vérifier le mot de passe
				if(password_verify($password,$user['password']))
				{
					//le mot de passe correcpond
					//connecter l'utilisateur
					$_SESSION['user'] = $user['firstname'].' '.$user['lastname'];
					$_SESSION['userId'] = $user['userId'];

					//redirige vers la page tableau de bord du backoffice
					header('location:index.php?page=userDashboard');
					exit;
					
				}
				else
				{
					$this -> message2 = "Mauvais mot de passe";
				
				}
			}
	}
	
}


