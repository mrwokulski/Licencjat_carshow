<?php

class Login_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function logIn(){
		

	  if($_POST['login'] != null && $_POST['password'] != null){      

	      $login = filter_input(INPUT_POST, 'login');
	      $password = filter_input(INPUT_POST, 'password');

	      $loginQuery = $this->db->prepare('SELECT * FROM users WHERE login= :login');
	      $loginQuery->bindValue(':login', $login, PDO::PARAM_STR);
	      $loginQuery->execute();

	      $user = $loginQuery->fetch();	     
	       
		      if(password_verify($password, $user['password'])){
		         Session::init();
		         Session::set('loggedIn', true);
		         header('location: ../userpanel');          

		      } else 
		         header('location: ../login');
		      
      
	   } else 
	      header('location: ../login');  
    
	}

}