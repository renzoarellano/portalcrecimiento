<?php
$btncontacto = '';
$btncontacto = $_POST['btncontacto'];
if($btncontacto != null && $btncontacto != ''){

}

 ?>

 <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
   <div class="col-xs-12  np text-center">
     <button class="estilo-enviar" type="button" name="button" disabled>CONTACTO</button>
   </div>
 </div>
 <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4 text-center espacio-cambio np">
   <div class="border-cuadro col-xs-12 np">
     <div class="fondo-blancocontacto col-xs-12">
      <p class="estilo text-contacto">
        Ahora que trazaste tu camino ideal, es momento de juntarte con tu guía <br> de  ruta para planificar
        tus próximas experiencias de desarrollo. <br> <br>
        Si tienes  alguna duda o sugerencia durante este camino no dudes en contactar <br>
        a tu representante de Capital Humano complentando la siguiente información:
      </p>
     </div>
   </div>
 </div>
 <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-4 col-lg-4">
   <form class="" method="post" autocomplete="off">
      <div class="form-group col-xs-12 np">
        <label class="labelform-estilo">Nombre completo:</label>
        <div class="col-xs-12 np">
          <input class="input-estilo" type="text" class="form-control" id="name" placeholder="Ingrese su nombre" required>
        </div>
      </div>
      <div class="form-group col-xs-12 np">
        <label class="labelform-estilo">Correo:</label>
        <div class="col-xs-12 np">
          <input class="input-estilo" type="text" class="form-control" id="email" placeholder="Ingrese su correo electrónico" required>
        </div>
      </div>
      <div class="form-group col-xs-12 np">
        <label class="labelform-estilo">Mensaje:</label>
        <textarea id="message" name="message" width="100%" height="400px" placeholder="Ingrese su mensaje" required></textarea>
      </div>
      <div class="col-xs-12 np text-center">
          <button id="enviarFormulario" class="enviarForm estilo-enviar" type="button" name="enviar" value="enviar">Enviar</button>
      </div>
   </form>
 </div>


 <script type="text/javascript">
 $(document).ready(function() {
   $('#enviarFormulario').click(function(){

     var nombre = $('#name').val();
     var email = $('#email').val();
     var message = $('#message').val();
     var botonenviar = $('#enviarFormulario').val();

     if(nombre == '' || nombre == null){
       //$('.validacion').css('opacity','1');
     }else{
      // $('.validacion').css('opacity','0');
       $(".contenedor-datos").fadeOut(500,function(){
         $.ajax({
           url:'models/gracias.php',
           type:'POST',
           data:{btnenviar:botonenviar,nombre:nombre,email:email,message:message},
           datatype:'html',
           success:function(datahtml){
             $('.contenedor-datos').html(datahtml);
           },error: function(){
             $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
           }
         });
         $(".contenedor-datos").css('margin-right','-500px');
         $('.contenedor-datos').css('opacity','0');
         $('.contenedor-datos').css('transition','0.8s all');

       });
       $( ".contenedor-datos" ).fadeIn(1500, function() {
         $(".contenedor-datos").css('margin-right','0px');
         $('.contenedor-datos').css('opacity','1');
         $('.contenedor-datos').css('margin-bottom','90px');

       });
     }
   });
 });
 </script>
