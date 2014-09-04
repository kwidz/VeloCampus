<?php
session_start();
include('../../../co.php');
if (isset($_POST["idType"]) && isset($_POST["desc"]) && isset($_POST["car"])) {
  $idType = $_POST["idType"];
  $desc = $_POST["desc"];
  $car = $_POST["car"];
  $sql = "UPDATE _Type SET description_type = '$desc', caracteristiques_type = '$car' WHERE id_type = '$idType'";
  $res=$mysqli->query($sql);
  if ($res) $_SESSION["modMod"] = 1;
  else $_SESSION["modMod"] = -1;
}
else $_SESSION["modMod"] = -1;
header("Location: ".$_SERVER['HTTP_REFERER']);
?>