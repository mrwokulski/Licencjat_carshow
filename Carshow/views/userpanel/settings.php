<div class="container">
  <div class="row row-margin">
    <div class="col-md-12 userpanel-view-table ">
    <br/>
    <h2 class="title-clr">Twoje dane:</h2>
    <hr/>
	   <table class="table table-bordered">
	   	<tr>
	   		<th>login</th>
	   		<th>email</th>
	   		<th>imię</th>
	   		<th>nazwisko</th>
	   		<th>telefon</th>
	   		<th>data rejestracji</th>

	   	</tr>
	   	<tr>
	   		<td><?php View::showArrayValue('log',0);?></td>
	   		<td><?php View::showArrayValue('log',1);?></td>
	   		<td><?php View::showArrayValue('log',2);?></td>
	   		<td><?php View::showArrayValue('log',3);?></td>
	   		<td><?php View::showArrayValue('log',4);?></td>
	   		<td><?php View::showArrayValue('log',5);?></td>
	   	</tr>
	   </table>
    <hr/>
    <h2 class="title-clr">Edycja profilu</h2>
    <hr/>
	    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-nav-login">Zmień hasło</a>
	    <a href="" class="btn btn-nav-login">Zmień email</a>
	    <a href="" class="btn btn-nav-login">Zmień telefon</a>
	    <a href="" class="btn btn-nav-login">Zmień dane osobowe</a>
    <hr/>

    <h2 class="title-clr">Lokalizacja</h2>
    <hr/>
	    <a href="" class="btn btn-nav-login">Włącz lokalizację</a>
	    <a href="" class="btn btn-nav-login">Ustaw lokalizację</a>
    <hr/>

    </div>
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      ...
		    </div>
		  </div>
		</div>

  </div>
</div>


