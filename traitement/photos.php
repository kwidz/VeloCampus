<?php
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
  margin-bottom:25px;           
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


<ul class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222">
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/fond4.jpg" onclick="modal()"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/fond3.jpg"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/fond2.jpg"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/photos/first_Event/images.jpeg"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/photos/first_Event/images.jpeg"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/photos/first_Event/images.jpeg"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/photos/first_Event/images.jpeg"/></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" src="../images/photos/first_Event/images.jpeg"/></li>

</ul>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">         
      <div class="modal-body">  
        <script>
        $('li img').on('click',function(){
          //creation de la boite d'image grande taille 
          var src = $(this).attr('src');
          var img = '<img src="' + src + '" class="img-responsive"/>';

          //ajout des boutons suivant et precedent 
          var index = $(this).parent('li').index();                   
          var html = '';
          html += img;                
          html += '<div style="height:25px;clear:both;display:block;">';
          html += '<a class="controls next" href="'+ (index+2) + '">suivant&raquo;</a>';
          html += '<a class="controls previous" href="' + (index) + '">&laquo;precedent</a>';       
          html += '</div>';

          //fin de l'ajout des boutons 
          $('#myModal').modal();
          $('#myModal').on('shown.bs.modal', function(){
            $('#myModal .modal-body').html(html);
            $('a.controls').trigger('click');
          })
          $('#myModal').on('hidden.bs.modal', function(){
            $('#myModal .modal-body').html('');
          });
        });
        //fin de la creation de la boite d'image
        //creation d'une logique d'ordre des images 
        $(document).on('click', 'a.controls', function(){
         var index = $(this).attr('href');
         var src = $('ul.row li:nth-child('+ index +') img').attr('src');             
         $('.modal-body img').attr('src', src);
         var newPrevIndex = parseInt(index) - 1; 
         var newNextIndex = parseInt(newPrevIndex) + 2; 
         if($(this).hasClass('previous')){               
          $(this).attr('href', newPrevIndex); 
          $('a.next').attr('href', newNextIndex);
        }else{
          $(this).attr('href', newNextIndex); 
          $('a.previous').attr('href', newPrevIndex);
        }
        var total = $('ul.row li').length + 1; 
        //on cache le bouton suivant à la dernière image et on cache le bouton precedent a la premiere 
        if(total === newNextIndex){
          $('a.next').hide();
        }else{
          $('a.next').show()
        }            
        if(newPrevIndex === 0){
          $('a.previous').hide();
        }else{
          $('a.previous').show()
        }
        return false;
      });

</script>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php
include("../footer.html");
?>

<!-- style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" -->