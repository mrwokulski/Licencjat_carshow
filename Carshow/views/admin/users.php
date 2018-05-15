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

				<table class="table table-hover table-responsive" style="background-color: rgba(255,255,255,0.5); width: 90%">
				  <thead>
				    <tr>				      
				      <th scope="col">Login</th>
				      <th scope="col">Email</th>
				      <th scope="col">Imię</th>
				      <th scope="col">Nazwisko</th>
				      <th scope="col">Telefon</th>
				      <th scope="col">Data rejestracji</th>
				      <th scope="col">Edytuj</th>
				      <th scope="col">Zablokuj</th>
				    </tr>
				  </thead>
				  <tbody>
				  
				    <?php 
				    	for($i=0; $i < count($this->users); $i++){

					    	 $style = "";

						     if($this->users[$i][7] == 1)
								 $style = "text-decoration: line-through; background-color: gray;";						      

						      echo   "<tr style=\"".$style."\">
						      			  <td>". $this->users[$i][0] ."</td>  				   			   			    
									      <td>". $this->users[$i][1] ."</td>		
									      <td>". $this->users[$i][2] ."</td>					    
									      <td>". $this->users[$i][3] ."</td>	
									      <td>". $this->users[$i][4] ."</td>					
									      <td>". $this->users[$i][5] ."</td>					    
									     <td>".'<a href="'.URL.'admin/edit_user/'.$this->users[$i][6].'" class="btn btn-nav-login" style="width:40px;">E</a></td>		
									      <td><a href="'.URL.'admin/banUser/'.$this->users[$i][6].'" class="btn btn-nav-login" style="width:40px;">Z</a></td></td>'."
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