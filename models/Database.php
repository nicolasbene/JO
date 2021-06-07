<?php

namespace Models;
//classe mère de tous les models

abstract class Database
{
	protected $bdd;
	
	public function __construct()
	{
		$this -> bdd = new \PDO('mysql:host=db.3wa.io;dbname=benoitnicolas_mcd_virtualjo;charset=utf8mb4','benoitnicolas','b74a7909a070f3e1cf99fd064b7eb736');

	}
	
	public function findAll(string $req,array $params = []):array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		return $query -> fetchAll(\PDO::FETCH_ASSOC);
	}
	
	
	public function findOne(string $req,array $params = []):?array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		$result = $query -> fetch(\PDO::FETCH_ASSOC);
			if($result==false){
				return null;
			}
			else {
				return $result;
			}
	}
	
	public function query(string $req,array $params = [])
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
	}
	
}