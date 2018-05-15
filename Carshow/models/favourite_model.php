<?php

class Favourite_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
	}


	public function add($id){

		$me = View::showArrayValue('log',6);
		$favQuery = $this->db->prepare("INSERT INTO favourite(id_user, id_offer) VALUES(:id_user, :id_offer) ");
		$favQuery->bindValue("id_user", $me, PDO::PARAM_INT);
		$favQuery->bindValue("id_offer", $id, PDO::PARAM_INT);
		$favQuery->execute();

		header('Location: '.URL.'search'); 

	}

	public function getFavs(){
		
		$me = View::showArrayValue('log',6);
		$favQuery = $this->db->prepare("SELECT DISTINCT o.* FROM favourite f LEFT JOIN offer o ON f.id_offer=o.id WHERE o.user = :id_user;");
		$favQuery->bindValue("id_user", $me, PDO::PARAM_INT);
		$favQuery->execute();
		$favs = $favQuery->fetchAll();

		return $favs;

	}

	public function addFromOffer($id){

		$me = View::showArrayValue('log',6);
		$favQuery = $this->db->prepare("SELECT COUNT(*) as many FROM favourite WHERE id_offer = :id_offer ");	
		$favQuery->bindValue("id_offer", $id, PDO::PARAM_INT);	
		$favQuery->execute();
		$fav = $favQuery->fetch()['many'];

		if($fav == 0){
			$favQuery = $this->db->prepare("INSERT INTO favourite(id_user, id_offer) VALUES(:id_user, :id_offer) ");
			$favQuery->bindValue("id_user", $me, PDO::PARAM_INT);
			$favQuery->bindValue("id_offer", $id, PDO::PARAM_INT);
			$favQuery->execute();
		}
		else
		{
			$favQuery = $this->db->prepare("DELETE FROM favourite WHERE id_offer = :id_offer ");
			$favQuery->bindValue("id_offer", $id, PDO::PARAM_INT);
			$favQuery->execute();
		}

		header('Location: '.URL.'offer/show/'.$id); 

	}


}	