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
		$favQuery = $this->db->prepare("SELECT DISTINCT o.*, p.* FROM favourite f LEFT JOIN offer o ON f.id_offer=o.id LEFT JOIN offer_has_picture s ON o.id=s.id_offer LEFT JOIN picture p ON s.id_picture=p.id WHERE o.user = :id_user;");
		$favQuery->bindValue("id_user", $me, PDO::PARAM_INT);
		$favQuery->execute();
		$favs = $favQuery->fetchAll();

		return $favs;

	}

}	