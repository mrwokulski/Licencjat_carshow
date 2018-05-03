<?php

class Register_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	private function saveValue(){

	 $keys = array("login", "mail", "name", "surname", "tel");
		for($i = 0; $i < count ($keys); $i++){
			Session::set('er_'.$keys[$i], $_POST[$keys[$i]]);
		}
	}

	public function newAccount(){

	 Session::init();
	 $correct_params = true;
	 $err = "";

	 $keys = array("login", "password", "mail", "name", "surname");
	 $labels = array("Login", "Hasło", "Email", "Imię", "Nazwisko");

	 for($i = 0; $i < count ($keys); $i++){
		 if (strlen($_POST[$keys[$i]]) < 6  || strlen($_POST[$keys[$i]]) > 30){
	    	$err = $err . '<br/>' . $labels[$i] . " - długość musi znajdować się w przedziale od 6 do 30 znaków ";
	    	$correct_params = false;
	    }
	}

	if($_POST['password'] != $_POST['password2']){
		$err = $err . '<br/>'. "Hasło nie są takie samo";
		$correct_params = false;
	}

	if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
      	$err = $err . '<br/>'. "Podany Email jest nieprawidłowy";
      	$correct_params = false;
	}

    if (!isset($_POST['rules'])){
    	$err = $err . '<br/>' . "Zaakceptuj regulamin";
    	$correct_params = false;
    }

    if (!is_numeric($_POST['tel']) || strlen($_POST['tel']) < 8 ){
    	$err = $err . '<br/>' . "Telefon jest niepoprawny";
    	$correct_params = false;
    }



  $login = filter_input(INPUT_POST, 'login');
  $email = filter_input(INPUT_POST, 'mail');

  $registerQuery = $this->db->prepare('SELECT COUNT(*) FROM users WHERE login= :login OR email= :email');
	$registerQuery->bindValue(':login', $login, PDO::PARAM_STR);
	$registerQuery->bindValue(':email', $email, PDO::PARAM_STR);
	$registerQuery->execute();

	$result = $registerQuery->fetch();

	if ($result[0] != 0 ){
    	$err = $err . '<br/>' . "Użytkownik o podanym loginie lub emailu jest już zarejestrowany";
    	$correct_params = false;
    }



	if(!$correct_params){

	   $this->saveValue();
	   Session::set('error',$err);
	   header('Location: ../register');

	} else {

		$password = filter_input(INPUT_POST, 'password');
		$password = password_hash($password, PASSWORD_DEFAULT);
		$name = filter_input(INPUT_POST, 'name');
		$surname = filter_input(INPUT_POST, 'surname');
		$tel = filter_input(INPUT_POST, 'tel');

		$registerQuery = $this->db->prepare('INSERT INTO users(login,password,email,name,surname,tel,banned,date_register) VALUES (:login, :password, :email, :name, :surname, :tel, 0, :date_register)');

		$registerQuery->bindValue(':login', $login, PDO::PARAM_STR);
		$registerQuery->bindValue(':password', $password, PDO::PARAM_STR);
		$registerQuery->bindValue(':name', $name, PDO::PARAM_STR);
		$registerQuery->bindValue(':surname', $surname, PDO::PARAM_STR);
		$registerQuery->bindValue(':tel', $tel, PDO::PARAM_INT);
		$registerQuery->bindValue(':email', $email, PDO::PARAM_INT);
		$registerQuery->bindValue(':date_register', date("Y-m-d"), PDO::PARAM_STR);
		$registerQuery->execute();

		header('Location: ../login');
	}
	     
	}

}
