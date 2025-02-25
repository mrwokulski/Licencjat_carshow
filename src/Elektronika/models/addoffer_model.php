<?php

class Addoffer_Model extends Model {

	function __construct() {
		parent::__construct();
	}

  private function saveValue(){

	 $keys = array("type", "category", "maker", "model", "state", "price", "type2", "title", "city", "offer", "description");
		for($i = 0; $i < count ($keys); $i++){
			if(!empty($_POST[$keys[$i]]))
					Session::set('er_'.$keys[$i], $_POST[$keys[$i]]);
		}
	}


  public function newOffer() {

		   	 Session::init();

		     $correct_params = true;

			 $keys = array("type", "category", "maker", "model", "state", "price", "type2", "title", "description");
		 	 $labels = array("Rodzaj ogłoszenia", "Kategoria", "Producent", "Model", "Stan", "Cena", "Rodzaj2", "Tytul", "Opis");

			 $err = '';
			 $uploadOk = 1;

			 $title = preg_replace('/[^ęóąśłżźćńĘÓĄŚŁŻŹĆŃA-Z0-9a-z \-\+]+/', '', $_POST['title']);

			 if(empty($_POST['type'])){
				 $err = $err . "</br> Nie wybrano rodzaju ogłoszenia.";
		 		$correct_params = false;
			 }

			 if(empty($_POST['category'])){
				  $err = $err . "</br> Nie wybrano kategorii.";
		 		 $correct_params = false;
			 }

			 if(empty($_POST['maker'])){
				 $err = $err . "</br> Nie podano producenta.";
				 $correct_params = false;
			 }

			 if(empty($_POST['model'])){
			 		$err = $err . "</br> Nie podano modelu.";
					$correct_params = false;
			 }

			 if(strlen($title) < 5){
				 $err = $err . "</br> Tytuł zbyt krótki. (min 5 liter lub cyfr)";
			 	 $correct_params = false;
			 }

			 if(strlen($title) > 99){
				$err = $err . "</br> Tytuł zbyt długi. (ogranicz liczbę znaków poniżej 100)";
				$correct_params = false;
			}

			 if(strlen($_POST['description']) <= 20){
			   $err = $err . "</br> Opis zbyt krótki.";
			 	 $correct_params = false;
			 }

			 if($_POST['price'] <= 0 && $_POST['type2'] == 2 && $_POST['type'] == 1){
			 	$err = $err . "</br> Cena przy sprzedaży/kupnie nie może być równa 0.";
			 	$correct_params = false;
			 }
			 if($_POST['type'] == 2) $_POST['price'] = 0;

			 if(!is_numeric($_POST['price'])){
			 	$err = $err . "</br> Cena musi być liczbą!";
			 	$correct_params = false;
			 }

			if($correct_params){

                $ifbuy = $_POST['type'];

                $lastIdQuery = $this->db->prepare('SELECT id FROM offer ORDER BY id DESC LIMIT 1');
                $lastIdQuery->execute();
                $lastId = $lastIdQuery->fetch();
                $lastId = $lastId[0];
                $lastId++;

                $offerPath = "views/offer/$lastId/";

                 try{
                     mkdir($offerPath, 0755);
                 }
                 catch(Exception $e){
                     $correct_params = false;
                 }

                $lastPhotoId = 1;
                $photoCounter = 0;
                $uploadOk = 1;

                if($ifbuy == 2){

                    $categoryName = $this->db->prepare('SELECT * FROM categories where  id = :id');
                    $categoryName->bindValue(':id', $_POST['category'], PDO::PARAM_INT);
                    $categoryName->execute();

                    $catName = $categoryName->fetch()['icon_path'];
                    copy("public/images/buy.jpg", $offerPath."img1.jpg");
                    copy($catName, $offerPath."img2.jpg");
                    $photoCounter = 2;
                }
                else {


                    for ($i = 1; $i < 6; $i++) {
                        if (empty($_FILES["img" . $i]["tmp_name"]))
                            break;
                        $photoCounter++;
                    }


                    for ($i = 1; $i < ($photoCounter + 1); $i++) {
                        $type = array();

                        $type = explode(".", basename($_FILES["img" . $i]["name"]));
                        $imageFileType = $type[1];

                        $check = getimagesize($_FILES["img" . $i]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            $err = $err . "<br/>Zdjęcie " . $i . " nie jest obrazkiem.";
                            $uploadOk = 0;
                            break;
                        }

                        if ($_FILES["img" . $i]["size"] > 500000) {
                            $err = $err . "<br/>Twoje obrazki są zbyt duże (limit to 5MB).";
                            $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif") {
                            $err = $err . "<br/>Dopuszczalny format obrazka to png, jpg, jpeg, gif.";
                            $uploadOk = 0;
                        }

                    }


                    if ($photoCounter < 2) {
                        $err = $err . "</br> Dodaj minimum dwa obrazki!";
                        $uploadOk = 0;
                    }


                    if ($uploadOk == 0) {
                        $correct_params = false;

                        try {
                            rmdir($offerPath);
                        } catch (Exception $e) {
                        }

                    }
                }

			}

			 if($correct_params && $uploadOk !=0 ){

				 $type = filter_input(INPUT_POST, 'type');
				 $category = filter_input(INPUT_POST, 'category');
				 $maker = filter_input(INPUT_POST, 'maker');
				 $model = filter_input(INPUT_POST, 'model');
				 $state = filter_input(INPUT_POST, 'state');
				 $price = filter_input(INPUT_POST, 'price');
				 $type2 = filter_input(INPUT_POST, 'type2');
				 $description = filter_input(INPUT_POST, 'description');
				 $city = filter_input(INPUT_POST, 'city');



				 $addOfferQuery = $this->db->prepare('INSERT INTO offer (type,category,maker,model,state,price,type2,title,description,date_added,user, premium, city) VALUES (:type, :category, :maker, :model, :state, :price, :type2, :title, :description, :date_added, :user, :premium, :city)');

				 $value = Session::get('log');
				 $user_id = $value[6];


				 	if($type2 == null)
				 			$type2 = 0;

				 $addOfferQuery->bindValue(':type', $type, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':category', $category, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':maker', $maker, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':model', $model, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':state', $state, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':price', $price, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':type2', $type2, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':city', $city, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':title', $title, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':description', $description, PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':date_added', date("Y-m-d"), PDO::PARAM_STR);
				 $addOfferQuery->bindValue(':user', $user_id, PDO::PARAM_INT);
				 $addOfferQuery->bindValue(':premium', 0, PDO::PARAM_INT);

				 $addOfferQuery->execute();

			 }




			 if($correct_params && $uploadOk != 0){

					$picQuery = $this->db->prepare('INSERT INTO picture (description, link) VALUES (:description, :link)');
					$pictureQueryMan = $this->db->prepare('INSERT INTO offer_has_picture(id_offer, id_picture) VALUES(:id_off, :id_pic)');

					for($i=1;$i<($photoCounter+1);$i++){
						 $target_file = "views/offer/$lastId/img".$lastPhotoId.".jpg";

						if($ifbuy == 2){
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
						}
						else if (move_uploaded_file($_FILES["img".$i]["tmp_name"], $target_file)) {

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
						}
						else {
							$err = $err . "<br/> Wystapił błąd podczas uploadu zdjęć.";
						}
					}

				}


				if(!$correct_params || $uploadOk == 0){
					$this->saveValue();
					Session::set('error',$err);
					header('Location: ../userpanel/addOffer');
				} else {
					header('location: '.URL.'offer/show/'.$lastId);
				}

	}





  public function getCategories() {

      $categoriesQuery = $this->db->query('SELECT * FROM categories');
			$categoriesQuery->execute();

			$result = $categoriesQuery->fetchAll();

  		echo json_encode($result);
  		return json_encode($result);
	}

}
