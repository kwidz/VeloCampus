


    <?php
    require_once('../co.php');
    if(isset($_GET['id'])){
    	$sql='select * from Adherent where id_adherent='.$_GET["id"].'';
    	$res = $mysqli->query($sql);
    	$row = $res->fetch_array();
    	
        echo '<table class="bordered-table"style="border:solid 1px #CDCACA; border-radius:50px">';


        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspNOM&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[1].'&nbsp</td></tr>';
        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspPRENOM&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[2].'&nbsp</td></tr>';
        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspDATE DE NAISSANCE&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[3].'&nbsp</td></tr>';
        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspADRESSE&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[4].'&nbsp</td></tr>';
        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspCODE POSTALE&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[5].'&nbsp</td></tr>';
        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspTELEPHONE&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[6].'&nbsp</td></tr>';
        echo '<tr><td style="border:solid 1px #CDCACA;font-weight:bold;color:RoyalBlue">&nbspADRESSE MAIL&nbsp</td><td style="border:solid 1px #CDCACA">&nbsp'.$row[7].'&nbsp</td></tr>';
    	

        echo '</table>'	;


   }
    
        ?>