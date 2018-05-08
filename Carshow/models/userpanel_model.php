<?php

class Userpanel_Model extends Model {

	public function __construct() {
		parent::__construct();
		 Session::init();
	}

	private function saveValue(){

	 $keys = array("login", "mail", "name", "surname", "tel");
		for($i = 0; $i < count ($keys); $i++){
			Session::set('er_'.$keys[$i], $_POST[$keys[$i]]);
		}
	}



	public function userData(){

		$userQuery = $this->db->prepare('SELECT login, email, name, surname, tel, date_register FROM users WHERE id=:id');
		$me = View::showArrayValue('log',6);
		$userQuery->bindValue(':id', $me, PDO::PARAM_INT);
	    $userQuery->execute();
	    $user = $userQuery->fetch();

	    return $user;
	}


	public function message($id_1, $id_2){

	      $messageQuery = $this->db->prepare('SELECT u.id, u.name, u.surname, m.message, m.date from message m LEFT JOIN users u ON m.id_user1=u.id where (m.id_user1 = :id1 AND m.id_user2 = :id2) OR (m.id_user1 = :id4 AND m.id_user2 = :id3) ORDER BY m.date ASC;');

	      $messageQuery->bindValue(':id1', $id_1, PDO::PARAM_INT);
	      $messageQuery->bindValue(':id2', $id_2, PDO::PARAM_INT);
	      $messageQuery->bindValue(':id3', $id_1, PDO::PARAM_INT);
	      $messageQuery->bindValue(':id4', $id_2, PDO::PARAM_INT);

	      $messageQuery->execute();
	      $message = $messageQuery->fetchAll();

	      return $message;

	}


	public function sendMessage($id){

		 if(!empty($_POST['message'])){

	      $messageQuery = $this->db->prepare('INSERT INTO message (id_user1, id_user2, message, date, id_offer, unread) VALUES (:id_user1, :id_user2, :message, :date, NULL, :unread);');

	      $date = date("Y-m-d H:i:s");
	      $me = View::showArrayValue('log',6);
	      $messageQuery->bindValue(':id_user1', $me, PDO::PARAM_INT);
	      $messageQuery->bindValue(':id_user2', $id, PDO::PARAM_INT);
	      $messageQuery->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
	      $messageQuery->bindValue(':date', $date, PDO::PARAM_STR);
	      $messageQuery->bindValue(':unread', 1, PDO::PARAM_INT);
	      $messageQuery->execute();

	     header('Location:' .URL.'userpanel/message/'.$me.'/'.$id);
	  }

	}

	public function unreadMessage($id1){

		$messageQuery = $this->db->prepare('UPDATE message SET unread = 0 WHERE id_user1 = :id_user1 AND id_user2 = :id_user2');
		$me = View::showArrayValue('log',6);
		$messageQuery->bindValue(':id_user1', $id1, PDO::PARAM_INT);
	    $messageQuery->bindValue(':id_user2', $me, PDO::PARAM_INT);
	    $messageQuery->execute();

	}


	public function messageAuthor($id, $id2){

	      $messageQuery = $this->db->prepare('SELECT name, surname, id FROM users where id = :id_user OR id = :id_user2');
	      $messageQuery->bindValue(':id_user', $id, PDO::PARAM_INT);
	      $messageQuery->bindValue(':id_user2', $id2, PDO::PARAM_INT);
	      $messageQuery->execute();
	      $messageAuthor = $messageQuery->fetchAll();

	      return $messageAuthor;

  	}

  	public function unreadMessages(){

	  		$me = View::showArrayValue('log',6);
	  		$messageQuery = $this->db->prepare('SELECT count(*) as many FROM message where id_user2=:id_user2 AND unread = 1');
	  		$messageQuery->bindValue(':id_user2', $me, PDO::PARAM_INT);
	  		$messageQuery->execute();
	  		$message = $messageQuery->fetch();
	  		echo json_encode($message);
  	}

  	public function showMessagesUnread(){

			$me = View::showArrayValue('log',6);
			$messageQuery = $this->db->prepare('SELECT u.id, u.name, u.surname, m.message FROM message m RIGHT JOIN users u ON m.id_user1=u.id WHERE m.id_user2=:id_user AND m.unread = 1 GROUP BY u.id;');
	  		$messageQuery->bindValue(':id_user', $me, PDO::PARAM_INT);
	  		$messageQuery->execute();
	  		$message = $messageQuery->fetchAll();

	  		return $message;
	}

	public function showMessagesRead(){

			$me = View::showArrayValue('log',6);
			$messageQuery = $this->db->prepare('SELECT u.id, u.name, u.surname, m.message FROM message m RIGHT JOIN users u ON m.id_user1=u.id WHERE m.id_user2=:id_user AND m.unread = 0  GROUP BY u.id;');
	  		$messageQuery->bindValue(':id_user', $me, PDO::PARAM_INT);
	  		$messageQuery->execute();
	  		$message = $messageQuery->fetchAll();

	  		return $message;
	}


