</div>
<script src="<?= URL ?>public/js/ajaxCategories.js"></script>
<script>
 window.onload = getCategories();
</script>
 <div class="container">

      <!-- Page Heading -->
      <!-- ADS
      <div class="row" id="ad" style="background-color: blue; height: 100px; display: none;">
           <div class="col"></div>
      </div>
      -->
      <div class="row row-margin">
        <div class="col-md-5 input-datatable">
        <br/>

        <form action="<?= URL ?>search/search" method="post">

          <div class="row row-margin">
    				<button type="button" class="btn btn-secondary btn-userpanel-addoffer" id="cat_button" data-toggle="modal" data-target="#categories" >
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
          </div>

          <div class="row" style="padding-top: 10px;">
            <p style="padding-left: 5%;">Stan:</p>
  	            <select class="form-control form-control-sm input-form-search" style="width:50%; margin-left: 13%;" name="state" value="<?php View::saveValue('er_state') ?>" placeholder="Stan">
  	              Stan przedmiotu oferty
                  <option value="4" selected>Wszystkie</option>
  	              <option value="1">Nowy</option>
  	              <option value="2">Używany - nieuszkodzony</option>
  								<option value="3">Używany - uszkodzony</option>
  	            </select>
          </div>

        <div class="col-centered">
  				<div style="padding-top: 10px;">
  					<input type="text" class="form-control form-control-sm input-form-search" name="maker" value="<?php View::saveValue('er_maker') ?>" placeholder="Marka">
  				</div>
  				<div style="padding-top: 10px;">
  					<input type="text" class="form-control form-control-sm input-form-search" name="model" value="<?php View::saveValue('er_model') ?>" placeholder="Model">
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
        <div class="row">
          <div class="col-md-6">
            <input type="text" class="form-control input-form-search" placeholder="Od" id="price1" name="price1" value="<?php View::saveValue('er_price1') ?>"/>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control input-form-search" placeholder="Do" id="price2" name="price2" value="<?php View::saveValue('er_price2') ?>"/>
          </div>
          <div style="padding-top: 10px; width: 90%; margin: 0 auto;">
  					<input type="text" class="form-control form-control-sm input-form-search" name="tags" value="<?php View::saveValue('er_tags') ?>" placeholder="Szukaj w opisie i tytule">
  				</div>
            <div class="col-md-12">
              Pokaż:
              <br/>
             <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="type" id="typebuy" value="1" checked="checked">
              <label class="form-check-label" for="typebuy">Oferty sprzedaży</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="type" id="typesell" value="2">
              <label class="form-check-label" for="typesell">Oferty kupna</label>
            </div>
            </div>
            <div class="input-group">
              <input type="text" class="form-control " placeholder="Test dropdown z inputtext" onclick="dropPrices(price1)">
              <div class="input-group-btn" style="visibility: hidden;">
                <button type="button" class="btn btn-default dropdown-toggle" id="price1" data-toggle="dropdown" >
                  Dropdown <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="price1">
                  <li><a>500</a></li>
                  <li><a>1000</a></li>
                  <li><a>1500</a></li>
                </ul>
              </div>
            </div>

        </div>
        <div class="">
          Wyszukiwanie zaawansowane
        </div>
        <div class="row">
            <p class="btn-search-form"><input type="submit" value="Szukaj" class="btn btn-search"></p>
        </div>
        </div>
        <div class="col-md-7" style="background-color: gray;">
        </form>



        </div>
      </div>
      <!-- /.row -->
      <div class="view-main-content">
        <div>
          <div id="TEST" class="col-sm view-main-separator">
            Najpopularniejsze wyszukiwania:
          </div>
        </div>

        <div id="demo"></div>
        <div class="row">
            <div class="col-md-3">
              <div class="car-thumb" id="offer_1">

              </div>
            </div>
            <div class="col-md-3">
              <div class="car-thumb" id="offer_2">
              </div>
            </div>
            <div class="col-md-3">
              <div class="car-thumb" id="offer_3">
              </div>
            </div>
            <div class="col-md-3">
              <div class="car-thumb" id="offer_4">
              </div>
            </div>
          </div>
          <div class="view-main-blankseparator"></div>
          <div class="row">
             <div class="col-md-3">
              <div class="car-thumb" id="offer_5">
              </div>
            </div>
               <div class="col-md-3">
              <div class="car-thumb" id="offer_6">
              </div>
            </div>
               <div class="col-md-3">
              <div class="car-thumb" id="offer_7">
              </div>
            </div>
               <div class="col-md-3">
              <div class="car-thumb" id="offer_8">
              </div>
            </div>
            </div>
      </div>
      <div class="view-main-content">
        <div>
          <div class="col-md-12 view-main-separator">
            Sponsorowane ogłoszenia:
          </div>
        </div>
        <div class="row">
              <div class="col-md-3">
              <div class="car-thumb" id="offer_p1">
              </div>
            </div>
            <div class="col-md-3">
              <div class="car-thumb">
                <a href="#"><img src="https://sztuczne-rosliny.pl/wp-content/uploads/2017/01/sztuczny-kaktus-karnegia-800-800-1.jpg" style="width: 100%;"/></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="car-thumb">
                <a href="#"><img src="https://sztuczne-rosliny.pl/wp-content/uploads/2017/01/sztuczny-kaktus-karnegia-800-800-1.jpg" style="width: 100%;"/></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="car-thumb">
                <a href="#"><img src="https://sztuczne-rosliny.pl/wp-content/uploads/2017/01/sztuczny-kaktus-karnegia-800-800-1.jpg" style="width: 100%;"/></a>
              </div>
            </div>
          </div>
          <div class="view-main-blankseparator"></div>
    </div>
  </div>


<script src="<?php echo URL; ?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?= URL ?>public/js/ajaxOffers.js"></script>
<script>
  window.onload = startAjax("<?=URL?>");
</script>
