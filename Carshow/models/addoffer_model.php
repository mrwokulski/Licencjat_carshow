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

          if(counter%4=0){
            echo "</div></div>"
          }
          else {
          echo '<div class="col-md-3" id="' . $row[1] . '">
									<div>
										<img src="' . $row[3] . '"/>
									</div>
								</div>'
          counter++;
          }

        }

     }
     else
      echo "0 results";


  }

	public function test1() {

		echo "sciezka xmlhttp dziala";
	}
}
?>
