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

	}

	/**
	* Setter
	*/
	public function setPage(Page $page)
	{
		$this->page = $page;
	}
}