	public function changePassword(){

			$correct_params = true;
			$err = "";

			if(empty($_POST['password_old']) || empty($_POST['password_new']) || empty($_POST['password_new2'])){
				$err = $err . '<br/>'. "Hasło nie może być puste";
				$correct_params = false;
			}

			if(strlen($_POST['password_new'])>20 || strlen($_POST['password_new'])<5 ){
				$err = $err . '<br/>'. "Hasło musi znajdować się w przedziale 5 a 20 znaków";
				$correct_params = false;
			}

			if($_POST['password_new'] != $_POST['password_new2']){
				$err = $err . '<br/>'. "Hasła nie są takie same";
				$correct_params = false;
			}

			if($correct_params) {
				$me = View::showArrayValue('log',6);
				$userQuery = $this->db->prepare('SELECT password FROM users WHERE id=:id');
				$userQuery->bindValue(':id', $me, PDO::PARAM_INT);
				$userQuery->execute();
				$pass = $userQuery->fetch();

				if(!password_verify($_POST['password_old'], $pass['password'])){
					$correct_params = false;
					$err = $err . '<br/>'. "Dawne hasło nie jest poprawne";
				}

				if($correct_params)	{
					$userQuery = $this->db->prepare('UPDATE users SET password = :pass WHERE id=:id');
					$userQuery->bindValue(':id', $me, PDO::PARAM_INT);
					$userQuery->bindValue(':pass', password_hash($_POST['password_new'], PASSWORD_DEFAULT), PDO::PARAM_STR);
					$userQuery->execute();
					header('Location: '.URL.'userpanel/settings');
				}
			}

			if(!$correct_params){
				header('Location: '.URL.'userpanel/change/password');
				Session::set('error', $err);
			}

	}

	public function changeEmail(){

			$correct_params = true;
			$err = "";

			if(empty($_POST['email'])){
				$err = $err . '<br/>'. "Email nie może być pusty";
				$correct_params = false;
			}

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		      	$err = $err . '<br/>'. "Podany Email jest nieprawidłowy";
		      	$correct_params = false;
			}

			if($correct_params)	{
				$userQuery = $this->db->prepare('SELECT count(*) as many FROM users WHERE email=:email');
				$userQuery->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
				$userQuery->execute();
				$user = $userQuery->fetch();

				if($user['many'] != 0){
					$err = $err . '<br/>'. "Podany email znajduje się już w bazie";

				} else {
					$me = View::showArrayValue('log',6);
					$userQuery = $this->db->prepare('UPDATE users SET email = :email WHERE id=:id');
					$userQuery->bindValue(':id', $me, PDO::PARAM_INT);
					$userQuery->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
					$userQuery->execute();
					header('Location: '.URL.'userpanel/settings');
				}

			} else {
				header('Location: '.URL.'userpanel/change/email');
				Session::set('error', $err);

			}

	}

	public function changePhone(){

		$correct_params = true;
		$err = "";

		if(empty($_POST['phone'])){
			$err = $err . '<br/>'. "Telefon nie może być pusty";
			$correct_params = false;
		}

		if (!is_numeric($_POST['phone']) || strlen($_POST['phone']) < 8 || strlen($_POST['phone']) > 11){
    		$err = $err . '<br/>' . "Telefon jest niepoprawny";
    		$correct_params = false;
   		}

   		if($correct_params)	{
   			$me = View::showArrayValue('log',6);
			$userQuery = $this->db->prepare('UPDATE users SET tel = :phone WHERE id=:id');
			$userQuery->bindValue(':id', $me, PDO::PARAM_INT);
			$userQuery->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
			$userQuery->execute();
			header('Location: '.URL.'userpanel/settings');

		} else {
			header('Location: '.URL.'userpanel/change/phone');
			Session::set('error', $err);

		}

	}



	public function changePersonal(){

		$correct_params = true;
		$err = "";

		if(empty($_POST['name']) || empty($_POST['surname'])){
			$err = $err . '<br/>'. "Pola nie mogą być puste";
			$correct_params = false;
		}

		if (is_numeric($_POST['name']) || is_numeric($_POST['surname']) || strlen($_POST['name']) > 30  || strlen($_POST['name']) < 2 || strlen($_POST['surname']) > 30 || strlen($_POST['surname']) < 2){
    		$err = $err . '<br/>' . "Imie lub nazwisko jest niepoprawne";
    		$correct_params = false;
   		}

   		if($correct_params)	{
   			$me = View::showArrayValue('log',6);
			$userQuery = $this->db->prepare('UPDATE users SET name = :name, surname =:surname WHERE id=:id');
			$userQuery->bindValue(':id', $me, PDO::PARAM_INT);
			$userQuery->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
			$userQuery->bindValue(':surname', $_POST['surname'], PDO::PARAM_STR);
			$userQuery->execute();
			header('Location: '.URL.'userpanel/settings');

		} else {
			header('Location: '.URL.'userpanel/change/personal');
			Session::set('error', $err);

		}

	}


}
