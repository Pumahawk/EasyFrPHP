<?php
$routeList = [
  [
    'group' => '',
    'middleware' => ['voidGroupMiddleware'],
  	[
		'name' => 'demoHome', 'pattern' => '/',
		'options' => [
		  '_controller' => 'Demo', '_action' => 'hello'
    	]
    ],
    [
    	'group' => '/demo',
    	'middleware' => ['groupMiddleware'],
    	[
			'name' => 'demoHome', 'pattern' => '/middleware_demo.html',
			'options' => [
			  '_controller' => 'Demo', '_action' => 'hello',
			  'middleware' => ['demoMiddleware']
    		]
    	],
    	[
			'name' => 'demoHome', 'pattern' => '/multi_middleware_demo.html',
			'options' => [
			  '_controller' => 'Demo', '_action' => 'hello',
			  'middleware' => ['demoMiddleware', 'demoMiddleware2']
    		]
    	]
    ]
  ]
];

return $routeList;
