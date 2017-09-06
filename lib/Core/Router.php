<?php
namespace Core;

/**
* Class Router
*/
class Router
{
	/**
	* @var array route list
	*/
	protected $routes = [];
 
 	/**
 	* Add a route to route list
 	* @param Route $route
 	*/
  public function addRoute(Route $route)
  {
    if (!in_array($route, $this->routes))
    {
      $this->routes[] = $route;
    }
  }
 
 	/**
 	*	Return the route matching the URL
 	* @return
 	*/
  public function getRoute($url)
  {
    foreach ($this->routes as $route)
    {
      // if the route matches the url
      if (($varsValues = $route->match($url)) !== false)
      {
     		// if the route has variables   
        if ($route->hasVars())
        {
          $varsNames = $route->varsNames();
          $listVars = [];
 
          foreach ($varsValues as $key => $match)
          {
            
            if ($key !== 0)
            {
              $listVars[$varsNames[$key - 1]] = $match;
            }
          }
 
          $route->setVars($listVars);
        } 
        
        return $route;
      }
    }
 
    throw new \Exception('No matching routes');
  }
}