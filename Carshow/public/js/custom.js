function zmien(){

	document.getElementById('test').innerHTML = "SIEMANDERO";
};

function hide(id) {

  var elem = document.getElementById(id);

  elem.style.visibility = (elem.style.visibility === 'hidden')? 'visible' : 'hidden';
};

function generateCategories() {

	 //document.getElementById('categories').innerHTML = "";
	 xmlhttp = new XMLHttpRequest();

	 xmlhttp.onreadystatechange = function()
	   {
	     if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	     {
	       document.getElementById("categories").innerHTML = xmlhttp.responseText;
	     }
	   };

	 	xmlhttp.open("GET","addoffer/getTest",true);
		xmlhttp.send();
};


funcion getOffers(){

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);       

        for(i=0; i<myObj.length; i++){
        let offer = '<div class="car-thumb-type">Sprzedam</div><a href="#"><img src="'+ myObj[i].link +'" style="width: 100%; height: 90%;"/></a><div class="car-thumb-text">'+ myObj[i].maker+ " "+ myObj[i].model +'<span style="font-weight: bold; float: right; padding-right: 10px;">'+ myObj[i].price +' zł</span></div>';
        let div = "offer_" + (i+1);
        document.getElementById(div).innerHTML = offer;
      }

    }
};
xmlhttp.open("GET", "<?= URL ?>/index/topOffers", true);
xmlhttp.send();

};