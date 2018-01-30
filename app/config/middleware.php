<?php
	$middleware = [
		'voidGroupMiddleware' => function($data, $middleware){
			$middleware -> exec();
		},
		'groupMiddleware' => function($data, $middleware){
			echo 'middlewaregroup code before<br>';
			$middleware -> exec();
			echo 'middlewaregroup code after<br>';
		},
		'demoMiddleware' => function($data, $middleware) {
			echo 'middleware code before<br>';
			$middleware -> exec();
			echo 'middleware code after<br>';
		},
		'demoMiddleware2' => function($data, $middleware) {
			echo 'middleware2 code before<br>';
			$middleware -> exec();
			echo 'middleware2 code after<br>';
		}
	];
	return $middleware;
