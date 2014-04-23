<?php
include("recursive.php");
session_start();
include("../header.html");
if (isset($_SESSION['log']) && $_SESSION['log'] == 1) {
 include("../menulog.html");
}
else {
 include("../menu.html");
 if (isset($_SESSION['log']) && $_SESSION['log'] == 0) {
   $_SESSION = array(); 
   include("../banniereErreurConn.html");
 }
}

?>

<style>
ul {         
  padding:0 0 0 0;
  margin:0 0 0 0;
}
ul li {     
  list-style:none;
          
}
ul li img {
  cursor: pointer;
}
.controls{          
  width:50px;
  display:block;
  font-size:11px;
  padding-top:8px;
  font-weight:bold;          
}
.next {
  float:right;
  text-align:right;
}
</style>

<!--   <div class="row" > -->
    <!-- <div class="col-md-12"> -->

 <?php parcourir_repertoire('../images/photos/') ?>
<!--   </div> -->
<!--   </div> -->


<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="monModalDialog">


    <div class="modal-content" >

      <div class="modal-header" style="border-style:none;">
        <button type="button" class="close" data-dismiss="modal">x</button>
        
      </div>

      <div class="modal-body">  
        <script>
        $(document).ready(function(){
           $('li img').on('click',function(){
                var src = $(this).attr('src');
                var img = '<img src="' + src + '" class="img-responsive"/>';
                $('#myModal').modal();
                $('#myModal').on('shown.bs.modal', function(){
                    $('#myModal .modal-body').html(img);
                });
                $('#myModal').on('hidden.bs.modal', function(){
                    $('#myModal .modal-body').html('');
                });
           });  
        })

</script>

</div>
<div class="modal-footer" style="border-style: none;">
    <button class="btn btn-danger" data-dismiss="modal">Fermer</button>
</div>      
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php
include("../footer.html");
?>

<!-- style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" -->