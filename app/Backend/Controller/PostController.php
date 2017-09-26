<?php
namespace app\Backend\Controller;

use \Core\Controller;
use \Core\HTTPRequest;
use \Core\FormValidator;
use \Core\Entity\Post;


/**
* Class PostController
*/
class PostController extends Controller
{
	/**
	* Get a list of post and add a post
    * @param HTTPRequest $request
	* @return void
	*/
	public function executePostInsert(HTTPRequest $request)
	{
		// Get post manager
    	$manager = $this->getManager();
    	$listPost = $manager->getList();
        
        // Get characters limit of post content 
        $postCharacters = $this->app->config()->get('post_characters');	
        foreach ($listPost as $post) 
        {
        	if (strlen($post->content()) > $postCharacters) 
        	{
        		$abstract = substr($post->content(), 0, $postCharacters);
        		$abstract = substr($abstract, 0, strrpos($abstract, ' ')). '...';
        		$post->setContent($abstract);
        	}
        }

        // Add post list to the page
    	$this->page->addVar('listPost', $listPost);

        // Add post in the database
    	if ($request->requestMethod() == 'POST' ) 
		{
			$this->processForm($request);
				
			$this->app->httpResponse()->redirect('/admin/post-insert/#add-form');
		}

	}

    /**
    * Check if form is valid and save post in database
    * @param HTTPRequest $request
    */
    public function processForm(HTTPRequest $request)
    {
        // Fields validation with rules
        $validator = new FormValidator($_POST);
        $validator->check('author', 'required');
        $validator->check('author', 'maxLength', 10);
        $validator->check('title', 'required');
        $validator->check('title', 'maxLength', 100);
        $validator->check('lead', 'required');
        $validator->check('lead', 'maxLength', 200);
        $validator->check('content', 'required');

        // Form validation
        if ($validator->isValid()) 
        {
            $post = new Post([
                'author' => $request->postData('author'),
                'title' => $request->postData('title'),
                'lead' => $request->postData('lead'),
                'content' => $request->postData('content')
            ]);

            // Check if the post is new (add) or not (update)
            if ($request->getExists('id')) 
            {
                $post->setId($request->getData('id'));
            }

            $manager = $this->getManager();
            $manager->save($post);

            // User message
            $this->app->user()->setFlash('success', $post->isNew() ? 'Your post has been successfully add.' : 'The post has been successfully update.');
        }
        else
        {
            // Pre-fill the form with valid fiels
            $this->app->user()->setFlash('validFields', $validator->validFields());
            // User message
            $this->app->user()->setFlash('errors', $validator->errors());
        }
    }

}