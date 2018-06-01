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

				<table class="table table-hover table-responsive" style="background-color: rgba(255,255,255,0.5); width: 90%">
				  <thead>
				    <tr>				      
				      <th scope="col">Numer</th>
				      <th scope="col">Marka</th>
				      <th scope="col">Model</th>
				      <th scope="col">Stan</th>
				      <th scope="col">Typ</th>
				      <th scope="col">Cena</th>
				      <th scope="col">Opis</th>
				      <th scope="col">Tytuł</th>
				      <th scope="col">Przywróć</th>
				    </tr>
				  </thead>
				  <tbody>
				  
				    <?php 
				    	for($i=0; $i < count($this->offers); $i++){

					    	 $style = "";					    	
					    	 if($this->offers[$i]['state'] == 1)
					    	 	$state = "Nowy";
					    	 if($this->offers[$i]['state'] == 2)
					    	 	$state = "Używany - nieuszkodzony";
					    	 if($this->offers[$i]['state'] == 3)
					    	 	$state = "Używany - Uszkodzony";
					    	 if($this->offers[$i]['type'] == 1)
					    	 	$type = "Sprzedaż";
					    	 else
					    	 	$type = "Kupno";

					    	  if($this->offers[$i]['actual'] == 1)
					    	 	$type = "Tak";
					    	 else
					    	 	$type = "Nie";
				      

						      echo   "<tr style=\"".$style."\">
						      			  <td>". $this->offers[$i]['id'] ."</td> 
									      <td>". $this->offers[$i]['maker'] ."</td>					    
									      <td>". $this->offers[$i]['model'] ."</td>	
									      <td>". $state ."</td>					
									      <td>". $type ."</td>	
									      <td>". $this->offers[$i]['price'] ."</td>					
									      <td>". $this->offers[$i]['description'] ."</td>
									      <td>". $this->offers[$i]['title'] ."</td>	
									     <td>".'<a href="'.URL.'admin/closeOffer/'.$this->offers[$i]['id'].'" class="btn btn-nav-login" style="width:40px;">A</a></td>'."	
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