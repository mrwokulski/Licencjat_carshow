<?php

class Admin_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
	}

	
	public function stats(){

		  $stats = array();
	      $statsQuery = $this->db->prepare('SELECT COUNT(*) as many FROM users');	    
	      $statsQuery->execute();
	      $stat = $statsQuery->fetch();

	      array_push($stats, $stat['many']);

	       $statsQuery = $this->db->prepare('SELECT COUNT(*) as many_of FROM offer WHERE actual=1');	    
	       $statsQuery->execute();
	       $stat = $statsQuery->fetch();

	      array_push($stats, $stat['many_of']);

	       $statsQuery = $this->db->prepare('SELECT COUNT(*) as many_ofn FROM offer WHERE actual=0');	    
	       $statsQuery->execute();
	       $stat = $statsQuery->fetch();

	      array_push($stats, $stat['many_ofn']);

	      $statsQuery = $this->db->prepare('SELECT COUNT(*) as many_ofd FROM offer WHERE date_added=:date');	
	      $statsQuery->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);    
	      $statsQuery->execute();
	      $stat = $statsQuery->fetch();

	      array_push($stats, $stat['many_ofd']);

	      return $stats;
	}


	public function users(){

		 $usersQuery = $this->db->prepare('SELECT login, email, name, surname, tel, date_register, id, banned FROM users ORDER BY banned, login;');	
	     $usersQuery->execute();
	     $users = $usersQuery->fetchAll();

	     return $users;
	}

	public function user($id){

		 $usersQuery = $this->db->prepare('SELECT login, email, name, surname, tel, date_register, id FROM users WHERE id=:id');
		 $usersQuery->bindValue(':id', $id, PDO::PARAM_STR);   	
	     $usersQuery->execute();
	     $user = $usersQuery->fetch();

	     return $user;
	}

	public function editUser($id){

		$login = filter_input(INPUT_POST, 'login');
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		if($password != "")
			$password = password_hash($password, PASSWORD_DEFAULT);
		$name = filter_input(INPUT_POST, 'name');
		$surname = filter_input(INPUT_POST, 'surname');
		$tel = filter_input(INPUT_POST, 'tel');

		if(!empty($login) && !empty($email) && !empty($name) && !empty($surname) && !empty($tel)){

		if($password != "")
		 $updateQuery = $this->db->prepare('UPDATE users SET login=:login, email=:email, password=:password, name=:name, surname=:surname, tel=:tel WHERE id=:id');
		else
			$updateQuery = $this->db->prepare('UPDATE users SET login=:login, email=:email, name=:name, surname=:surname, tel=:tel WHERE id=:id');

		 $updateQuery->bindValue(':id', $id, PDO::PARAM_INT); 
		 $updateQuery->bindValue(':login', $login, PDO::PARAM_STR);     
		 $updateQuery->bindValue(':email', $email, PDO::PARAM_STR); 
		 if($password != "")   
		 	$updateQuery->bindValue(':password', $password, PDO::PARAM_STR);  
		 $updateQuery->bindValue(':name', $name, PDO::PARAM_STR);  
		 $updateQuery->bindValue(':surname', $surname, PDO::PARAM_STR);
		 $updateQuery->bindValue(':tel', $tel, PDO::PARAM_STR);   

	     $updateQuery->execute(); 

	     header('Location: '.URL.'admin/users'); 

	     } else {
	     	header('Location: '.URL.'edit_user/'.$id);
	     }
	   	
	}

	public function banUser($id){

		$userQuery = $this->db->prepare('SELECT banned FROM users WHERE id=:id');
		$userQuery->bindValue(':id', $id, PDO::PARAM_INT); 
		$userQuery->execute();
		$ban = $userQuery->fetch()['banned'];

		if($ban == 1)
			$ban = 0;
		else
			$ban = 1;

		$updateQuery = $this->db->prepare('UPDATE users SET banned = :ban WHERE id=:id');
		$updateQuery->bindValue(':ban', $ban, PDO::PARAM_INT); 
		$updateQuery->bindValue(':id', $id, PDO::PARAM_INT); 
	    $updateQuery->execute();

	    header('Location: '.URL.'admin/users'); 
	}

	public function isBanned($id){

		$userQuery = $this->db->prepare('SELECT banned FROM users WHERE id=:id');
		$userQuery->bindValue(':id', $id, PDO::PARAM_INT); 
		$userQuery->execute();
		$ban = $userQuery->fetch()['banned'];

		if($ban == 1)
			$ban = true;
		else
			$ban = false;

		return $ban;		
	  
	}

	
}
