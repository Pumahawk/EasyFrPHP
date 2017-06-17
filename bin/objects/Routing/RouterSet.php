<?php

namespace Routing;

use Routing\Route;

class RouterSet {
  public $routeList = array();

  public function add(Route $route) {
    $this ->routeList[] = $route;
  }

  public function addArray($routeArray, $basePattern = '') {
    foreach ($routeArray as $k => $route) {
    	if(isset($route['group']))
    		$this -> addArray($route,$basePattern.$route['group']);
    	if($k != 'group' || $k == 0)
      		$this -> add(new Route($route['name'], $basePattern.$route['pattern'], $route['options']));
    }
  }

  public function match($string) {
    foreach ($this -> routeList as $route) {
      if ($r = $route -> match($string)) {
        return $r;
      }
    }

    return false;
  }
}
