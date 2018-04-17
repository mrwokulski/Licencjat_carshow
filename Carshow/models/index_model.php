<?php

class Index_Model extends Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function topOffers(){

	      $offersQuery = $this->db->prepare('SELECT o.*, p.link FROM offer o JOIN offer_has_picture h ON o.id = h.id_picture JOIN picture p ON h.id_picture=p.id LIMIT 8');	

	      $offersQuery->execute();
	      $offer = $offersQuery->fetchAll();

		  echo json_encode($offer);
	}

}