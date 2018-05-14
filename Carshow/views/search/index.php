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
				<div class="col-md-12">
	
					 <form action="<?= URL ?>search/search" method="post">

				          <div class="row row-margin" style="padding-top: 30px;">
			    				<button type="button" class="btn btn-secondary btn-userpanel-addoffer" style="margin: unset; width: 33%;"  id="cat_button" data-toggle="modal" data-target="#categories" >
			    					Wybierz kategorie
			    				</button>
					            <div class="modal fade" id="categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					              <div class="modal-dialog" role="document">
					                <div class="modal-content">
					                  <div class="modal-header">
					                    <h5 class="modal-title center" id="categoriesTitle">Kategorie</h5>
					                  </div>
					                  <div class="modal-body" id="allcategories">
					                  </div>
					                </div>
					              </div>
					            </div>

						            <select class="form-control btn btn-secondary btn-userpanel-addoffer"  style="margin: unset; width: 33%;" name="type" value="<?php View::saveValue('er_type') ?>" >
						              Rodzaj ogłoszenia
						              <option value="1" selected>Sprzedaży</option>
						              <option value="2">Kupna</option>
						            </select>

					         
					  	            <select class="form-control btn btn-secondary btn-userpanel-addoffer" style="margin: unset; width: 33%;"  name="state" value="<?php View::saveValue('er_state') ?>" placeholder="Stan">
					  	              Stan przedmiotu oferty
					                  <option value="4" selected>Wszystkie</option>
					  	              <option value="1">Nowy</option>
					  	              <option value="2">Używany - nieuszkodzony</option>
					  				  <option value="3">Używany - uszkodzony</option>
					  	            </select>

				          </div>

				        <div class="row row-margin" style="padding-top: 10px;">
				  				<div style="width: 33%;">
				  					<input type="text" class="form-control input-form-search" name="maker" value="<?php View::saveValue('er_maker') ?>" placeholder="Marka">
				  				</div>
				  				<div style="width: 33%;">
				  					<input type="text" class="form-control input-form-search" name="model" value="<?php View::saveValue('er_model') ?>" placeholder="Model">
				  				</div>
				  		</div>
				        <!--
				        <div class="row" style="padding-top: 10px;">
				          <p style="padding-left: 5%;">Typ:</p>
				            <select class="form-control form-control-sm input-form-search" style="width:50%; margin-left: 13%;">
				              <option value="1" selected>Chcę kupić</option>
				              <option value="2">Chcę sprzedać</option>
				            </select>
				        </div>
				        -->
				        Cena:
				        <div class="row row-margin">
				            <div style="width: 33%;">
				            	<input type="text" class="form-control input-form-search" placeholder="Od" id="price1" name="price1" value="<?php View::saveValue('er_price1') ?>"/>
				            </div>
					        <div style="width: 33%;">
					            <input type="text" class="form-control input-form-search" placeholder="Do" id="price2" name="price2" value="<?php View::saveValue('er_price2') ?>"/>
					        </div>
				        </div>
				         <div style="padding-top: 10px; width: 100%; margin: 0 auto;">
				  					<input type="text" class="form-control input-form-search" name="tags" value="<?php View::saveValue('er_tags') ?>" placeholder="Szukaj w opisie i tytule">
				  		</div>
				        
				        <div class="row row-margin">
				            <p class="btn-search-form"><input type="submit" value="Szukaj" class="btn btn-search"></p>
				        </div>
        			</form>

        		</div>
				
		        
<?php 

	$offers = Session::get('offers');
	//var_dump($offers);
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
<script src="<?= URL ?>public/js/ajaxCategories.js"></script>
<script>
 window.onload = getCategories("<?=URL ?>");
</script>

