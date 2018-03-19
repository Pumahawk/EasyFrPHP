<?php

namespace EasyFrPHP\View;

class View {


	public $basePath = "app/Template/";
	public $baseTemplate = 'base';

	public $centerPage;
	public $pathLoader;

	function __construct($center = 'home', $pathLoader = null){
		$this -> centerPage = $center;
		$this -> pathLoader = $pathLoader;
	}

	function render($name, $data = null){
		$name = str_replace(".", '/', $name);
		include($this->basePath.$name.'.php');
	}

	function show($data = null){
		$this -> render($this -> baseTemplate, $data);
	}

	function getText(...$options) {
	    return $this -> pathLoader -> getPath($options);
	}

}
