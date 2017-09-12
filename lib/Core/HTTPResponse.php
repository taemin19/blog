<?php
namespace Core;

/**
* Class HTTPResponse
* Represents the response sent to the client
*/
class HTTPResponse extends ApplicationComponent
{
	
	/**
	* @var Page represents a page
	*/
	protected $page;

	/**
	* Send a generated page
	*/
	public function send()
	{
		$this->page->generatePage();
		exit;
	}

	/**
	* Add a HTTP header
	* @param string $header
	*/
	public function addHeader($header)
	{
		header($header);
	}

	/**
	* Redirect to a page
	* @param string $location
	*/
	public function redirect($location)
	{
		header('location: '.$location);
		exit;
	}

	/**
	* Redirect to a 404 error page
	*/
	public function redirect404()
	{
		$this->page = new Page($this->app);
		$this->page->setView('404.php');
		$this->addHeader('HTTP/1.0 404 Not Found');
    	$this->send();
	}

	/**
	* Setter
	*/
	public function setPage(Page $page)
	{
		$this->page = $page;
	}
}