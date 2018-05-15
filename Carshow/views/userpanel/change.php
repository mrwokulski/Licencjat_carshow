<div class="container">
  <div class="row row-margin">
    <div class="col-md-12 userpanel-view-table ">
    <br/>
    <h2 class="title-clr">Twoje dane:</h2>
    <hr/>  

    <div class="message-container" style="margin: 0 auto; text-align: center;">

	 <?php

      if($this->type == "password") {

	 	echo 'Podaj aktualne hasło';
	 	echo '<form action="'.URL.'userpanel/changePost/password" method="post">';
	 	echo '
	 	<input type="password" name="password_old" style="min-width: 70%;"><br/>';
	 	echo 'Podaj nowe hasło<br/>
        <input type="password" name="password_new" style="min-width: 70%;"><br/>';
        echo 'Powtórz nowe hasło<br/>
        <input type="password" name="password_new2" style="min-width: 70%;">   
        <p class="btn-search-form"><input type="submit" value="Zapisz" class="btn btn-search"></p>
        </form>';

	 } 

     if($this->type == "email") {

        echo 'Podaj nowy email';
        echo '<form action="'.URL.'userpanel/changePost/email" method="post">';        
        echo '<input type="text" name="email" style="min-width: 70%;">   
        <p class="btn-search-form"><input type="submit" value="Zapisz" class="btn btn-search"></p>
        </form>';

     } 

     if($this->type == "phone") {

        echo 'Podaj nowy telefon';
        echo '<form action="'.URL.'userpanel/changePost/phone" method="post">';        
        echo '<input type="text" name="phone" style="min-width: 70%;">   
        <p class="btn-search-form"><input type="submit" value="Zapisz" class="btn btn-search"></p>
        </form>';

     }

     if($this->type == "personal") {

        echo 'Zmień imię:';
        echo '<form action="'.URL.'userpanel/changePost/personal" method="post">';        
        echo '<input type="text" value="'.$this->data['name'].'" name="name" style="min-width: 70%;"><br/>';   
        echo 'Zmień nazwisko: <br/>';
        echo '<input type="text" value="'.$this->data['surname'].'" name="surname" style="min-width: 70%;">  
        <p class="btn-search-form"><input type="submit" value="Zapisz" class="btn btn-search"></p>
        </form>';


     }



	 ?>

      <?php  Session::init(); $err = Session::get('error'); View::printModal($err); Session::unset('error'); ?>

	</div>
	   

  </div>
</div>


