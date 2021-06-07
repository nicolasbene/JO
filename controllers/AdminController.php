<?php

namespace Controllers;

class AdminController {
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
            $template = 'views/admin.phtml';
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
	    	include 'models/Admin.php';
			
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			//comparer avec ce que j'ai en bdd
			$model = new \Models\Admin();
			//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
			$admin = $model -> getAdminByEmail($email);
			
			
			//si l'identifiant existe dans la base alors âdmin contiendra les infos de cet admin
			
			//sinon $admin contiendra false
			
			if(!$admin)
			{
				$this -> message1 = "Mauvais identifiant";
			}
			else
			{
				//vérifier le mot de passe
				if(password_verify($password,$admin['password']))
				{
					//le mot de passe correcpond
					//connecter l'utilisateur
					$_SESSION['admin'] = $admin['firstname'].' '.$admin['lastname'];
					//redirige vers la page tableau de bord du backoffice
					header('location:index.php?page=dashboard');
					exit;
					
				}
				else
				{
					$this -> message2 = "Mauvais mot de passe";
				
				}
			}
	}
	
}


