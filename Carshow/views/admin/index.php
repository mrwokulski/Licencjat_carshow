<div class="container">
  	<div class="row row-margin">
   	 	<div class="col-md-12 userpanel-view-table ">
		    <br/>
		    <h2 class="title-clr">Panel Administracyjny</h2>
		    <hr/>
		    <div style="width:30%; float: left; display: inline-block">	    
		     	  <a href="<?=URL?>admin/users" class="btn btn-nav-login" style="width:80%">Użytkownicy</a> <br><br>
				  <a href="<?=URL?>admin/offers" class="btn btn-nav-login" style="width:80%">Oferty</a> <br><br>
				  <a href="<?=URL?>admin/archive" class="btn btn-nav-login" style="width:80%">Archiwum</a> <br><br>
				  <a href="<?=URL?>admin/category" class="btn btn-nav-login" style="width:80%">Kategorie</a> <br><br>
				  <a href="<?=URL?>admin/settings" class="btn btn-nav-login" style="width:80%">Ustawienia strony</a> <br><br>
			</div>	
		
			<div style="width:65%; display: inline-block">	

				<table class="table table-hover" style="background-color: rgba(255,255,255,0.5)">
				  <thead>
				    <tr>				      
				      <th scope="col">Ilość zarejestrowanych użytkowników</th>
				      <th scope="col">Ilość aktualnych ofert</th>
				      <th scope="col">Ilość zakończonych ofert</th>
				      <th scope="col">Ilość dodanych ofert dzisiaj</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td><?= $this->users ?></td>				     
				   			   			    
				      <td><?= $this->offers_act ?></td>	
				
				      <td><?= $this->offers_end ?></td>	
				    
				      <td><?= $this->offers_today ?></td>		
				    </tr>
				  </tbody>
				</table>


			 

		     </div>
		 </div>
	</div>
</div>