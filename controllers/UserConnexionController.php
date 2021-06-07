<?php

namespace Controllers;

class UserConnexionController {
    private $message1;
    private $message2;
    
    public function __construct()
    {
        $this -> message1 = "";
        $this -> message2 = "";
        $this -> display();
      
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
            $template = 'views/connexion.phtml';
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
			$pw = $_POST['pw'];
			
			//comparer avec ce que j'ai en bdd
			$model = new \Models\Users();
			//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
			$user = $model -> getUserByEmail($email);
			
			//si l'identifiant existe dans la base alors âdmin contiendra les infos de cet admin
			
			if(!$user)
			{
				$this -> message1 = "Mauvais identifiant";
			}
			else
			{
				//vérifier le mot de passe
				if(password_verify($pw,$user['password']))
				{
					
					//connecter l'utilisateurs
					$_SESSION['user'] = $user['firstname'].' '.$user['lastname'];
					
					$_SESSION['idUser'] = $user['id'];
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

