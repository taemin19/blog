<?php
namespace Core;

/**
* Class ApplicationComponent
* Abstract class whose each application component will inherit
*/
abstract class ApplicationComponent
{
	
	/**
	* @var Application represents an application
	*/
	protected $app;

	/**
	* @param Application $app
	*/
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	* Setter
	*/
	public function app()
	{
		return $this->app;
	}
}