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

//DO REFAKTORYZACJI WIKTOR
	 


	 $keys = array("type", "category", "maker", "model", "state", "price", "type2", "description");
 	 $labels = array("rodzaj", "kategoria", "producent", "model", "stan", "cena", "rodzaj2", "opis");


		$registerQuery = $this->db->prepare('INSERT INTO offer (type,category,maker,model,state,price,type2,description,date_added,user, premium) VALUES (:type, :category, :maker, :model, :state, :price, :type2, :description, :date_added, :user, :premium)');

		$value = Session::get('log');
		$user_id = $value[6];

		$registerQuery->bindValue(':type', $type, PDO::PARAM_STR);
		$registerQuery->bindValue(':category', $category, PDO::PARAM_STR);
		$registerQuery->bindValue(':maker', $maker, PDO::PARAM_STR);
		$registerQuery->bindValue(':model', $model, PDO::PARAM_STR);
		$registerQuery->bindValue(':state', $state, PDO::PARAM_STR);
		$registerQuery->bindValue(':price', $price, PDO::PARAM_STR);
		$registerQuery->bindValue(':type2', $type2, PDO::PARAM_STR);
		$registerQuery->bindValue(':description', $description, PDO::PARAM_STR);
		$registerQuery->bindValue(':date_added', date("Y-m-d"), PDO::PARAM_STR);
		$registerQuery->bindValue(':user', $user_id, PDO::PARAM_INT);
		$registerQuery->bindValue(':premium', 0, PDO::PARAM_INT);
		$registerQuery->execute();

		$picQuery = $this->db->prepare('INSERT INTO PICTURE(description, link) VALUES(:description, :link)');	
		$pictureQueryMan = $this->db->prepare('INSERT INTO offer_has_picture(id_offer, id_picture) VALUES(:id_off, :id_pic)');	

		$lastId++;		

		try{	
			mkdir("views/offer/$lastId/", 0755);			
		} 
		catch(Exception $e){
			$correct_params = 0;
		}
		
		$lastPhotoId = 1;


		$target_dir = "views/offer/$lastId/";
		
		$uploadOk = 1;

		for($i=1;$i<5;$i++){

	    $target_file = "views/offer/$lastId/img".$lastPhotoId.".jpg";  

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
		    $check = getimagesize($_FILES["img".$i]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		
		// Check if file already exists
		
		if ($_FILES["img".$i]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		
		    if (move_uploaded_file($_FILES["img".$i]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["img".$i]["name"]). " has been uploaded.";
		        $picQuery->bindValue(':description', $lastId, PDO::PARAM_STR);
		        $picQuery->bindValue(':link', "img".$i.".jpg", PDO::PARAM_INT);
		        $picQuery->execute();

		        $pictureQuery = $this->db->prepare('SELECT id FROM picture WHERE description=:description ORDER BY id DESC');
		        $pictureQuery->bindValue(':description', $lastId, PDO::PARAM_STR);
		        $pictureQuery->execute();
		        $result = $pictureQuery->fetch();

		        $pictureQueryMan->bindValue(':id_pic', $result['id'], PDO::PARAM_STR);
		        $pictureQueryMan->bindValue(':id_off', $lastId, PDO::PARAM_STR);
		        $pictureQueryMan->execute();

		        $lastPhotoId++;

		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		
	}




  		/*$target_dir = "views/offer/$lastId/images/";

		for($i=0; $i<5; $i++){
			$nr = $i+1;
			$check = getimagesize($_FILES["fileToUpload".$nr]["tmp_name"]);	
				if($check!=false){
					$target_file = $target_dir . basename($_FILES["fileToUpload".$nr]["name"]);
					$this->upload($lastPhotoId, $target_file, $_FILES["fileToUpload".$nr]);
					$lastPhotoId++;
				}
		}*/
		
		header('location: '.URL.'offer/show/'.$lastId);
		}



  }

/*
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
*/
}
