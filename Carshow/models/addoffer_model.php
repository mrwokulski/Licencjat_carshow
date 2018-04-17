<?php

class Addoffer_Model extends Model {

	function __construct() {
		parent::__construct();
	}

  private function saveValue(){

	 $keys = array("type", "category", "maker", "model", "state", "price", "type2", "description");
		for($i = 0; $i < count ($keys); $i++){
			Session::set('er_'.$keys[$i], $_POST[$keys[$i]]);
		}
	}

  public function newOffer() {

    Session::init();
    $correct_params = true;
 	  $err = "";

		$keys = array("type", "category", "maker", "model", "state", "price", "type2", "description");
 	 $labels = array("rodzaj", "kategoria", "producent", "model", "stan", "cena", "rodzaj2", "opis");

	 for($i = 0; $i < count ($keys); $i++){
		if (strlen($_POST[$keys[$i]]) < 1  || strlen($_POST[$keys[$i]]) > 40){
			 $err = $err . '<br/>' . $labels[$i] . " - długość musi znajdować się w przedziale od 1 do 40 znaków ";
			 $correct_params = false;
		 }
 		}

		if(!$correct_params){
			$this->saveValue();
			Session::set('error',$err);
			header('Location: ../userpanel/addOffer');
		}
		else {
		$type = filter_input(INPUT_POST, 'type');
		$category = filter_input(INPUT_POST, 'category');
		$maker = filter_input(INPUT_POST, 'maker');
		$model = filter_input(INPUT_POST, 'model');
		$state = filter_input(INPUT_POST, 'state');
		$price = filter_input(INPUT_POST, 'price');
		$type2 = filter_input(INPUT_POST, 'type2');
		$description = filter_input(INPUT_POST, 'description');

		$registerQuery = $this->db->prepare('INSERT INTO offer (type,category,maker,model,state,price,type2,description,date_added) VALUES (:type, :category, :maker, :model, :state, :price, :type2, :description, :dateadded)');

		$registerQuery->bindValue(':type', $type, PDO::PARAM_STR);
		$registerQuery->bindValue(':category', $category, PDO::PARAM_STR);
		$registerQuery->bindValue(':maker', $maker, PDO::PARAM_STR);
		$registerQuery->bindValue(':model', $model, PDO::PARAM_STR);
		$registerQuery->bindValue(':state', $state, PDO::PARAM_STR);
		$registerQuery->bindValue(':price', $price, PDO::PARAM_STR);
		$registerQuery->bindValue(':type2', $type2, PDO::PARAM_STR);
		$registerQuery->bindValue(':description', $description, PDO::PARAM_STR);
		$registerQuery->bindValue(':date_added', date("Y-m-d"), PDO::PARAM_STR);
		$registerQuery->execute();
		header('Location: ../index')
		}

  }

  public function getCategories() {

      $categoriesQuery = $this->db->query('SELECT * FROM categories');
      //$result = $categoriesQuery->fetch();
      if ($result->num_rows > 0) {
    // output data of each row
      $counter=0;
      echo '<div class="row row-margin">
              <div class="col-md-12">
           ';

        foreach($categoriesQuery as $row){


          echo '<div class="col-md-3" id="' . $row[1] . '">
									<div>
										<img src="' . $row[3] . '"/>
									</div>
								</div>'
          counter++;


        }
				echo "</div></div>";
     }
     else
      echo "0 results";


  }

	public function test1() {

		echo "<div>sciezka xmlhttp dziala</div>";
	}
}
