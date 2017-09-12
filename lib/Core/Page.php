<?php
namespace Core;

/**
* Class Page
* Represents a page sent by HTTPResponse
*/
class Page extends ApplicationComponent
{
	
	/**
	* @var string $view
	* @var array $vars
	*/
	protected $view;
	protected $vars = [];

	/**
	* Generate a page with a layout and a specific view
	*/
	public function generatePage()
	{
		$twig = TwigFactory::getTwigEnvironment($this->app->name());
		
		if (!empty($this->vars)) 
		{
			echo $twig->render($this->view, $this->vars);
		}
		else
		{
			echo $twig->render($this->view);
		}
	}

	/**
	* Add some variables to the page
	*/
	public function addVar($var, $value)
	{
		if (!is_string($var) || is_numeric($var) || empty($var)) {
			throw new \InvalidArgumentException("The variable must be a string not null");
		}

		$this->vars[$var] = $value;
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