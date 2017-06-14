<?php

namespace Routing;

use Option\Option;

class Middleware {
	static function readConfigFile(){
		$opt = new Option();
		return $opt -> readOptions('middleware');
	}
}
