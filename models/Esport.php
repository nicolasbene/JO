<?php

namespace Models;

class Esport extends Database
{
    public function getAllEsports():array
	{
	
		return $this -> findAll("SELECT id, name, description, date_debut, date_fin, src, alt FROM esports
		");
				
	}
	
	public function AddEsport($nom, $description, $date_debut, $date_fin, $image, $alt)
	{
		//requêtes sql qui permet l'ajout du plat
		$this -> query("INSERT INTO esports(name, description, date_debut, date_fin, src, alt) VALUES (?,?,?,?,?,?)",[$nom, $description, $date_debut, $date_fin, $image, $alt]);
	}
	
	public function ModifyEsport($id, $nom, $description, $date_debut, $date_fin, $image, $alt)
	{
		//requêtes sql qui permet de modifier les plats
		$this -> query("UPDATE esports 
		SET name = ?, description = ?, date_debut = ?, date_fin= ?, src = ?, alt = ?
		WHERE id = ?",[$nom, $description, $date_debut, $date_fin, $image, $alt, $id]);
	}
	
	public function findEsportById($id):?array
	{   
	    //requêtes sql qui permet de sélectionner un plat
		return $this -> findOne("
		SELECT id, name, description, date_debut, date_fin, src, alt 
		FROM esports 
		WHERE id = ?",[$id]);
	}
	
	public function deleteEsport($id)
	{
		//requêtes sql qui permet de supprimer un plat
		$this -> query("DELETE FROM esports WHERE id = ? ",[$id]);
	}
}
