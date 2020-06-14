<?php

abstract class Model
{
	private static $_bdd;

	private static function setBdd()
	{
		try{
			self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
		}catch(Exception $e){
			die ("connexion impossible");
		}
	}

	protected function getBdd()
	{
		if(self::$_bdd == null)
			self::setBdd();
		return self::$_bdd;
	}

	protected function getAll($table, $obj)
	{
		$var = [];

		$req = self::getBdd()->query('SELECT * FROM '.$table. ' ORDER BY id DESC');
		
		while($data = $req->fetch(PDO::FETCH_ASSOC)){
			$var[] = new $obj($data);
		}

		return $var;
		$req->closeCursor();

	}
}