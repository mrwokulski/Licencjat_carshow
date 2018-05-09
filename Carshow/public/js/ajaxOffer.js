function getOffer(id, URL){


var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);

        document.getElementById("maker").innerHTML = myObj.maker +" "+ myObj.model;
        document.getElementById("maker_top").innerHTML = myObj.title;

        if(myObj.type == 1){
          document.getElementById("type").innerHTML = 'Rodzaj ogłoszenia: Sprzedaż';
        }
        if(myObj.type == 2){
          document.getElementById("type").innerHTML = 'Rodzaj ogłoszenia: Kupna';
        }

        if(myObj.type2 == 0){
          document.getElementById("type2").innerHTML = 'Nie interesuje mnie zamiana.';
        }
        if(myObj.type2 == 1){
          document.getElementById("type2").innerHTML = 'Interesuje mnie zamiana';
        }
        if(myObj.type2 == 2){
          document.getElementById("type2").innerHTML = 'Oddam za darmo';
        }
        if(myObj.actual == 0)
             document.getElementById("price").innerHTML = "Oferta nieaktualna";
        else            
             document.getElementById("price").innerHTML = myObj.price + "zł";
        document.getElementById("description").innerHTML = myObj[7];
        document.getElementById("date").innerHTML = "Ogłoszenie w serwisie od: " + getDiffDate(myObj.date_added) + " dni";
        document.getElementById("name").innerHTML = myObj.name + " " + myObj.surname;
        document.getElementById("tel").innerHTML = '<img src="'+URL+'public/images/tel.png" width=15>' + myObj.tel;


        var images = '';
        var it = 1;
        for(i=22; i<27; i++){
            if(myObj.hasOwnProperty(i)){
                images += '<span onclick="setImage('+it+","+id+',\''+URL+'\')" style="cursor:pointer;"><img src="'+URL+'views/offer/'+id+'/'+myObj[i].link+'" class="car-thumb" style="width:20%; border: solid #e2d5d5 2px; height:100px;"></span>';
                //images = images + '<img src="'+URL+'views/offer/'+id+'/images/'+myObj[i].link+'" style="width:95%"></div>';
                it++;
            }
        }
        document.getElementById("images").innerHTML = images;


    }
};
xmlhttp.open("GET", URL+"offer/getOffer/"+id, true);
xmlhttp.send();

};


function getDiffDate(date){

  date = String(date);
  date = date.split("-");

    var d = date[2];
    var m = date[1];
    var y = date[0];

    var date1 = new Date(m+"/"+d+"/"+y);
    var date2 = new Date();
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

return diffDays;

}


function setImage(nr, id, URL){

    var plik = '<img src="'+URL+'views/offer/'+id+'/img'+nr+'.jpg" class="car-thumb">';
    document.getElementById("slider").innerHTML = plik;
}
