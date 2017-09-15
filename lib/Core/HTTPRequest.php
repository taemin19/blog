<?php
namespace Core;

/**
* Class HTTPRequest
* Represents a client request
*/
class HTTPRequest extends ApplicationComponent
{
	/**
	* @param string $key
	* @return GET variable
	*/
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}

	/**
	* @param string $key
	* @return bool
	*/
	public function getExists($key)
  	{
    	return isset($_GET[$key]);
  	}

	/**
	* @param string $key
	* @return POST variable
	*/
	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}

	/**
	* @param string $key
	* @return bool
	*/
	public function postExists($key)
  	{
    	return isset($_POST[$key]);
  	}
  	
	/**
	* @return Request method
	*/
	public function requestMethod()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	* @return Request URI
	*/
	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
	
}