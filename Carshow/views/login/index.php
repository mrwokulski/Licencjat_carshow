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
        <form action="login/logIn" method="post">
        Login:
        <input type="text" name="login" value="admin" style="width: 100%">
        Hasło:
        <input type="password" name="password" value="qwerty123" style="width: 100%">

        <p class="btn-search-form"><input type="submit" value="Zaloguj" class="btn btn-search"></p>
        </form>

         <p style="text-align: center;"> Nie masz jeszcze konta? </p>
         <p class="btn-search-form"><button  onclick="location.href='<?=URL?>register';" class="btn btn-search">Załóż nowe konto</button></p>

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
            <div class="col-md-3">
              <div class="car-thumb">
                <a href="#"><img src="https://sztuczne-rosliny.pl/wp-content/uploads/2017/01/sztuczny-kaktus-karnegia-800-800-1.jpg" style="width: 100%;"/></a>
              </div>
            </div>
          </div>
          <div class="view-main-blankseparator"></div>
          <div class="row">
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
              <div class="col-md-3">
                <div class="car-thumb">
                  <a href="#"><img src="https://sztuczne-rosliny.pl/wp-content/uploads/2017/01/sztuczny-kaktus-karnegia-800-800-1.jpg" style="width: 100%;"/></a>
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
            <div class="col-md-3">
              <div class="car-thumb">
                <a href="#"><img src="https://sztuczne-rosliny.pl/wp-content/uploads/2017/01/sztuczny-kaktus-karnegia-800-800-1.jpg" style="width: 100%;"/></a>
              </div>
            </div>
          </div>
          <div class="view-main-blankseparator"></div>
    </div>
  </div>
