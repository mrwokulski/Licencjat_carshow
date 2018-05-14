<?php

class Search_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function search(){
		
		$keys = array("type", "state", "category", "maker", "model", "tags", "price1", "price2");

		$type = filter_input(INPUT_POST, 'type');
		$category = filter_input(INPUT_POST, 'category');
		$state = filter_input(INPUT_POST, 'state');
		$maker = filter_input(INPUT_POST, 'maker');
		$model = filter_input(INPUT_POST, 'model');
		$tags = filter_input(INPUT_POST, 'tags');
		$price1 = filter_input(INPUT_POST, 'price1');
		$price2 = filter_input(INPUT_POST, 'price2');

		$offers = array();

		$tag = explode(' ',$tags);
			
		$price1 = (empty($price1)) ? 0 : $price1;
		$price2 = (empty($price2)) ? 100000000 : $price2;

		if(empty($type))
			$type = '';

		if(empty($category))
			$category = '';

		if(empty($state) || $state == 4)
			$state = '';

		if(empty($maker))
			$maker = '';

		if(empty($model))
			$model = '';

		if(!empty($tags))
		{


			for($i=0; $i<count($tag); $i++){
				$tagQuery = $this->db->prepare("SELECT o.* FROM offer o 
											   WHERE o.type LIKE :type AND o.category LIKE :category AND o.state LIKE :state AND o.maker LIKE :maker AND
											    o.model LIKE :model AND o.title LIKE :tag AND o.price BETWEEN :price1 AND :price2 AND o.actual = 1");
				
				$tagQuery->bindValue(':tag', "%".$tag[$i]."%", PDO::PARAM_STR);
				$tagQuery->bindValue(":type", "%".$type."%", PDO::PARAM_INT);
				$tagQuery->bindValue(":category", "%".$category."%", PDO::PARAM_INT);
				$tagQuery->bindValue(":state", "%".$state."%", PDO::PARAM_INT);
				$tagQuery->bindValue(":maker", "%".$maker."%", PDO::PARAM_STR);
				$tagQuery->bindValue(":model", "%".$model."%", PDO::PARAM_STR);
				$tagQuery->bindValue(":price1", $price1, PDO::PARAM_INT);
				$tagQuery->bindValue(":price2", $price2, PDO::PARAM_INT);
				$tagQuery->execute();
				$tagOffers = $tagQuery->fetchAll();

				$tagQuery2 = $this->db->prepare("SELECT o.* FROM offer o 
											   WHERE o.type LIKE :type AND o.category LIKE :category AND o.state LIKE :state AND o.maker LIKE :maker AND
											    o.model LIKE :model AND o.description LIKE :tag AND o.price BETWEEN :price1 AND :price2 AND o.actual = 1");

				$tagQuery2->bindValue(':tag', "%".$tag[$i]."%", PDO::PARAM_STR);
				$tagQuery2->bindValue(":type", "%".$type."%", PDO::PARAM_INT);
				$tagQuery2->bindValue(":category", "%".$category."%", PDO::PARAM_INT);
				$tagQuery2->bindValue(":state", "%".$state."%", PDO::PARAM_INT);
				$tagQuery2->bindValue(":maker", "%".$maker."%", PDO::PARAM_STR);
				$tagQuery2->bindValue(":model", "%".$model."%", PDO::PARAM_STR);
				$tagQuery2->bindValue(":price1", $price1, PDO::PARAM_INT);
				$tagQuery2->bindValue(":price2", $price2, PDO::PARAM_INT);
				$tagQuery2->execute();
				$tagOffers2 = $tagQuery2->fetchAll();

				for($j=0; $j<count($tagOffers); $j++){
					array_push($offers, $tagOffers[$j]);
				}
				for($j=0; $j<count($tagOffers2); $j++){
					array_push($offers, $tagOffers2[$j]);
				}
			}
		}
		else 
		{
			$searchQuery = $this->db->prepare("SELECT o.* FROM offer o 
											   WHERE o.type LIKE :type AND o.category LIKE :category AND
											    o.state LIKE :state AND o.maker LIKE :maker AND
											    o.model LIKE :model AND o.price BETWEEN :price1 AND :price2 AND o.actual = 1");
			/*
			SELECT o.*, p.* FROM offer o LEFT JOIN offer_has_picture s ON o.id=s.id_offer LEFT JOIN picture p ON s.id_picture=p.id 
											   WHERE o.type LIKE '%%' AND o.category LIKE '%%' AND
											    o.state LIKE '%%' AND o.maker LIKE '%%' AND
											    o.model LIKE '%%' AND o.price BETWEEN 0 AND 10000; */
			$searchQuery->bindValue(":type", "%".$type."%", PDO::PARAM_STR);
			$searchQuery->bindValue(":category", "%".$category."%", PDO::PARAM_STR);
			$searchQuery->bindValue(":state", "%".$state."%", PDO::PARAM_STR);
			$searchQuery->bindValue(":maker", "%".$maker."%", PDO::PARAM_STR);
			$searchQuery->bindValue(":model", "%".$model."%", PDO::PARAM_STR);
			$searchQuery->bindValue(":price1", $price1, PDO::PARAM_INT);
			$searchQuery->bindValue(":price2", $price2, PDO::PARAM_INT);
			$searchQuery->execute();
			$offers = $searchQuery->fetchAll();
		}

		$uniqueOffers = array_map("unserialize", array_unique(array_map("serialize", $offers)));

		Session::init();
		Session::set('offers', $uniqueOffers);

		header('location: '.URL.'search/');

		//$uniqueOffers = array_map("unserialize", array_unique(array_map("serialize", $offers))); - usuwa powtorki
		//$picQuery = $this->db->prepare("SELECT p.link FROM offer o LEFT JOIN offer_has_picture s ON o.id=s.id_offer LEFT JOIN picture p ON s.id_picture=p.id WHERE o.id=:id_offer");
		//$picQuery->bindValue("id_offer", $id, PDO::PARAM_INT);
		//$picQuery->execute();

	}

}