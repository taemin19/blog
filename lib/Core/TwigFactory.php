<?php
namespace Core;

/**
* Class TwigFactory
* Represents Twig template environment
*/
class TwigFactory
{
	/**
	* @return instance of Twig environment
	*/
	public static function getTwigEnvironment($app)
  	{
      require_once __DIR__.'/../vendor/autoload.php';
    	$templateDir = __DIR__.'/../../app/Frontend/Templates';
      $templateDir2 = __DIR__.'/../../app/Backend/Templates';
    	$viewDir = __DIR__.'/../../app/'.$app.'/Views';
    	$errorDir = __DIR__.'/../../app/Errors';
    	$loader = new \Twig_Loader_Filesystem(array($templateDir, $templateDir2, $viewDir, $errorDir));
    	$twig = new \Twig_Environment($loader, [
        'cache' => false, //__DIR__.'/../../app/tmp'
      ]);
      $twig->addGlobal('user', new User());
      
    	return $twig;
  	}
}