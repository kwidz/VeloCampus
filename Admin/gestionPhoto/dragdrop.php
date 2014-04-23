
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
</style>

<?php
  session_start();
  include("../header.html");
  if (isset($_SESSION['log']) && $_SESSION['log'] == 2) {
      include("../menulog.html");?>
      <div class="dropfile col-md-6" >

      </div>
      	<?php
      include("../demandeInscription.php");
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