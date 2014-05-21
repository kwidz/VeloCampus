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

function modifiervelo(noVelo){

	var xhr = getXMLHttpRequest(); 
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        		
        		document.getElementById("baniereajaxaralonge").innerHTML= xhr.responseText; // Données textuelles récupérées
        		
        }
	};
	xhr.open("GET", "traitementModifier.php?noVelo="+noVelo+"", true);
	xhr.send();

}