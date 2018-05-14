<?php

class Myoffers_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
	}

	public function getMyOffers(){

		$me = View::showArrayValue('log',6);
		$offersQuery = $this->db->prepare("SELECT DISTINCT o.* FROM offer o WHERE o.user = :id_user;");
		$offersQuery->bindValue("id_user", $me, PDO::PARAM_INT);
		$offersQuery->execute();
		$offers = $offersQuery->fetchAll();

		return $offers;

	}
}