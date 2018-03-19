<?php
use Routing\Router;

require(__DIR__ .'/../../bin/init.php');

$request = (isset($_SERVER['REQUEST_URI'])) ? explode('?', $_SERVER['REQUEST_URI'])[0] : '/';

$router = new Router();

if(!$router -> run($request))
	header("HTTP/1.0 404 Not Found");
