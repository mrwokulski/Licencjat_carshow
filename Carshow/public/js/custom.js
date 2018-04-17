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
