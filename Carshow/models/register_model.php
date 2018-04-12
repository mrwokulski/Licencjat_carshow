<?php

class Register_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function newAccount(){
		
	  Session::init();

	  $err = "";



	if(empty($_POST['login']))
		$err = $err . '<br/>'. "Login jest pusty";

	if(empty($_POST['password']))
		$err = $err . '<br/>'. "Hasło jest puste";

	if($_POST['password'] != $_POST['password2'])
		$err = $err . '<br/>'. "Hasło nie są takie samo";

	if(empty($_POST['mail']))
		$err = $err . '<br/>'. "Email jest pusty";

	if(empty($_POST['name']))
		$err = $err . '<br/>'. "Imię jest puste";

	if(empty($_POST['surname']))
		$err = $err . '<br/>'. "Nazwisko jest puste";

	if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) 
      	$err = $err . '<br/>'. "Podany Email jest nieprawidłowy";


	    Session::set('error',$err);

	    header('Location: ../register');


	     /* $login = filter_input(INPUT_POST, 'login');
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
    */
	}

}