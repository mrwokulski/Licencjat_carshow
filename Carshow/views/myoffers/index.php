<style>

.txtcenter {
	text-align: center;
}

.search-thumbnail {
	display: block;
	width: 100%;
	height: 5vw;
}
.car-thumb-text2{
  position: absolute;
  width: 100%;
  height: 10%;
  background-color: #c13a3a;
  padding-left: 0;
  color: white;
}
.search-title {

}

.car-thumb{
  position: relative;
  width: 100%;
  height: 100%;
  background-color: #fff;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.car-thumb-text{
  position: relative;
  width: 100%;
  height: 15%;
  background-color: #c13a3a;
  padding-left: 0px;
  color: white;
}

.car-thumb-type{
  position: relative;
  font-weight: bold;
  padding-left: 10px;
  text-shadow: 0 0 3px #fff, 0 0 5px #e2d5d5;
  color: #c13a3a;
}

.car-thumb-type-premium {
  position: absolute;
  font-weight: bold;
  padding-left: 10px;
  text-shadow: 0 0 3px #fff, 0 0 5px #f7f156;
  color: #000;
}

.test {
	padding: 0px;
}

</style>


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
				            	<div class="car-thumb">
									<div>
										<a href="'.URL.'offer/show/'.$offers[$i][0].'"> <img src="'. URL."views/offer/".$offers[$i][0].'/img1.jpg" style="width: 100%; height: 20vw;"/>	</a>
									</div>
									<div style="position: absolute;bottom: 0; width:100%;">
										<div  class="car-thumb-text" style="padding: 0; text-align: center; width: 50%; float: left;">
										 '. $offers[$i]["price"] .' 
										</div>
										<div class="car-thumb-type" style="padding: 0; text-align: center; width: 50%; float: right;">
										 ' . $type . '
										</div>
									</div>
								</div>
							</div>	
							<div class="col-md-8" style="display: block; width: 100%; height: 100%; background-color: #e6e6e6; padding: 0px; height: 22.5vw;">
								<div class="car-thumb-text" style="padding-left: 0px; text-align: center; max-height: 33.41px;">	 
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

