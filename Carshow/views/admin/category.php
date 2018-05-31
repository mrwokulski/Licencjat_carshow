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


			<a href="newCategory" class="btn btn-nav-login">Dodaj nową</a>
				<table class="table table-hover table-responsive" style="background-color: rgba(255,255,255,0.5); width: 100%; margin-top: 10px;">
				  <thead>
				    <tr>				      
				      <th scope="col">Nazwa</th>
				      <th scope="col">Opis</th>
				      <th scope="col">Ikona</th>	
				      <th scope="col">Edytuj</th>				      
				    </tr>
				  </thead>
				  <tbody>
				  
				    <?php 
				    	for($i=0; $i < count($this->category); $i++){	  

						      echo   "<tr>
						      			  <td>". $this->category[$i]['name'] ."</td> 
									      <td>". $this->category[$i]['description'] ."</td>					    
									      <td>". $this->category[$i]['icon_path'] ."</td>								   
									      <td>".'<a href="'.URL.'admin/editCategory/'.$this->category[$i]['id'].'" class="btn btn-nav-login" style="width:40px;">E</a></td>'."	
								      </tr>";
						 }
				  ?>

				    </tr>
				  </tbody>
				</table>			 

		     </div>
		 </div>
	</div>
</div>