
<script type="text/javascript" src="jQuery.js">
</script>
<script type="text/javascript" src="dropfile.js"></script>

<script type="text/javascript">
	jQuery(function($){
		$('.dropfile').dropfile();
	});
</script>


<style>
.dropfile{
	overflow:auto;
	padding: 15px;
	color: #CDCACA;
	border: 3px dashed #CDCACA !important;
	border-radius: 10px;
	margin-bottom: 15px;
}
.hover{
	color: #CDCACA;
	background-color: #CDDDDD;
}
.droped{
	color: #CDCACA;
	background-color: red;
}
.progress{
	color: #CDCACA;

}
.lien:hover{
  background-color: #CDDDDD;
}
</style>

<?php
  session_start();
  include("../header.html");
  if (isset($_SESSION['log']) && $_SESSION['log'] == 3) {
      include("../menulog.html");?>
      <div class="col-md-6">
      <div class="dropfile" >
          <center><h4>Pour partager plusieurs photos d'un seul coups :</h4></center>
      </div><br/>
<div>
<?php
echo '<form method="post" action="upload_simple.php?dossier='.$_GET['dossier'].'" enctype="multipart/form-data">';?>
<input type="file" name="file" id="file" /><br />

<input type="submit" name="submit" value="Envoyer" />
</form>
<?php
  if(isset($_GET['erreur'])){
    switch ($_GET['erreur']) {
      case 'noproblem':
        echo "<div class='alert alert-success'><center>Le fichier a bien été mis en ligne</center></div>";
        break;
      case 'erreurfich':
        echo "<div class='alert alert-danger'><center>Type de fichier non supporté</center></div>";
        break;
      default:
        echo "<div class='alert alert-danger'><center>Erreur veuillez recommencer</center></div>";
        break;
    }
  }
?>
</div>
      <div class= "lien" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA" width="100%" height="35px"><a href="index.php">Retour Menu Photos</a></div>
      <div class= "lien" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA" width="100%" height="35px"><a href="../../traitement/photos.php">Galerie Photos</a></div>
      </div>
             
       
      	<?php
      include("../demandeInscription.php");?>
      
    <?php
    }
    else {
      include("../menu.html");
      if (isset($_SESSION['log']) && $_SESSION['log'] == 4) {
        $_SESSION = array(); 
        ?>
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger">Aucune correspondance Pseudo/mot de passe trouvée. Veuillez réessayer.</div>
          </div>
        </div><?php
      }
    }
?>



<?php
	include("../footer.html");
?>