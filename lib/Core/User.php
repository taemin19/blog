<?php
namespace Core;

session_start();

/**
* Class User
* Manage user session
*/
class User
{
	/**
	* Get a flash message
	* @param string $attr
	* @return $flash
	*/
	public function getFlash($attr)
	{
		$flash = $_SESSION[$attr];
    	unset($_SESSION[$attr]);

		return $flash;
	}

	/**
	* Check if a flash message exists
	* @param string $attr
	* @return bool
	*/
	public function hasFlash($attr)
	{
		return isset($_SESSION[$attr]);
	}

	/**
	* Create a flash message
	* @param string $attr
	* @param string or array $value
	*/
	public function setFlash($attr, $value)
	{
		$_SESSION[$attr] = $value;
	}
}