var type2 = 0;
function getCategories(URL){

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {

	        myObj = JSON.parse(this.responseText);
					var category = '';
					category += '<div class="row row-margin">';

	        for(i=0; i < myObj.length; i++){
							category += '<div class="col-md-3"><label><input type="radio" name="category" value="'+ myObj[i].id +'"><img src="'+ myObj[i].icon_path +'" alt="'+ myObj[i].name +'" style="width: 100%; height: 100%;" onClick="hideModal(\'' + myObj[i].name + '\')"/></label></div>';
						}
					category += '</div>';

					document.getElementById("allcategories").innerHTML = category;
	    }
	};
	xmlhttp.open("GET", URL+"addoffer/getCategories", true);
	xmlhttp.send();

};

function hide(id) {

  var elem = document.getElementById(id);

  elem.style.visibility = (elem.style.visibility === 'hidden')? 'visible' : 'hidden';
};

function hideBlock(id) {

		var isHiddenPrice = true;
    var x = document.getElementById(id);

		x.style.display = (x.style.display == 'none')? 'block' : 'none';

		if(id == 'type2form1'){
			var elem = document.getElementById('type2form2');
			elem.style.marginRight = '20%';
		}

}


function hideModal(value){

	document.getElementById("cat_button").innerHTML = value;
	$('#categories').modal('hide');
}

function dropPrices(id){

	var elem = document.getElementById(id);	
	$(id).attr("aria-expanded","true");
}

function giveaway(){
			var elem = document.getElementById('type2form');
			var price = document.getElementById('price');
			price.value = 0;
			elem.style.marginLeft = "auto";
			elem.style.marginRight = "auto";
		
}

function test(value){

			var elem = document.getElementById('type2form');
			if(value == 1){
			var x = document.getElementById('type2form');
			}
			else{

			}
		x.style.display = (x.style.display == 'none')? 'block' : 'none';

}