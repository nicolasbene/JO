<?php

namespace Models;

class Admin extends Database
{

	public function getAdminByEmail(string $email):?array
	{
	
		return $this -> findOne("SELECT email, password, firstname, lastname FROM admin WHERE email = ?", [$email]);
		
	}
	
}

