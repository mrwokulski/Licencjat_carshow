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
        var offer = '<div class="car-thumb-type">Sprzedam</div><a href="#"><img src="'+ myObj[i].link +'" style="width: 100%; height: 90%;"/></a><div class="car-thumb-text">'+ myObj[i].maker+ " "+ myObj[i].model +'<span style="font-weight: bold; float: right; padding-right: 10px;">'+ myObj[i].price +' zł</span></div>';
        var div = "offer_" + (i+1);
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



function localize(){  

var City = "";

$(document).ready(function(){
        function displayLocation(latitude,longitude){
        var request = new XMLHttpRequest();
     
       var method = 'GET';
       var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
       var async = true;

       request.open(method, url, async);
       request.onreadystatechange = function(){
       if(request.readyState == 4 && request.status == 200){
         var data = JSON.parse(request.responseText);
       
         var addressComponents = data.results[0].address_components;
         for(i=0;i<addressComponents.length;i++){
            var types = addressComponents[i].types            
            if(types=="locality,political"){
               City = addressComponents[i].long_name;               
             }
           }
       }
    };
   request.send();
 };

 var successCallback = function(position){
 var x = position.coords.latitude;
 var y = position.coords.longitude;

 console.log(position.coords.latitude);
 console.log(position.coords.longitude);
  
  setTimeout(function(){
         console.log(City);
     },200);

 displayLocation(x,y);
  };


 navigator.geolocation.getCurrentPosition(successCallback);


  });
}