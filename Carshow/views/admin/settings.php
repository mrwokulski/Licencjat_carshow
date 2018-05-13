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
				  <a href="<?=URL?>admin/settings" class="btn btn-nav-login" style="width:100%">Ustawienia strony</a>
			</div>	
		
			<div class="col-md-10 userpanel-view-table"  style="display: inline-block">	

					<form action="<?=URL?>admin/editSettings" method="post">
					URL:
					<input type="text" name="url" value="<?= $this->settings['url'] ?>" style="width: 100%">
					Tytuł strony:
					<input type="text" name="title" value="<?= $this->settings['title']?>" style="width: 100%">
					Header:
					<input type="text" name="header" value="<?= $this->settings['header'] ?>" style="width: 100%">				
					Footer:
					<input type="text" name="footer" value="<?= $this->settings['footer'] ?>" style="width: 100%">
					<input type="submit" value="Zapisz" class="btn btn-search" style="margin-top: 10px">
				</form>

		     </div>
		 </div>
	</div>
</div>