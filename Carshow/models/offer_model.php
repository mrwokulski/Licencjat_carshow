<?php

class Offer_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function getOffer($id){
		
		$phoneQuery = $this->db->prepare("SELECT o.*, p.*, u.name, u.surname, u.tel FROM offer o LEFT JOIN users u ON o.user=u.id LEFT JOIN offer_has_picture s ON o.id=s.id_offer LEFT JOIN picture p ON s.id_picture=p.id WHERE o.id=:id");
		$phoneQuery->bindValue("id", $id, PDO::PARAM_INT);
		$phoneQuery->execute();
		$phone = $phoneQuery->fetch();

		$picQuery = $this->db->prepare("SELECT p.link FROM offer o LEFT JOIN offer_has_picture s ON o.id=s.id_offer LEFT JOIN picture p ON s.id_picture=p.id WHERE o.id=:id_offer");
		$picQuery->bindValue("id_offer", $id, PDO::PARAM_INT);
		$picQuery->execute();
		$pic = $picQuery->fetchAll();

		
		echo json_encode(array_merge($phone,$pic));
	}

}	