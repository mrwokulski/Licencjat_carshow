<?php

class Index_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function sitePatch(){
		echo URL;
	}

	public function topOffers(){

	      $offersQuery = $this->db->prepare('SELECT o.*, p.link FROM offer o LEFT JOIN offer_has_picture h ON o.id = h.id_picture LEFT JOIN picture p ON h.id_picture=p.id WHERE o.actual=1 ORDER BY o.id DESC LIMIT 8');

	      $offersQuery->execute();
	      $offer = $offersQuery->fetchAll();

		  echo json_encode($offer);
	}	


	public function getSettings(){
		
		$settingsQuery = $this->db->prepare('SELECT * FROM settings');
		$settingsQuery->execute();
		$settings = $settingsQuery->fetch();

		return $settings;

	}
	
	public function archiveOffers(){

        $offerQuery = $this->db->prepare('UPDATE offer SET actual = 0 WHERE DATEDIFF(NOW(), date_added)> 30 ;');
        $offerQuery->execute();
    }
}
