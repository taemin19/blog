<?php
namespace Core;

/**
* Class Controller
* Abstract class whose each controller will inherit 
*/
abstract class Controller extends ApplicationComponent
{
	/**
	* @var string module name
	* @var string action name
	* @var string view name
	*/
	protected $module = '';
	protected $action = '';
	protected $view = '';
	/**
	* @var Page
	*/
	protected $page = null;

	/**
	* @param Application $app
	* @param string $module
	* @param string $action
	*/
	public function __construct(Application $app, $module, $action)
	{
		parent::__construct($app);

		$this->page = new Page($app);

		$this->setModule($module);
		$this->setAction($action);
		$this->setView($action);
	}

	/**
	* @return an instance of the module manager  
	*/
	public function getManager()
	{
		$manager = 'app\\'.$this->app->name().'\\Modules\\'.$this->module().'\\'.$this->module().'Manager'; 
		
		return new $manager(PDOFactory::getMysqlConnexion());
	}

	/**
	* Execute the corresponding action
	*/
	public function execute()
	{
		$method = 'execute'.ucfirst($this->action);

		if (!is_callable([$this, $method]))
    	{
      		throw new \RuntimeException("The ".$this->action." action doesn't exist");
    	}

    	$this->$method();
	}

	/**
	* Setters
	*/
	public function setModule($module) 
	{
		if (!is_string($module) || empty($module)) 
		{
			throw new \InvalidArgumentException("The module must be a valid string");
		}

		$this->module = $module;
	}

	public function setAction($action) 
	{
		if (!is_string($action) || empty($action)) 
		{
			throw new \InvalidArgumentException('The action must be a valid string');
		}

		$this->action = $action;
	}

	public function setView($view) 
	{
		if (!is_string($view) || empty($view)) 
		{
			throw new \InvalidArgumentException('The module must be a valid string');
		}

		$this->view = $view;
		$this->page->setView($this->view.'.php');
	}

	/*
	* Getters
	*/
	public function page()
	{
		return $this->page;
	}

	public function module()
	{
		return $this->module;
	}
}