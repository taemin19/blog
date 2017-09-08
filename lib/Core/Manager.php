<?php
namespace Core;

/**
* Class Manager
* Abstract class whose each manager will inherit
*/
abstract class Manager
{
	/**
	* @var object represents database connexion
	*/
	protected $dao;

	/**
	* @param object $dao
	*/
	public function __construct($dao)
	{
		$this->dao = $dao;
	}
}