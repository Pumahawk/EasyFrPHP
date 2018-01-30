<?php

use View\View;

class DemoController {
	public function helloAction() {
	
		$data['demoMessage'] = DemoMessage::helloMessage();
		
		$templateEngine = new View('pages.demo');
		$templateEngine -> show($data);
	}
}
