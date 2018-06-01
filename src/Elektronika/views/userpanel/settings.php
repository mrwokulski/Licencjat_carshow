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
	   		<td><?= $this->data['login'] ?></td>
	   		<td><?= $this->data['email'] ?></td>
	   		<td><?= $this->data['name'] ?></td>
	   		<td><?= $this->data['surname'] ?></td>
	   		<td><?= $this->data['tel'] ?></td>
	   		<td><?= View::polishDate($this->data['date_register']) ?></td>
	   	</tr>
	   </table>
    <hr/>
    <h2 class="title-clr">Edycja profilu</h2>
    <hr/>
	    <a href="<?=URL?>userpanel/change/password" class="btn btn-nav-login">Zmień hasło</a>
	    <a href="<?=URL?>userpanel/change/email" class="btn btn-nav-login">Zmień email</a>
	    <a href="<?=URL?>userpanel/change/phone" class="btn btn-nav-login">Zmień telefon</a>
	    <a href="<?=URL?>userpanel/change/personal" class="btn btn-nav-login">Zmień dane osobowe</a>
    <hr/>
    </div>
		

  </div>
</div>


