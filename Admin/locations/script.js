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

function banner(etat, id_location){

	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        		document.getElementById("test").innerHTML= xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "banner.php?variable1="+etat+"&variable2="+id_location+"", true);
	xhr.send();

}

function gestionEtat(id_velo){

	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        		document.getElementById("test").innerHTML= xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "EtatVelo.php?id_velo="+id_velo+"", true);
	xhr.send();

}