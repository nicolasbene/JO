<?php

namespace Models;

class Continent extends Database
{

	public function getAllContinents():array
	{
	
		return $this -> findAll("SELECT id, name FROM continents");
		
	}
	
		public function AddContinent($nom)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO continents(name) VALUES (?)",[$nom]);
	}
	
	public function ModifyContinent($id, $nom)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE continents 
		SET name = ?
		WHERE id = ?",[$nom, $id]);
	}
	
	public function findContinentById($id):?array
	{
		return $this -> findOne("SELECT id, name FROM continents WHERE id = ?",[$id]);
	}

}
