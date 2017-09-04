<?php
namespace Core;

/**
* Class Application
* Abstract class whose each application will inherit 
*/
abstract class Application
{
	/**
	* @var string application name
	*/
	protected $name;

	public function __construct()
	{
		$this->name = '';
	}

	/**
	* Each application will definite this method
	*/
	abstract public function run();

	/**
	* Getter
	*/
	public function name()
	{
		return $this->name;
	}
}