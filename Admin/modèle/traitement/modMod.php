<?php
session_start();
include('../../co.php');
if (isset($_GET['mod'])){
	$model = $_GET['mod'];
	$sql = "SELECT description_type, caracteristiques_type FROM _Type WHERE id_type = $model";
	$res=$mysqli->query($sql);
	if ($res) {
    	while (NULL !== ($row = $res->fetch_array())){
    		?>
    		<br/>Description : <br/>
    		<input type="text" name="desc" class="form-control" value="<?php echo $row["description_type"];?>"></input> <br/>
    		Caractéristiques : <br/>
    		<input type="text" name="car" class="form-control" value="<?php echo $row["caracteristiques_type"];?>"></input>
    		<?
    	}
	}	
}
?>

