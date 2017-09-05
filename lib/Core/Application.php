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
	/**
	* @var HTTPRequest
	* @var HTTPResponse
	*/
	protected $httpRequest;
	protected $httpResponse;

	public function __construct()
	{
		$this->name = '';
		$this->httpRequest = new HTTPRequest;
		$this->httpResponse = new HTTPResponse;
	}

	/**
	* Each application will definite this method
	*/
	abstract public function run();

	/**
	* Getters
	*/
	public function name()
	{
		return $this->name;
	}

	public function httpRequest()
	{
		return $this->httpRequest;
	}

	public function httpResponse()
	{
		return $this->httpResponse;
	}
}