<div class="col-md-6" >

    <img src="../images/postit.png"  width="600" height="600"  style="position:absolute;z-index:1" class="img-responsive">

    <div class="row"><br/><br/><br/><br/><br/>
        <div class="col-md-9 col-md-offset-2" style="position:absolute;z-index:2">
            <div style="overflow:auto;height:200pt">
                <?php 
                require_once("../co.php");
                $sql = 'SELECT * FROM Postit';
                $res = $mysqli->query($sql);
                $i = 0;
                while (NULL !== ($row = $res->fetch_array())){
                    $i++;
                    if($i%2==0){
                        echo '<p><h4 style="color:blue">'.$row['nom_postit'].' : </h4>'.$row['message_postit'].' <a href="../traitement/suppr.php?id='.$row['id_postit'].'" class="glyphicon glyphicon-remove" style="color:red"></a></p>';
                    }
                    else { echo '<p><h4 style="color:green">'.$row['nom_postit'].' : </h4>'.$row['message_postit'].' <a href="../traitement/suppr.php?id='.$row['id_postit'].'" class="glyphicon glyphicon-remove" style="color:red"></a></p>';}
                }

                ?>

            </div>

            <div class="row">
                <div class="col-md-20 " style="position:absolute;z-index:3">
                    <form class="form-inline" role="form" method="POST" action="../traitement/postit.php">
                        <div class="form-group">
                            <label class="sr-only">nom</label>
                            <!--<textarea cols="10" rows="1" class="form-control" id="nom" name="nom" placeholder="Pseudo"></textarea>-->
                            <input type="text" class="form-control" placeholder="Pseudo" id="nom" name="nom">

                        </div>
                        <div class="form-group">
                            <label class="sr-only">mess</label>
                            <!-- <input type="text" class="form-control" id="mess" placeholder="Message"> -->
                            <textarea cols="50" rows="2" class="form-control" id="mess" name="mess" placeholder="Message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>