<?php

class Index_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function sitePatch(){
		echo URL;
	}

	public function topOffers(){

	      $offersQuery = $this->db->prepare('SELECT o.*, p.link FROM offer o JOIN offer_has_picture h ON o.id = h.id_picture JOIN picture p ON h.id_picture=p.id LIMIT 8');

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

	
 master
	public function geoIp(){

		$latitude = "52.2486241";  
		$longitude = "21.0119712";
	

		if(!empty($_POST['lon']) && !empty($_POST['lat']) && !empty($_POST['city']) && $_POST['lon'] != "err" && $_POST['lat'] != "err" && $_POST['city'] != "err"){

			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$city = $_POST['city'];

		} else {

			$user_ip = Getenv("REMOTE_ADDR");
			$user_ip = "94.75.90.68";
			$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

			if(!empty($geo["geoplugin_latitude"]) && !empty($geo["geoplugin_longitude"])){		
				$latitude = $geo["geoplugin_latitude"];
				$longitude = $geo["geoplugin_longitude"];
				$city = $geo["geoplugin_city"];
			}
		
		}		

		$loc = array();
		array_push($loc,$latitude);
		array_push($loc,$longitude);
		array_push($loc,$city);	
		echo json_encode($loc);		

	}
	

	private function saveValue(){

		 $keys = array("type", "state", "category", "maker", "model", "tags", "price1", "price2");
			for($i = 0; $i < count ($keys); $i++){
				if(!empty($_POST[$keys[$i]]))
						Session::set('er_'.$keys[$i], $_POST[$keys[$i]]);
			}
	}
}
