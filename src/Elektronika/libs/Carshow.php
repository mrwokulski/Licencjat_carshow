<?php

class Carshow {

	function __construct() {

		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		
		if (empty($url[0])) {
			require 'controllers/index.php';
			$controller = new Index();
			$controller->loadModel('index');
			$controller->index();
			return false;
		}

		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {
			require $file;
		} else {			
			$this->error();
			exit();
		}

		$controller = new $url[0];
		$controller->loadModel($url[0]);				

	
		if (isset($url[3])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2],$url[3]);
			} else {
				$this->error();
			}
		} 
		else if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
		
		
	}
	
	function error() {
		require 'controllers/error.php';
		$controller = new Error_Code();
		$controller->index();
		return false;
	}

}