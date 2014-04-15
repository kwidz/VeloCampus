<?php
	include("../header.html");
	include("../menu.html");
	include("../footer.html");
?>

<div class="row"> <!-- permet d'ouvrir une nouvelle ligne puis une nouvelle cellule -->
	<div class="col-md-12"><!-- utiliser se lien ensuite pour faire les formulaires : http://getbootstrap.com/css/#forms  -->
		<form class="form-horizontal" role="form">
  			<div class="form-group">
    			<label for="inputEmail3" class="col-sm-5 control-label">Email</label>
    			<div class="col-sm-3">
      				<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    			</div>
  			</div>
  			<div class="form-group">
    			<label for="inputPassword3" class="col-sm-5 control-label">Password</label>
    			<div class="col-sm-3">
      				<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    			</div>
 			 </div>
  			<div class="form-group">
    			<div class="col-sm-offset-5 col-sm-10">
      				<div class="checkbox">
        				<label><input type="checkbox"> Remember me</label>
      				</div>
    			</div>
			</div>
  			<div class="form-group">
    			<div class="col-sm-offset-5 col-sm-10">
      				<button type="submit" class="btn btn-default">Sign in</button>
   				</div>
  			</div>
</form>




	</div>
</div>