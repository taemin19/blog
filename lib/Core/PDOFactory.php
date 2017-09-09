<?php
namespace Core;

/**
* Class PDOFactory
* Represents data base connexion using PDO
*/
class PDOFactory
{
	/**
	* @return $db instance of PDO
	*/
	public static function getMysqlConnexion()
	{
		$db = new \PDO('mysql:host=localhost;dbname=ocp5_test', 'root', '');
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $db;
	}
}