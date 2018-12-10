<?php
$btn= '';
$btn = $_POST['btn'];
if($btn != null && $btn != ''){

}
 ?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 np">
<div class="fondo-rombo espacio-rombo col-xs-12 np col-sm-6 col-md-6 col-lg-4 text-center">
    <div class="col-xs-12 pos-logorombo">
      <img src="app/img/logo3.png" alt="Logo de Puesto - Portal de Crecimiento">
    </div>
    <div class="col-xs-12 text-puestorombo text-center np">
      <span class="color-puestotext">PUESTO</span> <br> <span class="color-actualtext">ACTUAL</span>
    </div>
    <div class="col-xs-12 input-text">
        <input id="puestoactual" class="inputpuesto" type="text" name="puestoactual" list="listaTrabajos" placeholder="Escribir texto aquí..." autocomplete="off">
        <!-- Se coloca onKeyUp = "buscar();" en input para busqueda por DB directamente-->
        <div id="app" class="col-xs-12 np">
          <datalist id="listaTrabajos" >
          <option v-for="data in all_data " v-bind:value="data.funcion"></option>
         </datalist>
        </div>
    </div>
    <div class="col-xs-12 text-center">
      <p class="validacion">
        Campo obligatorio
      </p>
    </div>
</div>
<div class="fondo-rombo espacio-rombo col-xs-12 np col-sm-6 col-md-6 col-lg-4 text-center">
  <div class="col-xs-12 pos-logorombo">
    <img src="app/img/logo3.png" alt="Logo de Puesto - Portal de Crecimiento">
  </div>
  <div class="col-xs-12 text-puestorombo text-center np">
    <span class="color-puestotext">PUESTO</span> <br> <span class="color-actualtext">ANTERIOR 01</span> <span class="color-opcionaltext">(opcional)</span>
  </div>
  <div class="col-xs-12 input-text">
    <input id="puestoanterior" class="inputpuesto" type="text" name="puestoanterior" list="listaTrabajos" placeholder="Escribir texto aquí..." autocomplete="off">
    <div id="app">
      <datalist id="listaTrabajos" >
          <option id="pruebaDatos" v-for="data in all_data " v-bind:value="data.funcion"></option>
     </datalist>
    </div>
  </div>
  <div class="col-xs-12 text-center">
    <p class="validacion2">
     Elija otro puesto laboral
    </p>
  </div>
</div>
<div class="fondo-rombo espacio-rombo col-xs-12 np col-sm-12 col-md-12 col-lg-4 text-center">
  <div class="col-xs-12 pos-logorombo">
    <img src="app/img/logo3.png" alt="Logo de Puesto - Portal de Crecimiento">
  </div><div class="col-xs-12 text-puestorombo text-center np">
    <span class="color-puestotext">PUESTO</span> <br> <span class="color-actualtext">ANTERIOR 02</span> <span class="color-opcionaltext">(opcional)</span>
  </div>
  <div class="col-xs-12 input-text">
    <input id="puestoanterioropc" class="inputpuesto" type="text" name="puestoanterioropc" list="listaTrabajos" placeholder="Escribir texto aquí..." autocomplete="off">
    <div id="app">
      <datalist id="listaTrabajos" >
          <option id="pruebaDatos" v-for="data in all_data " v-bind:value="data.funcion "></option>
     </datalist>
    </div>
  </div>
  <div class="col-xs-12 text-center">
    <p class="validacion3">
     Elija otro puesto laboral
    </p>
  </div>
</div>

<div class="col-xs-12 np text-center">
    <button id="empezar" class="estilo-continuar" type="button" name="continuar" value="continuar">CONTINUAR</button>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('.estilo-continuar').click(function(){

    var puestotext = $('#puestoactual').val();
    var puestopc1 = $('#puestoanterior').val();
    var puestopc2 = $('#puestoanterioropc').val();
    var botoncontinuar = $('.estilo-continuar').val();


    var flag = true;

    if(puestotext == '' || puestotext == null){
      console.log('Aqui');
      $('.validacion').css('opacity','1');
      flag = false;
    }else{
      $('.validacion').css('opacity','0');
      if(puestotext == puestopc1 ){
        $('.validacion2').css('opacity','1');
        flag = false;
      }else{
        $('.validacion2').css('opacity','0');
      }
      if(puestotext == puestopc2 ){
        $('.validacion3').css('opacity','1');
        flag = false;
      }else{
          $('.validacion3').css('opacity','0');
      }

      if(puestopc1 != '' && puestopc2 != ''){
        if(puestopc1 == puestopc2 ){
          $('.validacion3').css('opacity','1');
          flag = false;
        }else{
            $('.validacion3').css('opacity','0');
        }
      }


      if(flag == true){
        $('.validacion').css('opacity','0');
        $(".contenedor-datos").fadeOut(500,function(){
          $.ajax({
            url:'models/puestodeseado.php',
            type:'POST',
            data:{btncontinuar:botoncontinuar,opcion1:puestotext,opcion2:puestopc1,opcion3:puestopc2},
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
    }
  });
});

/*
function buscar() {
    var textoBusqueda = $('#puestoactual').val();

     if (textoBusqueda != "") {
        $.post("models/buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#listaTrabajos").html(mensaje);
         });
     }else{
        $("#listaTrabajos").html('<p>Puesto Laboral no Existente</p>');
        };
};
*/
/*
var app = new Vue({
  el: "#app",
  data: {
    all_data:[],
  },
  created: function(){
    //console.log("buscar.php");
    this.get_contacts();
  },
  methods:{
      get_contacts: function(){
          fetch('models/buscar.php').then(response=>response.json()).then(json=>{
            this.all_data=json.puestos}
          )
        }
      }
});
*/


var app = new Vue({
  el: "#app",
  data: {
    all_data:[],
  },
  created: function(){
    //console.log("buscar.php");
    this.get_contacts();
  },
  methods:{
      get_contacts: function(){
         axios.get('models/buscar.php').then(response=>{
      // JSON responses are automatically parsed.
      console.log(response.data.puestos);
      this.all_data = response.data.puestos;
      console.dir(this.all_data);
    });
      }
   },
})


</script>
