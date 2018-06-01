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
				
				<form action="<?=URL?>admin/addCategory" method="post">
					Nazwa
					<input type="text" name="name" style="width: 100%">
					Opis
					<input type="text" name="description" style="width: 100%">
					Ikona
					<input type="text" name="icon_path" style="width: 100%">							
					<input type="submit" value="Zapisz" class="btn btn-search" style="margin-top: 10px">
				</form>

		     </div>
		 </div>
	</div>
</div>