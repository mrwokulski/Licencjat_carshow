<?php View::forLogged(URL,false) ?>
<div class="container">
     
      <div class="row row-margin">
        <div class="col-md-5 input-datatable">
        <br/>
        <h2 class="title-clr">Formularz rejestracyjny</h2>

        <form action="register/newAccount" method="post">
         Login:
        <input type="text" name="login" value="<?php View::saveValue('er_login') ?>" style="width: 100%">
         Hasło:
        <input type="password" name="password" style="width: 100%">
         Powtórz hasło:
        <input type="password" name="password2" style="width: 100%">
         Email:
        <input type="text" name="mail" value="<?php View::saveValue('er_mail') ?>" style="width: 100%">
         Imię:
        <input type="text" name="name" value="<?php View::saveValue('er_name') ?>"  style="width: 100%">
         Nazwisko:
        <input type="text" name="surname" value="<?php View::saveValue('er_surname') ?>" style="width: 100%">
         Telefon:
        <input type="text" name="tel" value="<?php View::saveValue('er_tel') ?>"  style="width: 100%">

        <input type="checkbox" name="rules" style="margin-top: 10px;">  Akceptuję <a href="#">regulamin</a><br>

          <p class="btn-search-form"><input type="submit" value="Załóż konto" class="btn btn-search"></p>
        </form>

        </div>
        <div class="col-md-7" style="background-color: gray;">


          <?php  $err = Session::get('error'); View::printModal($err); Session::unset('error') ?>


        </div>
      </div>
      <!-- /.row -->
      <div class="view-main-content">
        <div>
          <div class="col-sm view-main-separator">
            Najpopularniejsze wyszukiwania:
          </div>
        </div>
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
          <div class="view-main-blankseparator"></div>  
  </div>


<script src="<?php echo URL; ?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?= URL ?>public/js/ajaxOffers.js"></script>
<script>
  window.onload = startAjax("<?=URL?>");
</script>
