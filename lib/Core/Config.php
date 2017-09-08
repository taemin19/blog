<?php
namespace Core;

/**
* Class Config
* Contains application configuration
*/
class Config extends ApplicationComponent
{
	/**
    * @var Router
    */
	protected $router = null;
    /**
    * @var array contains var/value
    */
    protected $vars = [];

    /**
    * @return an instance of Router containing application paths
    */
	public function getRouter()
	{
		$router = new Router;
 	
    	$xml = new \DOMDocument;
    	$xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/routes.xml');
 
    	$routes = $xml->getElementsByTagName('route');
 
    	foreach ($routes as $route)
    	{
      		$vars = [];
 
      		if ($route->hasAttribute('vars'))
      		{
        		$vars = explode(',', $route->getAttribute('vars'));
      		}
 
      		$router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    	}

    	$this->router = $router;
    	
    	return $this->router;
	}

    /**
    * @param string $var
    * @return value of the parameter or null
    */
    public function get($var)
    {
        if (!$this->vars)
        {
            $xml = new \DOMDocument;
            $xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/app.xml');
 
            $elements = $xml->getElementsByTagName('define');
 
            foreach ($elements as $element)
            {
                $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
            }
        }
 
        if (isset($this->vars[$var]))
        {
            return $this->vars[$var];
        }
 
        return null;
    }
}