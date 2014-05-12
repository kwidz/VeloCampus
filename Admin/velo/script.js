function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function formModificatio(id_velo){
	var xhr = getXMLHttpRequest(); // Voyez la fonction getXMLHttpRequest() définie dans la partie précédente
	xhr.onreadystatechange = function() {
    	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
       		document.getElementById("afficheForm").innerHTML= xhr.responseText; // Données textuelles récupérées
    	}
	};
	xhr.open("GET", "formModif.php?id_velo="+id_velo+"", true);
	xhr.send();
}