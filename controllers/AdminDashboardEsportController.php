<?php

namespace Controllers;

class AdminDashboardEsportController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotAdmin();
		//si le formulaire a été soumis
	
	}

	public function display()
	{
		//afficher les plats
		$model = new \Models\Esport();
		$esports = $model -> getAllEsports();

        $template = 'views/adminDashboardEsport.phtml';
        include 'views/layout.phtml';

        
	}
	
	public function displayAdd()
	{
        $template = 'views/addEsport.phtml';
        include 'views/layout.phtml';
	}
	
	public function addSubmit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['name'];
		$description = $_POST['description'];
		$date_debut  = $_POST['date_debut'];
		$date_fin = $_POST['date_fin'];
		$image = "assets/images/{$_FILES['img']['name']}";
		$alt = $_POST['alt'];

		//upload mon image
		move_uploaded_file ($_FILES['img']['tmp_name'], $image );
	
		
		//mettre les datas en bdd
		$model = new \Models\Esport();
		$model -> AddEsport($nom, $description, $date_debut, $date_fin, $image, $alt);
            
		header('location:index.php?page=adminDashboardEsport');
			exit;
	}
	
	public function displayModify()
	{
	    $model = new \Models\Esport();
	    $esport = $model -> findEsportById($_GET['id']);
	   
        $template = 'views/modifyEsport.phtml';
        include 'views/layout.phtml';
	}
	
	public function modifySubmit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['name'];
		$description = $_POST['description'];
		$date_debut  = $_POST['date_debut'];
		$date_fin = $_POST['date_fin'];
		
		if (empty($_FILES['img']['name'])) 
		{
			$image = $_POST['imgBdd'];
		}
		else 
		{
			$image = "assets/images/{$_FILES['img']['name']}";
			move_uploaded_file ($_FILES['img']['tmp_name'], $image );
		}
		
		$alt = $_POST['alt'];
		
		//mettre les datas en bdd
		$model = new \Models\Esport();
		$modifyEsport = $model -> ModifyEsport($_GET['id'], $nom, $description, $date_debut, $date_fin, $image, $alt);
            
		header('location:index.php?page=adminDashboardEsport');
			exit;
	}
	
	public function deleteEsport()
	{
	    $model = new \Models\Esport();
	    $model -> deleteEsport($_GET['id']);
	    
	}

}