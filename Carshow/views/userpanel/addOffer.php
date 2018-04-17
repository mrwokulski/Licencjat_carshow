<script src="<?= URL ?>public/js/custom.js"></script>
<style>
.col-centered{
    float: none;
    margin: 0 auto;
}
</style>
<div class="container">
  <div class="row row-margin">
    <div class="col-md-12 userpanel-view-table">
    <br/><!--  action="<?= URL ?>addoffer/newOffer" method="post"  miejsce na poszczegolne elementy dla menu ktore beda albo hidden albo sie zrobi osobne widoki ctrl c + v i zmieni tylko tego diva -->
    <form action="addoffer/newOffer">
      <div class="row row-margin">
        <div class="form-group" style="margin-left: auto; margin-right: auto;">
          <label for="offerType">Rodzaj ogłoszenia:</label>
            <select class="form-control btn-userpanel-addoffer" name="type" value="<?php View::saveValue('er_type') ?>">
              Rodzaj ogłoszenia
              <option value="1">Kupna</option>
              <option value="2">Sprzedaży</option> <!-- onclick="hide(tu id zamienie/oddam)" -->
            </select>
        </div>
      </div>
      <div class="row row-margin">
				<button type="button" class="btn btn-secondary btn-userpanel-addoffer">
				Wybierz kategorie
				</button>
      </div>
			<div class="row row-margin" id="categories">
				<p style="margin-left: auto; margin-right: auto;">tu maja byc kat</p>
        	<input type="text" class="form-control" name="category" value="<?php View::saveValue('er_category') ?>" placeholder="Kategoria">
			</div>
			<div class="form-row">
				<div class="col-sm-3 col-centered">
					<input type="text" class="form-control" name="maker" value="<?php View::saveValue('er_maker') ?>" placeholder="Marka">
				</div>
				<div class="col-sm-3 col-centered">
					<input type="text" class="form-control" name="model" value="<?php View::saveValue('er_model') ?>" placeholder="Model">
				</div>
			</div>
			<div class="form-row">
				<div class="col-sm-3 col-centered">
					<div class="form-group col-sm-3 col-centered">
	            <select class="form-control btn-userpanel-addoffer" name="state" value="<?php View::saveValue('er_state') ?>" placeholder="Stan">
	              Stan przedmiotu oferty
	              <option value="1">Nowy</option>
	              <option value="2">Używany - nieuszkodzony</option>
								<option value="3">Używany - uszkodzony</option>
	            </select>
	        </div>
				</div>
				<div class="col-sm-3 col-centered">
					<input type="text" class="form-control" name="price" value="<?php View::saveValue('er_price') ?>" placeholder="Cena">
				</div>
			</div>
			<div class="form-group row col-centered">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gridRadios" id="giveaway" value="<?php View::saveValue('er_type2') ?>">
					<label class="form-check-label" for="giveaway">
						Oddam
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gridRadios" id="trade" value="<?php View::saveValue('er_type2') ?>">
					<label class="form-check-label" for="trade">
						Zamienię
					</label>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group">
				  <label for="description">Opis:</label>
				  <textarea class="form-control" rows="5" name="desc" id="description"><?php View::saveValue('er_description') ?></textarea>
				</div>
			</div>
      <div class="row">
          <p class="btn-search-form"><input type="submit" value="Dodaj ogłoszenie" class="btn btn-search"></p>
      </div>
    </form>
    </div>
  </div>
</div>