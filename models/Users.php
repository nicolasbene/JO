<?php

namespace Models;

class Users extends Database
{

	public function getAllUsers():array
	{
	
		return $this -> findAll("SELECT email, password, firstname, lastname, age FROM users
		");
				
	}
	
		public function AddUser($email, $pw, $firstName, $lastName, $age, $pays, $esport)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO users(email, password, firstname, lastname, age, id_pays, id_esport) VALUES (?,?,?,?,?,?,?)",[$email, $pw, $firstName, $lastName, $age, $pays, $esport]);
	}
	public function getUserByEmail($email):?array
	{
		return $this -> findOne("SELECT id, email, password, firstname, lastname, age FROM users
		 WHERE email = ?",[$email]);
	}
}