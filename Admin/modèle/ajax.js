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

function afficheCadenas(noVelo){
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById("cadenas").innerHTML= xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/liaisonCadenasVelo.php?idVelo="+noVelo+"&action=infos", true);
	xhr.send();
}

function afficheVelo(noCadenas, id){
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById(id).innerHTML= xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/liaisonVeloCadenas.php?idCadenas="+noCadenas+"&action=infos", true);
	xhr.send();
}

function afficheDescModele(mod) {
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById("formulaire").innerHTML= xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/modMod.php?mod="+mod, true);
	xhr.send();
}