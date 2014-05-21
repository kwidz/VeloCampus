<?php
include('../co.php');
header("Content-Type: text/plain");
$id_velo = (isset($_GET["noVelo"])) ? $_GET["noVelo"] : NULL;

$sql="SELECT * from Velo where id_velo = $id_velo";
$res=$mysqli->query($sql);
$row = $res->fetch_array();
$statsVelo=$row[0];
?>
Etat du velo :
          <select class="form-control" name="etat_velo" required>
            <?php
            $sql="SELECT * from Etat";
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())){
              echo'<option value="'.$row["id_Etat"].'">'.$row["libelle_etat"].'';
            }
            ?>
          </select></br>

          Taille du velo :
          <select class="form-control" name="taille_velo" required>
            <?php
            $sql="SELECT * from Taille";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo'<option value="'.$row["id_taille"].'">'.$row["libelle_taille"].'</option>';
            }
            ?>
          </select><br>

          Type de velo :
          <select class="form-control" name="type_velo" required>
            <?php
            $sql="SELECT * from _Type";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_type"].'">'.$row["libelle_type"].'</option>';
            }

            ?>