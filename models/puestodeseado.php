<?php
error_reporting(0);
$btncontinuar='';
$opcion1 = ' ';
$opcion2 = ' ';
$opcion3 = ' ';
$btncontinuar = $_POST['btncontinuar'];
if($btncontinuar != null && $btncontinuar != ''){
  $opcion1 = $_POST['opcion1'];
  $opcion2 = $_POST['opcion2'];
  $opcion3 = $_POST['opcion3'];
}
?>

<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 np">
  <div class="col-xs-12 np text-center">
      <button id="empezar" class="estilo-planifica" type="button" name="continuar" value="continuar" disabled>PLANIFICA TU FUTURO</button>
  </div>
<div class="fondo-rombo espacio-rombo col-xs-12 np col-sm-6 col-md-6 col-lg-6 text-center">
    <div class="col-xs-12 pos-logorombo">
      <img src="app/img/logo2.png" alt="Logo de Puesto - Portal de Crecimiento">
    </div>
    <div class="col-xs-12 text-puestorombo text-center np">
      <span class="color-puestotext">PUESTO DESEADO</span> <br> <span class="color-actualtext">CORTO PLAZO</span>
    </div>
    <div class="col-xs-12 input-text">
      <input id="cortoplazo" class="inputpuesto" type="text" name="cortoplazo" list="listaTrabajos" placeholder="Escribir texto aquí..." autocomplete="off">
      <div id="app" class="col-xs-12 np">
        <datalist id="listaTrabajos" >
            <option v-for="data in all_data " v-bind:value="data.funcion"></option>
       </datalist>
      </div>
    </div>
    <div class="col-xs-12 text-center" id="quitartext" >
        <p id="validacioncortoplazo" class="validacion">
          Campo Obligatorio
        </p>
    </div>
</div>
<div class="fondo-rombo espacio-rombo col-xs-12 np col-sm-6 col-md-6 col-lg-6 text-center">
    <div class="col-xs-12 pos-logorombo">
      <img src="app/img/logocerro.png" alt="Logo de Puesto - Portal de Crecimiento">
    </div>
    <div class="col-xs-12 text-puestorombo text-center np">
      <span class="color-puestotext">PUESTO DESEADO</span> <br> <span class="color-actualtext">LARGO PLAZO</span>
    </div>
    <div class="col-xs-12 input-text">
      <input id="largoplazo" class="inputpuesto" type="text" name="largoplazo" list="listaTrabajos" placeholder="Escribir texto aquí..." autocomplete="off">
      <div id="app" class="col-xs-12 np">
        <datalist id="listaTrabajos" >
            <option v-for="data in all_data " v-bind:value="data.funcion_nombre"> - {{data.abreviatura}}</option>
       </datalist>
      </div>
    </div>
    <div class="col-xs-12 text-center">
      <p id="validacionlargoplazo" class="validacion">
        Campo obligatorio
      </p>
    </div>
</div>
<input id="opcion1" type="hidden" name="opcion1" value="<?= $opcion1; ?>">
<input id="opcion2" type="hidden" name="opcion2" value="<?= $opcion2; ?>">
<input id="opcion3" type="hidden" name="opcion3" value="<?= $opcion3; ?>">
<div class="col-xs-12 np text-center">
    <button id="empezar" class="estilo-buscar" type="button" name="buscar" value="buscar">BUSCAR</button>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('.estilo-buscar').click(function(){

    var puestocortoplazo = $('#cortoplazo').val();
    var puestolargoplazo = $('#largoplazo').val();
    var opcion1 = $('#opcion1').val();
    var opcion2 = $('#opcion2').val();
    var opcion3 = $('#opcion3').val();
    var botonbuscar = $('#empezar').val();
    var flag = true;
    console.log(opcion1);
    console.log(opcion2);
    console.log(opcion3);
    console.log(puestocortoplazo);
    console.log(puestolargoplazo);


    if(puestocortoplazo == null || puestocortoplazo == ''){
      $('#validacioncortoplazo').css('opacity','1');
    }else{
      $('#validacioncortoplazo').css('opacity','0');
    }
    if(puestolargoplazo == null || puestolargoplazo == ''){
      $('#validacionlargoplazo').css('opacity','1');
    }else{
      $('#validacionlargoplazo').css('opacity','0');
    }

    if((puestocortoplazo != null && puestocortoplazo != '') && (puestolargoplazo != null && puestolargoplazo != '')){

      if(puestocortoplazo == puestolargoplazo){
        $('#validacionlargoplazo').text('Elija otro puesto laboral');
        $('#validacionlargoplazo').css('opacity','1');
        flag = false;
      }else{
        $('#validacionlargoplazo').text('Campo obligatorio');
      }

      if(opcion1 == puestocortoplazo || opcion2 == puestocortoplazo || opcion3 == puestocortoplazo){
        $('#validacioncortoplazo').text('Puesto laboral elijido anteriormente');
        $('#validacioncortoplazo').css('opacity','1');
        flag = false;
      }else{
        $('#validacioncortoplazo').text('Campo obligatorio');
      }

      if(opcion1 == puestolargoplazo || opcion2 == puestolargoplazo || opcion3 == puestolargoplazo){
        $('#validacionlargoplazo').text('Puesto laboral elijido anteriormente');
        $('#validacionlargoplazo').css('opacity','1');
        flag = false;
      }else{
        $('#validacionlargoplazo').text('Campo obligatorio');
      }

      if(flag == true){
        $(".contenedor-datos").fadeOut(1000,function(){
          $('.contenedor-datos').css('opacity','0');
          $(".contenedor-datos").css('margin-left','-500px');
          $.ajax({
            url:'models/resultado.php',
            type:'POST',
            data:{btnbuscar:botonbuscar,opcion1:opcion1,opcion2:opcion2,opcion3:opcion3,cortoplazo:puestocortoplazo,largoplazo:puestolargoplazo},
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
      }

    }

  });
});

var app = new Vue({
  el: "#app",
  data: {
    all_data:{},
  },
  created: function(){
    //console.log("buscar.php");
    this.get_contacts();
  },
  methods:{
      get_contacts: function(){
         axios.get('models/buscar.php').then(response => {
      // JSON responses are automatically parsed.
      this.all_data = response.data.puestos;
      console.dir(this.all_data);
    })
      }
   },
})


</script>
