<?php
use RouterRequest\Router;
use EasyFrPHP\Option\Option;

require(__DIR__ .'/../../bin/init.php');

$request = (isset($_SERVER['REQUEST_URI'])) ? explode('?', $_SERVER['REQUEST_URI'])[0] : '/';

$router = new Router();
$opt = new Option();

if(!$router -> run($request, $opt->readOptions('middleware')))
	header("HTTP/1.0 404 Not Found");
