<?php
namespace app\Frontend\Controller;

use \Core\Controller;
use \Core\HTTPRequest;
use \Core\FormValidator;
use \Core\Entity\Contact;

/**
* Class DefaultController
*/
class DefaultController extends Controller
{
	/**
	* Send an email via contact form
	*/
	public function executeHome(HTTPRequest $request) 
	{
		if ($request->requestMethod() == 'POST' ) 
		{
			$this->processForm($request);
				
			$this->app->httpResponse()->redirect('/#contact');
		}
	}

	/**
	* Check if form is valid and send email
	*/
	public function processForm(HTTPRequest $request)
	{
		// Fields validation with rules
		$validator = new FormValidator($_POST);
		$validator->check('name', 'required');
		$validator->check('name', 'maxLength', 40);
		$validator->check('email', 'required');
		$validator->check('email', 'email');
		$validator->check('subject', 'required');
		$validator->check('subject', 'maxLength', 100);
		$validator->check('message', 'required');

		// Form validation
		if ($validator->isValid()) 
		{
			$contact = new Contact([
				'name' => $request->postData('name'),
				'email' => $request->postData('email'),
				'subject' => $request->postData('subject'),
				'message' => $request->postData('message')
			]);

			// Send email
			$emailTo = $this->app->config()->get('contact_email');
			$headers = 'From: '.$contact->name().' <'.$contact->email().'>';
			mail($emailTo, $contact->subject(), $contact->message(), $headers);

			// User message
			$this->app->user()->setFlash('success', 'Your message has been successfully set.');
		}
		else
		{
			// User message
			$this->app->user()->setFlash('errors', $validator->errors());
		}
	}
}