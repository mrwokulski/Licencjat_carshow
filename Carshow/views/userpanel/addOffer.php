	<script src="<?= URL ?>public/js/custom.js"></script>
  
  <div class="container">
  <div class="row row-margin">
    <div class="col-md-12 userpanel-view-table">
    <br/><!--  action="<?= URL ?>addoffer/newOffer" method="post"  miejsce na poszczegolne elementy dla menu ktore beda albo hidden albo sie zrobi osobne widoki ctrl c + v i zmieni tylko tego diva -->
    <form>
      <div class="row row-margin">
        <div class="form-group" style="margin-left: auto; margin-right: auto;">
          <label for="offerType">Rodzaj ogłoszenia:</label>
            <select class="form-control btn-userpanel-addoffer" name="type" value="<?php View::saveValue('er_type') ?>">
              Rodzaj ogłoszenia
              <option value="1">Kupna</option>
              <option value="2">Sprzedaży</option>
            </select>
        </div>
      </div>
      <div class="row row-margin">
        <button type="button" onclick="generateCategories()" class="btn btn-secondary btn-userpanel-addoffer" data-toggle="modal" data-target=".bd-example-modal-lg">
          Wybierz kategorie
        </button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kategorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="categories">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div id="test">Zobacz co tu jest</div>
        <button onclick="zmien()">klik</button>
    Kategoria- wybieram i sa dropdown list z parametrami produktu
    </form>
    </div>
  </div>
</div>
