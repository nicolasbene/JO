<?php

namespace Models;

class Pays extends Database
{

	public function getAllPays():array
	{
	
		return $this -> findAll("SELECT id, name, id_continent FROM pays");
		
	}
	
		public function AddPays($nom, $continent)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO pays(name, id_continent) VALUES (?,?)",[$nom, $continent]);
	}
	
	public function ModifyPays($id, $nom, $continent)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE pays 
		SET name = ?, id_continent  = ?
		WHERE id = ?",[$nom, $continent, $id]);
	}
	
	public function findPaysById($id):?array
	{
		return $this -> findOne("SELECT id, name, id_continent FROM pays WHERE id = ?",[$id]);
	}

}

 