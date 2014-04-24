// appel de la fonction comme ceci :) $('.dropfile').dropfile();
(function($){

	var o = {
		message : "deposez vos fichiers ici",
		script : "upload.php"
	}

	$.fn.dropfile = function(o){
		this.each(function(){
			$('<span>').addClass('instructions').append("<center><h3>Déposez vos images ici !<h3><center>").appendTo(this);
			$('<span>').addClass('progress').appendTo(this);
			$(this).bind({
				
				dragenter : function(e){//le fichier arrive au niveau de la fenetre
					e.preventDefault(); //on vire le comportement par defaut du navigateur !
					console.log("entré");
				},
				dragover : function(e){
					e.preventDefault(); //on vire le comportement par defaut du navigateur !
					console.log("dragover");	
					$(this.classList.add('hover'));
				},
				dragleave : function(e){
					e.preventDefault(); //on vire le comportement par defaut du navigateur !
					console.log("dragleave");
					$(this.classList.remove('hover'));	
				},
				// drop : function(e){
				// 	e.preventDefault(); //on vire le comportement par defaut du navigateur !
				// 	console.log(e);
				// 	$(this.classList.add('droped'));	
				// },

			});
			this.addEventListener('drop', function(e){
				e.preventDefault();
				console.log(e);
				$(this.classList.remove('hover'));
				
				var files = e.dataTransfer.files;
				upload(files,this,0);
			}, false);
		});
		function upload(files, area, index){
			var file = files[index];

			console.log(file);
			var xhr = new XMLHttpRequest();
			var progress = $(area).find('.progress');
			//evenement (loading)
			xhr.addEventListener('load',function(e){
				
				if(index < files.length-1){
					// alert("passed");
					upload(files, area, index+1);
				}
				var json = jQuery.parseJSON(e.target.responseText);
				if (json.error){
					alert(json.error);
					return false;
				}			
					$(area).append(json.content);
					
			}), false;
			xhr.upload.addEventListener('progress',function(e){
				if(e.lengthComputable){
					var perc=(Math.round(e.loaded/e.total)*100)+'%';
					progress.html('progression : '+perc);
					
				}
			}),false;

			xhr.open('post', "upload.php", true);
			xhr.setRequestHeader('content-type', 'multipart/form-data');
			xhr.setRequestHeader('x-file-type', file.type);
			xhr.setRequestHeader('x-file-size', file.size);
			xhr.setRequestHeader('x-file-name', file.name);
			var url = window.location.search;
			var dossier = (url.substring(url.lastIndexOf("=")+1))
			var regexp = new RegExp('%20', 'g');
			var dossier = dossier.replace(regexp, '\ ');
			// alert(dossier);
  			xhr.setRequestHeader('x-directory-name', (url.substring(url.lastIndexOf("=")+1)));

			xhr.send(file);
		}
	}


})(jQuery);