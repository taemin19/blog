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
	public funtion getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}

	/**
	* @param string $key
	* @return POST variable
	*/
	public funtion postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}

	/**
	* @return Request method
	*/
	public funtion requestMethod()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	* @return Request URI
	*/
	public funtion requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
	
}