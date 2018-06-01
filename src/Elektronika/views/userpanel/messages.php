<div class="container">
  	<div class="row row-margin">
   	 	<div class="col-md-12 userpanel-view-table ">
		    <br/>
		    <h2 class="title-clr">Twoje wiadomości:</h2>
		    <hr/>
		     <div class="message-container">
			    <?php 			   

			    $me = View::showArrayValue('log',6);
			    $repeatArray = array();		

			    if(count($this->messages)>0)
			    	echo "Nowe wiadomości: <br><br>"; 
			       

				  for($i=0; $i<count($this->messages); $i++){	

				  			$mess = substr($this->messages[$i]['message'], 0, 17);
				  			if(strlen($this->messages[$i]['message'])>17)
				  				$mess = $mess." ...";

					    	echo '<div class="message-author col-md-5"><a style="color:white; text-decoration: none;" href="'.URL.'userpanel/message/'.$me.'/'.$this->messages[$i]['id'].'">'. $this->messages[$i]['name']. " ";
					   	    echo $this->messages[$i]['surname']. '</div> <div class="message-unread-content col-md-6">'.$mess.'</a></div><br><br>';
					   	    array_push($repeatArray, $this->messages[$i]['id']);
					}


					echo "<hr/> Przeczytane wiadomości: <br><br>"; 

					for($i=0; $i<count($this->messagesRead); $i++){	
						if(!in_array($this->messagesRead[$i]['id'], $repeatArray)){
					    	echo '<div class="message-author-read"><a style="color:#212529; text-decoration: none;" href="'.URL.'userpanel/message/'.$me.'/'.$this->messagesRead[$i]['id'].'">'. $this->messagesRead[$i]['name']. " ";
					    	$mess = substr($this->messagesRead[$i]['message'], 0, 17);
				  			if(strlen($this->messagesRead[$i]['message'])>17)
				  				$mess = $mess." ...";
					   	    echo $this->messagesRead[$i]['surname']. '</div>  <div class="message-read-content">'.$mess.'</div><br><br>';
					   	}
					}	

					?>
			</div>
		</div>
	</div>
</div>


