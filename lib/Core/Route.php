<?php
namespace Core;

/**
* Class Route
*/
class Route
{
	/**
	* @var string
	* @var string 
	*/
	protected $url;
	protected $module;
	protected $action;
	/**
	* @var array variable names
	* @var array variable names and variable values
	*/
	protected $varsNames;
	protected $vars = [];

	/**
	* @param string $url
	* @param string $action
	* @param array $varsNames
	*/
	public function __construct($url, $module, $action, array $varsNames)
	{
		$this->setUrl($url);
		$this->setModule($module);
	    $this->setAction($action);
	    $this->setVarsNames($varsNames);
	}

	/**
	* Checks if the route has variables
	* @return
	*/
	public function hasVars()
	{
		return !empty($this->varsNames);
	}

	/**
	* Checks if the route matches the url
	* @return
	*/
	public function match($url)
	{
		$url = trim($url, '/');
		$regex = '#^'.$this->url.'$#';

		if (preg_match($regex, $url, $matches))
    	{
      		return $matches;
    	}
    	else
    	{
      		return false;
    	}
	}

	/**
	* Setters
	*/
	public function setUrl($url)
	{
		if (is_string($url)) 
		{
			$this->url = trim($url, '/');
		}
	}

	public function setModule($module)
  	{
    	if (is_string($module))
    	{
     	 	$this->module = $module;
    	}
  	}

	public function setAction($action)
  	{
    	if (is_string($action))
    	{
     	 	$this->action = $action;
    	}
  	}

  	public function setVarsNames(array $varsNames)
  	{
    	$this->varsNames = $varsNames;
  	}
 
  	public function setVars(array $vars)
  	{
    	$this->vars = $vars;
  	}

  	/**
  	* Getters
  	*/
  	public function module()
  	{
    	return $this->module;
  	}

  	public function action()
  	{
    	return $this->action;
  	}

  	public function vars()
  	{
    	return $this->vars;
  	}
 
  	public function varsNames()
  	{
    	return $this->varsNames;
  	}
}