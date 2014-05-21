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

function banner(adresse){

	var xhr = getXMLHttpRequest(); // Voyez la fonction getXMLHttpRequest() définie dans la partie précédente
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        		 // Données textuelles récupérées
        		
        		var json = jQuery.parseJSON(xhr.responseText);
        		if (json.error){
					document.getElementById("banniere").innerHTML= json.error;
					document.getElementById('Valider').disabled='disabled';
				}	
				else{
					document.getElementById("banniere").innerHTML= json.content;
					document.getElementById('Valider').disabled='';
				}
				
					
        }
	};
	xhr.open("GET", "../banner.php?adresse="+adresse+"", true);
	xhr.send();

}