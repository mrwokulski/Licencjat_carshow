

<div class="container">

			<div class="view-main-content">

		        

<?php 



	$offers = $this->offers;



	if(empty($offers)) {

		echo '<div class="row" style="padding-top: 5%;"><h1 style="margin: 0 auto;">Brak ogłoszeń.</div>';

	}

	else 

	{



	for($i=0 ; $i<count($offers); $i++){



		if(!empty($offers[$i][0])){



			$type = ($offers[$i]["type"] == 1)? "Sprzedam" : "Kupię";



			$description = substr($offers[$i][8], 0, 100);

			if(strlen($offers[$i][8])>100)

				$description = $description." ...";



			echo '<div class="row" style="padding-top: 5%;">

				            <div class="col-md-4" style=" padding: 0px;">

				            	<div class="car-thumb offer-thumb">

									<div>

										<a href="'.URL.'offer/show/'.$offers[$i][0].'"> <img src="'. URL."views/offer/".$offers[$i][0].'/img1.jpg" style="width: 100%; max-height: 20%;"/>	</a>

									</div>

									<div style="position: absolute;bottom: 0; width:100%;">

										<div  class="car-thumb-text offer-thumb-text" style="padding: 0; text-align: center; width: 50%; float: left;">

										 '. $offers[$i]["price"] .' 

										</div>

										<div class="car-thumb-type offer-thumb-type" style="padding: 0; text-align: center; width: 50%; float: right;">

										 ' . $type . '

										</div>

									</div>

								</div>

							</div>	

							<div class="col-md-8 search-description" style="display: block; width: 100%; background-color: #e6e6e6; padding: 0px;">

								<div class="car-thumb-text offer-thumb-text" style="padding-left: 0px; text-align: center; max-height: 33.41px;">	 

									'. $offers[$i]["title"] .'

								</div>

								<br/>

								<div>						

									<div style="text-align: center;">'. $offers[$i]["maker"] .' '. $offers[$i]["model"]  .'</div>

									<div style="text-align: center;"> '. $description .'  </div>

									<div style="text-align: center;"> Miasto </div>

									<div style="text-align: center;"> <a href="'.URL.'favourite/add/'.$offers[$i][0].'">Dodaj do ulubionych</a> </div>

								</div>           

							</div>



				         </div>';



		}



	  }

	  

	}



?>

		        <div class="view-main-blankseparator"></div>

		    </div>

    	</div>

<script src="<?= URL ?>public/js/ajaxOffer.js"></script>



