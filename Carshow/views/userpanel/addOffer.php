<div class="container">
  <div class="row row-margin">
    <div class="col-md-12 userpanel-view-table">
    <br/><!-- miejsce na poszczegolne elementy dla menu ktore beda albo hidden albo sie zrobi osobne widoki ctrl c + v i zmieni tylko tego diva -->
      <div class="row row-margin">
        <div class="form-group" style="margin-left: auto; margin-right: auto;">
          <label for="offerType">Rodzaj ogłoszenia:</label>
            <select class="form-control btn-userpanel-addoffer" id="offerType">
              Rodzaj ogłoszenia
              <option>Kupna</option>
              <option>Sprzedaży</option>
            </select>
        </div>
      </div>
      <div class="row row-margin">
        <div class="form-check form-check-inline" style="text-align: center;">
          <input class="form-check-input" type="radio" name="offerType2" id="offerTypeBuy" value="buy">
          <label class="form-check-label" for="offerTypeBuy">Kupna</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="offerType2" id="offerTypeSell" value="sell">
          <label class="form-check-label" for="offerTypeSell">Sprzedaży</label>
        </div>
      </div>
    <br/>
    <br/>
      <div class="row row-margin">
        <button type="button" class="btn btn-secondary btn-userpanel-addoffer" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Php skrypt - kategorie zczytane z bazy czy na sztywno?">
          Wybierz kategorię
        </button>
      </div>
    Kategoria- wybieram i sa dropdown list z parametrami produktu
    <a href="logout/logOut">Wyloguj</a>
    </div>
  </div>
</div
