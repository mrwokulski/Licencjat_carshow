<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}

	public function render($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/' . $name . '.php';
		}
		else {
			Session::init();
			$logged = Session::get('loggedIn');

			if($logged)
				require 'views/layout/header_userpanel.php';
			else
				require 'views/layout/header.php';

				require 'views/' . $name . '.php';
				require 'views/layout/footer.php';
		}
	}


	public static function printModal($str){
		if(!empty($str)){
			echo '<div class="alert alert-danger alert-dismissible">
	            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	             	<strong>Uwaga!</strong> '.$str.'
	           		</div>
	              </div>';
        }
	}

	public static function saveValue($key){
		if(!empty(Session::get($key)))
			echo Session::get($key);
	}

	public static function showArrayValue($key,$id){
		if(!empty(Session::get($key))){
			$value = Session::get($key);			
			echo $value[$id];
		}
	}

	public static function forLogged($location, $key){
		if(empty(Session::get('loggedIn')) && $key == true){
			header('Location: '.$location);
		}
		if(!empty(Session::get('loggedIn')) && $key == false){
			header('Location: '.$location);
		}			
	}
	

}
