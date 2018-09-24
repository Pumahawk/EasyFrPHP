<?php
function baseAutoload($dir, $object){
		$object = str_replace("\\", '/', $object);
		@include_once($dir.'/'.$object.'.php');
}

	function controller($object){
		baseAutoload('app/Controller', $object);
	}

	function model($object){
		baseAutoload('app/Model', $object);
	}

	function view($object){
		baseAutoload('app/View', $object);
	}

	function systemObj($object){
		baseAutoload('bin/objects', $object);
	}

	spl_autoload_register('controller');
	spl_autoload_register('model');
	spl_autoload_register('view');
	//spl_autoload_register('systemObj');
