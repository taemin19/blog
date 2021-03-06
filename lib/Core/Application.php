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
	* @var HTTPRequest $httpRequest
	* @var HTTPResponse $httpResponse
	* @var Config $config
	* @var User $user
	*/
	protected $httpRequest;
	protected $httpResponse;
	protected $config;
	protected $user;

	public function __construct()
	{
		$this->name = '';
		$this->httpRequest = new HTTPRequest($this);
		$this->httpResponse = new HTTPResponse($this);
		$this->config = new Config($this);
		$this->user = new User($this);
	}

	/**
	* @return an instance of the corresponding controller
	*/
	public function getController()
	{
		$router = $this->config->getRouter();
		
		// Get the route matching with URL
		$matchedRoute = $router->getRoute($this->httpRequest->requestURI());

		// If the route doesn't match, redirect to a 404 page
		if ($matchedRoute == false)
		{
			$this->httpResponse->redirect404();
		}

		// Add URL variables
		$_GET = array_merge($_GET, $matchedRoute->vars());

		$controller = 'app\\'.$this->name.'\\Controller\\'.$matchedRoute->module().'Controller';
		
    	return new $controller($this, $matchedRoute->module(), $matchedRoute->action());

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

	public function config()
	{
		return $this->config;
	}

	public function user()
	{
		return $this->user;
	}
}