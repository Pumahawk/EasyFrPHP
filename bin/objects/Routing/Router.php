<?php

namespace Routing;

class Router {
  public $routerSet;

  function __construct($routesPathFile = 'app/config/router') {
    $this -> routerSet = new RouterSet();
    $arrayRoutes = include $routesPathFile . '.php';
    $this -> routerSet -> addArray($arrayRoutes);
  }

  public function run($url) {
    $data = $this -> routerSet -> match($url);
    if(isset($data['_controller'], $data['_action'])) {
		$controller = $data['_controller'].'Controller';
		$action = $data['_action'].'Action';
	
		$ctr = new $controller;
		$finF = function() use ($ctr, $action, $data){
			$ctr -> $action($data);
		};
      	if(isset($data['middleware'])){
		  	$middle = Middleware::readConfigFile();
		  	$middle = array_reverse($middle);
		  	$middlewareList = (new Middleware($finF));
		  	foreach($middle as $funct){
		  		$p = new Middleware($funct, $data['matches'], $middlewareList);
		  		$middlewareList = $p;
		  	}
		  	$f = $middlewareList -> funct;
		  	$f($middlewareList);
      	}
      	else
      		$finF();
      return true;
    }
    else {
      return false;
    }
  }
}
