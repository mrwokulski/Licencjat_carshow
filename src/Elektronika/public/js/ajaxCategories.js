var type2 = 0;
function getCategories(URL){

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {

	        myObj = JSON.parse(this.responseText);
					var category = '';
					category += '<div class="row row-margin">';

	        for(i=0; i < myObj.length; i++){
							category += '<div class="col-md-3"><label><input type="radio" name="category" value="'+ myObj[i].id +'"><img src="'+ URL + myObj[i].icon_path +'" alt="'+ myObj[i].name +'" style="width: 100%; height: 100%;" onClick="hideModal(\'' + myObj[i].name + '\')"/></label></div>';
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

function hideModal(value){

	document.getElementById("cat_button").innerHTML = value;
	$('#categories').modal('hide');
}


