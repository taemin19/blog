<?php
namespace app\Backend;

use \Core\Application;

/**
* Class BackendApplication
*/
class BackendApplication extends Application
{
    
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Backend';
    }

    public function run()
    {
        $controller = $this->getController();
        $controller->execute();

        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
}