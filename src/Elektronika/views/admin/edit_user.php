<div class="container">
  	<div class="row row-margin">
   	 	<div class="col-md-12 userpanel-view-table" style="min-height:0;">
		    <br/>
		    <h2 class="title-clr">Panel Administracyjny</h2>
		    <hr/>
		</div>
		    <div class="col-md-2 userpanel-view-table" style="float: left; display: inline-block">	
		    	  <a href="<?=URL?>admin/index" class="btn btn-nav-login" style="width:100%;">Panel główny</a> <br><br>    
		     	  <a href="<?=URL?>admin/users" class="btn btn-nav-login" style="width:100%;">Użytkownicy</a> <br><br>
				  <a href="<?=URL?>admin/offers" class="btn btn-nav-login" style="width:100%">Oferty</a> <br><br>
				  <a href="<?=URL?>admin/archive" class="btn btn-nav-login" style="width:100%">Archiwum</a> <br><br>
				  <a href="<?=URL?>admin/category" class="btn btn-nav-login" style="width:100%">Kategorie</a> <br><br>
				  <a href="<?=URL?>admin/settings" class="btn btn-nav-login" style="width:100%">Ustawienia strony</a>
			</div>	
		
			<div class="col-md-10 userpanel-view-table"  style="display: inline-block">					
			<form action="<?=URL?>admin/editUser/<?= $this->user['id'] ?>" method="post">
				<table class="table table-hover table-responsive" style="background-color: rgba(255,255,255,0.5); width: 90%">
				  <thead>
				    <tr>				      
				      <th scope="col">Login</th>
				      <th scope="col">Hasło</th>
				      <th scope="col">Email</th>
				      <th scope="col">Imię</th>
				      <th scope="col">Nazwisko</th>
				      <th scope="col">Telefon</th>
				      <th scope="col">Zapisz</th>
				   
				    </tr>
				  </thead>
				  <tbody>	
				    <tr>	  
				     <td>
				     <input type="text" name="login" value="<?= $this->user['login'] ?>" style="width: 100%">
				     </td>
				      <td>
				     <input type="password" name="password" value="" style="width: 100%">
				     </td>
				     <td>
				     <input type="text" name="email" value="<?= $this->user['email'] ?>" style="width: 100%">
				     </td>
				     <td>
				     <input type="text" name="name" value="<?= $this->user['name'] ?>" style="width: 100%">
				     </td>
				     <td>
				     <input type="text" name="surname" value="<?= $this->user['surname'] ?>" style="width: 100%">
				     </td>
				     <td>
				     <input type="text" name="tel" value="<?= $this->user['tel'] ?>" style="width: 100%">
				     </td>
				      <td>
				   	 <input type="submit" value="Zapisz" class="btn btn-search">
				     </td>				     
				    </tr>
				  </tbody>
				</table>	

		     </div>
		 </div>
	</div>
</div>