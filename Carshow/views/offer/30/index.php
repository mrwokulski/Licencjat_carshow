		<div class="container">
		<div class="row row-margin">
	        <div class="col-md-6 userpanel-view-table" >
		        <br/>
		        <h2 id="maker_top"></h2>
				<hr/>


				<div id="slider"></div>
				<div id="images"></div>

				        
		     </div>   
	        <div class="col-md-6 userpanel-view-table" style="padding-top: 62px;">
	        	<hr/>
		       	 <h1 style="text-align: center;" id="price"></h1>
		        <hr/>
			      <div style="padding-left: 10%;">
			        <p id="maker"></p>        
			        <p id="type"></p>
			        <p id="type2"></p>
			        <p>Miasto</p>			        
			        <p id="date"></p>			       
			  	  </div>
			  	  <hr/>
			  	  <p style="text-align: center; font-size: 25px" id="name"></p>
			  	  <div style="padding-left: 10%;">			  	  	
			  	   kontakt: 
			  	</div><p style="text-align: center; font-size: 30px" id="tel"></p>
	        </div>
	        <div class="col-md-12 userpanel-view-table">
	        	<hr/>
	         Opis: <p id="description"></p>
	     	</div>
</div>


<script src="<?= URL ?>public/js/ajaxOffer.js"></script>
					<script>
					  window.onload = getOffer(30);
					  window.onload = setImage(1, 30);
					</script>