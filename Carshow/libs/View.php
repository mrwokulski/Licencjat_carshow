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

}
