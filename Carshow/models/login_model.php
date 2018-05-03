<?php

class Login_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function logIn(){

	  if(!empty($_POST['login']) && !empty($_POST['password'])){

	      $login = filter_input(INPUT_POST, 'login');
	      $password = filter_input(INPUT_POST, 'password');

	      $loginQuery = $this->db->prepare('SELECT * FROM users WHERE login= :login');
	      $loginQuery->bindValue(':login', $login, PDO::PARAM_STR);
	      $loginQuery->execute();

	      $user = $loginQuery->fetch();

	      Session::init();

		      if(password_verify($password, $user['password'])){		         
		         Session::set('loggedIn', true);
		         $logArr =  array($user['login'], $user['email'], $user['name'], $user['surname'], $user['tel'], $user['date_register'],$user['id']);
		         Session::set('log', $logArr);
				 Session::set('login', $login);
				 Session::set('login_id', $user['id']);		
				 		 
		         header('location: '.URL);

		      } else {
		       	 Session::set('error', 'Dane logowania są niepoprawne');
		         header('location: '.URL.'/login');
		     }
		        


	   } else {
	  	  Session::set('error', 'Dane logowania są niepoprawne');
	      header('location: '.URL.'login');
	    }


	}

}
