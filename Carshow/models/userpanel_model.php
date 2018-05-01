<?php

class Userpanel_Model extends Model {

	public function __construct() {
		parent::__construct();
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
  		$messageQuery = $this->db->prepare('SELECT count(*) as many FROM message where id_user2 = :id_user2 AND unread = 1');
  		$messageQuery->bindValue(':id_user2', $me, PDO::PARAM_INT);
  		$messageQuery->execute();
  		$message = $messageQuery->fetch();
  		echo json_encode($message);
  	}
		  
	


	/*public function sendMessage($id){

		 if(!empty($_POST['message'])){

	      $messageQuery = $this->db->prepare('INSERT INTO message (id_user1, id_user2, message, date, id_offer) VALUES (:id_user1, :id_user2, :message, :date, NULL);');	

	      $date = date("Y-m-d H:i:s");	      	      

	      $me = View::showArrayValue('log',6);
	      $messageQuery->bindValue(':id_user1', $me, PDO::PARAM_INT);
	      $messageQuery->bindValue(':id_user2', $id, PDO::PARAM_INT);
	      $messageQuery->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
	      $messageQuery->bindValue(':date', $date, PDO::PARAM_STR);

	      $messageQuery->execute();
	      $message = $messageQuery->fetchAll();

	     header('Location:' .URL.'userpanel/message/'.$me.'/'.$id);
	  }
		  
	}*/
	
}
