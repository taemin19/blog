<?php
namespace Core;

/**
* Class Page
* Represents a page sent by HTTPResponse
*/
class Page extends ApplicationComponent
{
	
	/**
	* @param string
	*/
	protected $view;

	/**
	* Generate a page with a layout and a specific view
	*/
	public function generatePage()
	{

	}

	/**
	* Setters
	*/
	public function setView($view)
	{
		if (!is_string($view) || empty($view)) {
			throw new \InvalidArgumentException("View invalid");
		}

		$this->view = $view;
	}
	
}