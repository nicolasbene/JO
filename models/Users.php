<?php

namespace Models;

class Users extends Database
{

	public function getAllUsers():array
	{
	
		return $this -> findAll("SELECT email, password, firstname, lastname, age FROM users
		");
				
	}
	
	public function addUser($email, $pw, $firstName, $lastName, $age, $pays, $esport)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO users(email, password, firstname, lastname, age, id_pays, id_esport) VALUES (?,?,?,?,?,?,?)",[$email, $pw, $firstName, $lastName, $age, $pays, $esport]);
	}
	public function getUserByEmail($email):?array
	{
		return $this -> findOne("SELECT users.id AS userId, users.email AS userEmail, users.password, firstname, lastname, age, id_pays, id_esport, pays.name AS paysName, esports.name AS esportName FROM users 
		INNER JOIN pays ON users.id_pays = pays.id 
		INNER JOIN esports ON users.id_esport = esports.id 
		WHERE users.email = ?",[$email]);
	}
	
	public function getUserById($id):?array
	{
		return $this -> findAll("SELECT users.id AS userId, users.email AS userEmail, users.password, firstname, lastname, age, id_pays, id_esport, pays.name AS paysName, esports.name AS esportName FROM users 
		INNER JOIN pays ON users.id_pays = pays.id 
		INNER JOIN esports ON users.id_esport = esports.id 
		WHERE users.id = ?",[$id]);
	}
}