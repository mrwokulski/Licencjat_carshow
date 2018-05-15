<?php

class Controller {

	function __construct() {
		$this->view = new View();
	}

	public function loadModel($model){

		$path_model = 'models/'.$model.'_model.php';

		if(file_exists($path_model)){
			require 'models/'.$model.'_model.php';
			$modelName = $model . '_Model';
			$this->model = new $modelName;
		}
	}

}