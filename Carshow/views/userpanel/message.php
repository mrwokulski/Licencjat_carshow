<div class="container">
  	<div class="row row-margin">
   	 	<div class="col-md-12 userpanel-view-table ">
		    <br/>
		    <h2 class="title-clr">Twoje wiadomości:</h2>
		    <hr/>
		     <div class="message-container">
			    <?php 

				    $me = $this->showArrayValue('log',6);
				  	$this->testIdMessage($this->idOne, $this->idTwo);				  	

				  	$who = 1;	
				  	$last = $me;

				  for($i=0; $i<count($this->messageAuthor); $i++){	

					    if( $this->messageAuthor[$i]['id'] != $me ){
					    	echo '<div class="message-author">'. $this->messageAuthor[$i]['name']. " ";
					   	    echo $this->messageAuthor[$i]['surname']. '</div>'; 
					   	    break;
						}					
					}

					echo '<a class="message-content1" style="color:#212529; border:solid gray 1px; text-decoration:none; float:right;" href="'.URL.'userpanel/messages">Powrót</a>';
					echo '<br><hr/>';

				    for($i=0; $i<count($this->message); $i++){				    		    	
				    	
				    	if($last != $this->message[$i]['id']){
				    		$who = 2;
				    	} else {
				    		$who = 1;
				    	}	

				    	if(!empty($this->message[$i]['id_offer'])){
				    		if($who == 2){
				    			$color = "white";
				    		}
				    		else
				    			$color = "black";

				    		$message = '<a href="'.URL.'offer/show/'.$this->message[$i]['id_offer'].'"><img width="20" src="'.URL.'public/images/globe_'.$color.'.png">  </a> ' . $this->message[$i]['message'];	
				    	}

				    	else 
				    		$message = $this->message[$i]['message'];

				    	echo '<p class="message-content'.$who.'"> ';
				    	echo $message. " </p><br><br>";
			    	}

			    	$notMe = $this->notMe($this->idOne, $this->idTwo, $me);

			    ?>	
			    <hr/>
			    <form action="<?php echo URL. "userpanel/sendMessage/$notMe"; ?>" method="post"  enctype="multipart/form-data"  style="text-align:center; margin: 0 auto;">
					<textarea class="form-control" rows="5" name="message" id="message" style="background-color: #fff3f3;"></textarea>
					<input type="submit" value="Wyślij" class="btn btn-search" style="margin-top: 10px;">
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?= URL ?>public/js/ajaxMessage.js"></script>
<script>
  window.onload = unreadMessage(<?= $notMe ?>,"<?=URL?>");
</script>

