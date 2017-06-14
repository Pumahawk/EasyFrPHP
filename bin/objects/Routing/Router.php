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
      if(isset($data['middleware'])){
		$controller = $data['_controller'].'Controller';
		$action = $data['_action'].'Action';
		
		$ctr = new $controller;
		$finF = $ctr -> $action;
      	$middle = Middleware::readConfigFile();
      	array_reverse($middle);
      	$middlewareList = new Middleware($finF);
      	foreach($middle as $funct)
      		$middlewareList = new Middleware($funct, $middlewareList);
      	$middlewareList -> exec($data['matches']);
      }
      return true;
    }
    else {
      return false;
    }
  }
}
