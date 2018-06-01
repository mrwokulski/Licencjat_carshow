<?php

class Controller {

	function __construct() {
		$this->view = new View();
	}

	public function loadModel($model){

		$path_model = __DIR__.'/../models/'.$model.'_model.php';
        $path_model_win = __DIR__.'\..\models\\'.$model.'_model.php';

		if(file_exists($path_model)){
			require $path_model;
			$modelName = $model . '_Model';
			$this->model = new $modelName;
		}
		else if(file_exists($path_model_win)){
            require $path_model_win;
            $modelName = $model . '_Model';
            $this->model = new $modelName;
        }

	}

}