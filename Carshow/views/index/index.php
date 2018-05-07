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

        Marka:
        <select class="form-control form-control-sm  input-form-search">
          <option></option>
        </select>
        Model:
        <select class="form-control form-control-sm input-form-search">
            <option></option>
        </select>
        Typ:
        <div class="row">
          <div class="col-md-6">
            <select class="form-control form-control-sm input-form-search" >
              <option>od</option>
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control form-control-sm input-form-search" >
              <option>do</option>
            </select>
          </div>
        </div>
        Stan:
        <div class="row">
          <div class="col-md-6">
            <select class="form-control form-control-sm input-form-search">
              <option>od</option>
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control form-control-sm input-form-search">
              <option>do</option>
            </select>
          </div>
        </div>
        Cena:
        <div class="row">
          <div class="col-md-6">
            <select class="form-control form-control-sm input-form-search">
              <option>od</option>
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control form-control-sm input-form-search">
              <option>do</option>
            </select>
          </div>
           <form>
            <div class="col-md-12">
              Pokaż:
              <br/>
              <label class="checkbox-inline" style="padding-right: 20px;">
                <input type="checkbox" value="">Oferty kupna
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" value="">Oferty sprzedaży
              </label>            
          </form>
        </div>
        </div>
        <div class="">
          Wyszukiwanie zaawansowane
        </div>
          <p class="btn-search-form"><a class="btn btn-search" href="#">Szukaj</a></p>
        </div>
        <div class="col-md-7" style="background-color: gray;">




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