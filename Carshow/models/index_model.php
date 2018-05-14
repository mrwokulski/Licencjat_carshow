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

	public function premiumOffers(){

	      $premiumQuery = $this->db->prepare('SELECT o.*, p.link FROM offer o JOIN offer_has_picture h ON o.id = h.id_picture JOIN picture p ON h.id_picture=p.id WHERE o.premium=1 LIMIT 4');

	      $premiumQuery->execute();
	      $premium = $premiumQuery->fetchAll();

		  echo json_encode($premium);
	}


	public function getSettings(){
		
		$settingsQuery = $this->db->prepare('SELECT * FROM settings');
		$settingsQuery->execute();
		$settings = $settingsQuery->fetch();

		return $settings;

	}

	private function saveValue(){

		 $keys = array("type", "state", "category", "maker", "model", "tags", "price1", "price2");
			for($i = 0; $i < count ($keys); $i++){
				if(!empty($_POST[$keys[$i]]))
						Session::set('er_'.$keys[$i], $_POST[$keys[$i]]);
			}
	}
}
