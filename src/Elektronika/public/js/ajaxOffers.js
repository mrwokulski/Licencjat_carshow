function startAjax(URL){
	getOffers(URL);
}

function getOffers(URL){

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);       

        for(i=0; i < myObj.length; i++){

        var type = "";

         if(myObj[i].type == 1)
             type = "Sprzedam"
         else
             type = "Kupię"

         var offer = '<div class="car-thumb-type">'+ type +'</div><a href="'+URL+'offer/show/'+myObj[i].id+'"><img src="'+URL+"views/offer/"+myObj[i].id+'/img1.jpg" style="width: 100%; height: 90%;"/></a><div class="car-thumb-text">'+ myObj[i].maker+ " "+ myObj[i].model +'<span style="font-weight: bold; float: right; padding-right: 10px;">'+ myObj[i].price +' zł</span></div>';        var div = "offer_" + (i+1);
                document.getElementById(div).innerHTML = offer;
        }

    }
};
xmlhttp.open("GET", URL+"index/topOffers", true);
xmlhttp.send();

};




