<?php
namespace Core;

/**
 * Class Entity
 * Represents an entity
 */
 abstract class Entity
 {
 	use Hydrator;

 	/**
 	* @var int $id
 	* @var array $errors
 	*/
 	protected $id;
 	protected $errors = [];

 	/**
 	* @param array $data data to assign
 	* @return void
 	*/
 	public function __construct(array $data = [])
 	{
 		if (!empty($data)) {
 			$this->hydrate($data);
 		}
 	}

 	/**
 	* Check if it is a new entity 
 	* @return bool
 	*/
 	public function isNew()
 	{
 		return empty($this->id);
 	}

 	/**
 	* Setters
 	*/
 	public function setId($id)
 	{
 		$this->id = (int) $id;
 	}

 	/**
 	* Getters
 	*/
 	public function id()
 	{
 		return $this->id;
 	}

 	public function errors()
 	{
 		return $this->errors;
 	}
 } 