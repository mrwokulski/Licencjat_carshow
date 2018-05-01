var URL = "http://localhost:8080/Carshow/";

function unreadMessage(id_user1){

var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", URL+'userpanel/unreadMessage/'+id_user1, true);
xmlhttp.send();
}

function unreadMessages(){

var xmlhttp = new XMLHttpRequest();

var many = "";  
var manyInt;
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);   
    

       if(myObj.many != 0){
            many = "(" + myObj.many + ")";  
           document.getElementById('message_img').innerHTML = '<img src="'+URL+'public/images/msg2.png" width="40">';

       }  
       
       document.getElementById('messages').innerHTML = "Pokaż wiadomości " + many ;


    }
};

xmlhttp.open("GET", URL+'userpanel/unreadMessages', true);
xmlhttp.send();

setInterval(unreadMessages, 30000);

}


        
