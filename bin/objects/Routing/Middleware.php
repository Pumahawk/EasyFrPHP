<?php

namespace Routing;

use Option\Option;

class Middleware {

	public $next;
	public $data;
	public $funct;

	public function __construct($funct,$data = null, Middleware $next = null){
		$this -> funct = $funct;
		$this -> next = $next;
		$this -> data = $data;
	}

	function exec(){
		if($this -> next -> next != null){
			$f = $this -> next -> next -> funct;
			$f($this -> data, $this -> next -> next);
		}
	}

	static function readConfigFile(){
		$opt = new Option();
		return $opt -> readOptions('middleware');
	}
}
