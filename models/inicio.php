<?php
$btninicio = '';
$btninicio = $_POST['btninicio'];
if($btninicio!=null && $btninicio != ''){

}
 ?>
 <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4 text-center espacio-cambio np">
   <div class="border-cuadro col-xs-12 np">
     <div class="fondo-blanco col-xs-12">
       <p>
         <span class="bien-text">¡Bienvenid@ a este gran viaje!</span> <br>
         A través de este mapa, tú podrás marcar los <br>
         pasos necesarios para alcanzar tus expectativas de carrera.
       </p>
       <p class="espacio-text">¡Cuentas con nosotros para guiarte <br>
          por las experiencias que maximicen tu desarrollo!</p>
     </div>
   </div>
 </div>
 <div class="col-xs-12 text-center">
         <button id="empezar" class="estilo-empezar" type="button" name="empezar" value="empezar">EMPEZAMOS</button>
 </div>

<script type="text/javascript">
$(document).ready(function() {
  $('.estilo-empezar').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('.estilo-empezar').val();

    $(".contenedor-datos").fadeOut(1000,function(){
      $(".contenedor-datos").css('margin-left','-500px');
      $.ajax({
        url:'models/puestos.php',
        type:'POST',
        data:{btn:btn},
        datatype:'html',
        success:function(datahtml){
          $('.contenedor-datos').html(datahtml);
        },error: function(){
          $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
        }
      });
    });
    $( ".contenedor-datos" ).fadeIn(500, function() {
      $(".contenedor-datos").css('margin-left','0px');
      $('.contenedor-datos').css('opacity','1');
      $('.contenedor-datos').css('margin-bottom','90px');

    });
  });
});
</script>
