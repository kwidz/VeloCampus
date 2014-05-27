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

function verifid(id) {
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById("confirmid").innerHTML = xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/verifID.php?id="+id, true);
	xhr.send();
}

function verifcad1(id) {
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById("verifcad1").innerHTML = xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/verifID.php?id="+id, true);
	xhr.send();
}

function verifcad2(id) {
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById("verifcad2").innerHTML = xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/verifID.php?id="+id, true);
	xhr.send();
}

function verifcad3(id) {
	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {	
        	document.getElementById("verifcad3").innerHTML = xhr.responseText; // Données textuelles récupérées
        }
	};
	xhr.open("GET", "traitement/verifID.php?id="+id, true);
	xhr.send();
}