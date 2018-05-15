<?php

class View {

	function __construct() {
		Session::init();
	}

	public function render($name, $function = false, $argument = false)
	{
					
			$logged = Session::get('loggedIn');

			if($logged)
				require 'views/layout/header_userpanel.php';
			else
				require 'views/layout/header.php';	
				require 'views/' . $name . '.php';
				require 'views/layout/footer.php';
		
	}

	public function onlyForAdmin(){
		if(View::showArrayValue('log',7) == 0){
			header('Location: '.URL);
			exit;
		}
	}


	public function onlyForLogged(){
		if(empty(Session::get('log'))){
			header('Location: '.URL);
			exit;
		}

	}

	
	public function renderOffer($key)
	{			
			$logged = Session::get('loggedIn');

			if($logged)
				require 'views/layout/header_userpanel.php';
			else
				require 'views/layout/header.php';
				Session::set('id_offer', $key);
				require 'views/offer/index.php';
				require 'views/layout/footer.php';		


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
			return $value[$id];
		}
	}

	public static function forLogged($location, $key){
		if(empty(Session::get('loggedIn')) && $key == true){
			header('Location: '.$location);
			exit;
		}
		if(!empty(Session::get('loggedIn')) && $key == false){
			header('Location: '.$location);
			exit;
		}			
	}

	public function testIdMessage($id_1, $id_2){
	    $me = $this->showArrayValue('log',6);
		if(($id_1 != $me && $id_2 != $me) || $id_1 == $id_2){
			header('Location: '.URL);
			exit;
		}
	}

	public function notMe($id_1, $id_2, $me){
		if($id_1 == $me)
			return $id_2;
		else
			return $id_1;
	}


	public static function polishDate($date){
		 $date_pl = explode("-", $date);
    	return $date_pl[2].'-'.$date_pl[1].'-'.$date_pl[0];
	}

}
