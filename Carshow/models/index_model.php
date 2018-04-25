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

	public function premiumOffers(){

	      $premiumQuery = $this->db->prepare('SELECT o.*, p.link FROM offer o JOIN offer_has_picture h ON o.id = h.id_picture JOIN picture p ON h.id_picture=p.id WHERE o.premium=1 LIMIT 4');	

	      $premiumQuery->execute();
	      $premium = $premiumQuery->fetchAll();

		  echo json_encode($premium);
	}

	
	public function geoIp(){
		$user_ip = Getenv("REMOTE_ADDR");
		$user_ip = "94.75.90.68";
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
		$city = $geo["geoplugin_city"];
		$region = $geo["geoplugin_regionName"];
		$country = $geo["geoplugin_countryName"];
		echo $user_ip."<br>";
		echo "City: ".$city."<br>";
		echo "Region: ".$region."<br>";
		echo "Country: ".$country."<br>";
	}


}