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

				  for($i=0; $i<count($this->messages); $i++){	

					    	echo '<div class="message-author"><a style="color:white; text-decoration: none;" href="'.URL.'userpanel/message/'.$me.'/'.$this->messages[$i]['id'].'">'. $this->messages[$i]['name']. " ";
					   	    echo $this->messages[$i]['surname']. '</div> <div class="message-unread-content">'.$this->messages[$i]['message'].'</a></div><br><br>';
					   	    array_push($repeatArray, $this->messages[$i]['id']);
					}

					for($i=0; $i<count($this->messagesRead); $i++){	
						if(!in_array($this->messagesRead[$i]['id'], $repeatArray)){
					    	echo '<div class="message-author-read"><a style="color:#212529; text-decoration: none;" href="'.URL.'userpanel/message/'.$me.'/'.$this->messagesRead[$i]['id'].'">'. $this->messagesRead[$i]['name']. " ";
					   	    echo $this->messagesRead[$i]['surname']. '</div>  <div class="message-read-content">'.$this->messagesRead[$i]['message'].'</div><br><br>';
					   	}
					}	

					?>
			</div>
		</div>
	</div>
</div>


