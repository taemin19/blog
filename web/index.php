<?php
// Name of default application
const DEFAULT_APP = 'Frontend';
 
// If application is not valid, the default application is load to display 404 page
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../app/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;
 
// Autoloader for classes
require __DIR__.'/../lib/Core/SplClassLoader.php';

$CoreLoader = new SplClassLoader('Core', __DIR__.'/../lib');
$CoreLoader->register();
 
$appLoader = new SplClassLoader('app', __DIR__.'/..');
$appLoader->register();  
 
// Launch of the application
$appClass = 'app\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
 
$app = new $appClass;
$app->run();