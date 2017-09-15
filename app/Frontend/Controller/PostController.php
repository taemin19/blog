<?php
namespace app\Frontend\Controller;

use \Core\Controller;


/**
* Class PostController
*/
class PostController extends Controller
{
	/**
	* Get a list of post
	* @return void
	*/
	public function executePostIndex()
	{
		// Get post manager
    	$manager = $this->getManager();

    	$listPost = $manager->getList();
        
        // Add post list to the page
    	$this->page->addVar('listPost', $listPost);
	}

	/**
	* Get a post
	* @return void
	*/
	public function executePostShow()
	{
    	$manager = $this->getManager();

    	$post = $manager->getUnique($this->app->httpRequest()->getData('id'));

    	// If the post doesn't exist, redirect to 404 page
    	if (empty($post)) {
    		$this->app->httpResponse()->redirect404();
    	}

    	$this->page->addVar('post', $post);
	}

}