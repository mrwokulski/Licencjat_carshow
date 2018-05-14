function startAjax(URL){
	getOffers(URL);
	getPremiumOffers(URL);
  localize();
}

function getOffers(URL){

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);       

        for(i=0; i < myObj.length; i++){
 var offer = '<div class="car-thumb-type">Sprzedam</div><a href="'+URL+'offer/show/'+myObj[i].id+'"><img src="'+URL+"views/offer/"+myObj[i].id+'/img1.jpg" style="width: 100%; height: 90%;"/></a><div class="car-thumb-text">'+ myObj[i].maker+ " "+ myObj[i].model +'<span style="font-weight: bold; float: right; padding-right: 10px;">'+ myObj[i].price +' zł</span></div>';        var div = "offer_" + (i+1);
        document.getElementById(div).innerHTML = offer;
      }

    }
};
xmlhttp.open("GET", URL+"index/topOffers", true);
xmlhttp.send();

};


function getPremiumOffers(URL){

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);       

        for(i=0; i < myObj.length; i++){
        var offer = '<div class="car-thumb-type-premium">⋆ Sprzedam</div><a href="#"><img src="'+ myObj[i].link +'" style="width: 100%; height: 90%;"/></a><div class="car-thumb-text">'+ myObj[i].maker+ " "+ myObj[i].model +'<span style="font-weight: bold; float: right; padding-right: 10px;">'+ myObj[i].price +' zł</span></div>';
        var div = "offer_p" + (i+1);
        document.getElementById(div).innerHTML = offer;
      }

    }
};
xmlhttp.open("GET", URL+"index/premiumOffers", true);
xmlhttp.send();

};


