<style>
.col-centered{
    margin: 0 auto;
}
label > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
label > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
}
label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
  border:2px solid #f00;
}

.center{
  margin-left: auto;
  margin-right: auto;
}

.price-type2{
  margin-left: auto;
}

.radiofix {
  right: 5.5vw;
}
@media (min-width: 992px) {

}
@media (min-width: 1200px) {
      .radiofix {
        right: 11vw;
      }
}
</style>

<div class="container">
  <div class="row row-margin">
    <br/>
    <div class="col-md-2"></div>
    <div class="col-md-8 userpanel-view-table" style="padding-top: 30px;">
    <form action="<?= URL ?>addoffer/newOffer" method="post"  enctype="multipart/form-data">

      <div class="row row-margin">
        <div class="form-group center">
          <label for="offerType">Wybierz rodzaj ogłoszenia:</label>
            <select class="form-control btn-userpanel-addoffer" name="type" value="<?php View::saveValue('er_type') ?>" >
              Rodzaj ogłoszenia
              <option value="1" selected>Sprzedaży</option>
              <option value="2">Kupna</option>
            </select>
        </div>
      </div>

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
        <div class="col-centered" id="catSelected">

        </div>
    </br>
			<div class="col-centered">
				<div style="margin-right: 35%; margin-left: 35%;">
					<input type="text" class="form-control" name="maker" value="<?php View::saveValue('er_maker') ?>" placeholder="Marka">
				</div>
				<div style="margin-right: 35%; margin-left: 35%; padding-top:10px;">
					<input type="text" class="form-control" name="model" value="<?php View::saveValue('er_model') ?>" placeholder="Model">
				</div>
			</div>
    </br>
			<div class="form-row">

					<div class="form-group col-centered">
            <label for="offerType">Wybierz stan produktu z ogłoszenia:</label>
	            <select class="form-control btn-userpanel-addoffer" name="state" value="<?php View::saveValue('er_state') ?>" placeholder="Stan">
	              Stan przedmiotu oferty
	              <option value="1">Nowy</option>
	              <option value="2">Używany - nieuszkodzony</option>
								<option value="3">Używany - uszkodzony</option>
	            </select>
	        </div>
			</div>
    </br>
      <div>
        <div class="row">
          <div style="margin-left: auto; margin-right: auto;" id="priceform">
  					<input type="text" class="form-control" id="price" name="price" value="<?php View::saveValue('er_price') ?>" placeholder="Cena">
  				</div>
        </div>
      </div>

      <div class="form-row">
				<div class="form-group center">
				  <label for="title">Tytuł ogłoszenia:</label>
				  <input type="text" class="form-control" name="title" id="title" style="width: 30vw;"><?php View::saveValue('er_title') ?></textarea>
				</div>
			</div>


			<div class="form-row">
				<div class="form-group center">
				  <label for="description">Opis:</label>
				  <textarea class="form-control" rows="5" name="description" id="description" style="width: 30vw;"><?php View::saveValue('er_description') ?></textarea>
				</div>
			</div>

			      <div class="center" style="text-align: center; margin-left: 14.5%;">
                Zdjęcie 1: <input class="upload-form-input" type="file" name="img1" id="img1"><br/>
               	Zdjęcie 2: <input class="upload-form-input" type="file" name="img2" id="img2"><br/>
                Zdjęcie 3: <input class="upload-form-input" type="file" name="img3" id="img3"><br/>
                Zdjęcie 4: <input class="upload-form-input" type="file" name="img4" id="img4"><br/>
                Zdjęcie 5: <input class="upload-form-input" type="file" name="img5" id="img5"><br/>
            </div>

      <div class="row">
          <p class="btn-search-form"><input type="submit" value="Dodaj ogłoszenie" class="btn btn-search"></p>
      </div>
    </form>
      <div class="row" style="text-align: center;">
        <div class="center">
          <?php  $err = Session::get('error'); View::printModal($err); Session::unset('error') ?>
        </div>
      </div>

    </div>

</div>
<script src="<?= URL ?>public/js/ajaxCategories.js"></script>
<script>
 window.onload = getCategories('<?= URL ?>');
 window.onload = hideBlock('type2form');
</script>
