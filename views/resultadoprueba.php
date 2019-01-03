<?php

require_once 'models/general.class.php';
$resultado = new generalQuery();
//error_reporting(0);
//Jalo experiencias
$experiencias = $resultado->obtener_Experiencias();
$conocimientos = $resultado->obtenerConocimientos();
//print_r($experiencias);

  $arrayMaqueta = array();
  $numConocimientos = count($conocimientos);
  $contE = 0;

  $contadorRepetitivo = 0;
  for($i = 0 ; $i < 69; $i = $i + 1){
    $contC = 0;
    for($j = 0 ; $j < 180; $j = $j + 1){
      //echo $j.'.- '.$conocimientos[$j]['experiencia_nombre'];
      if($experiencias[$i]['experiencia_nombre'] == $conocimientos[$j]['experiencia_nombre']){
        $arrayMaqueta[$i]['experiencia'] = $experiencias[$i]['experiencia_nombre'];
        $arrayMaqueta[$i]['conocimientos'][$contC] = $conocimientos[$j]['conocimiento_nombre'];
        $contE++;
        $contC++;
        $contadorRepetitivo ++;
      }
    }
  }

  //print_r($arrayMaqueta);
  //echo $contadorRepetitivo;
  $countMaqueta = count($arrayMaqueta);
  //echo $countMaqueta;
  //print_r($arrayMaqueta[$m]['conocimientos']);


  $btnMostrar = 1;
  foreach($arrayMaqueta as $datos)
  {

    foreach($datos['conocimientos'] as $conos){
      $estructuraConocimiento .= '
      <tr class="ocultar'.$btnMostrar.' col-xs-12">
      <th class="estilocono">'.$conos.'</th>
      <th class="num-experiencia text-center">1</th>
      <th class="num-experiencia text-center">2</th>
      <th class="num-experiencia text-center">3</th>
      <th class="num-experiencia text-center">4</th>
      <th class="num-experiencia text-center">5</th>
      </tr>
      ';
    }

    $estructuraExperiencia .= '
    <tr class="col-xs-12">
    <th class="experiencia-estilo2 text-center">
    <button id="btn1" class="estilo-button" data-id="'.$btnMostrar.'">
       '.$datos['experiencia'].'
      </button>
    </th>
    <th class="num-experiencia text-center"> <span id="pos1" class="circulo-numred">2</span> </th>
    <th class="num-experiencia text-center"> <span id="pos2" class="circulo-numverde"> 1</span> </th>
    <th class="num-experiencia text-center"><span class="circulo-numazul"> 3</span></th>
    <th class="num-experiencia text-center"><span class="circulo-numred">2</span> <span class="circulo-numverde"> 1</span> <span class="circulo-numazul"> 3</span></th>
    <th class="num-experiencia text-center"></th>
    '.$estructuraConocimiento.'
    ';
    unset($estructuraConocimiento);
    $btnMostrar++;
  }


 /*
        $estructuraConocimiento = '
        <tr class="ocultar2 col-xs-12">
        <th class="estilocono">'.$arrayMaqueta[$m]['conocimientos'].'</th>
        <th class="num-experiencia text-center">1</th>
        <th class="num-experiencia text-center">2</th>
        <th class="num-experiencia text-center">3</th>
        <th class="num-experiencia text-center">4</th>
        <th class="num-experiencia text-center">5</th>
        </tr>
        ';*/


  //echo $estructuraConocimiento;
  //Array de Ejemplo
  $arrayMaqueta2 = array(
        "0" => array(
          "experiencia" =>"Administrar y manejar",
          "conocimientos" => array(
            "0"=>"Conocimiento 1",
            "1"=>"Conocimiento 2",
            "2"=>"Conocimiento 3"
          ),
        ),
        "1" => array(
          "experiencia" =>"Administrar y manejar2",
          "conocimientos" => array(
            "0"=>"Conocimiento 1",
            "1"=>"Conocimiento 2",
            "2"=>"Conocimiento 3"
          ),
        )
  );

 //print_r($arrayMaqueta2);


?>


<div class="fondotransparente">

</div>
<div id="fondo" class="container c-cambio np">
 <div class="col-xs-12 col-sm-offset-0 col-sm-12 col-md-offset-0 col-md-12 col-lg-offset-1 col-lg-10">
   <div class="col-xs-12 col-sm-4 col-md-4 col-lg-5 np pos-logo text-center">
     <img class="logorombocambio" src="app/img/logoprueba.png" alt="logo ArcaContinental">
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 np pos-logomap">
     <img class="img-responsive img-tamano" src="app/img/mapaLogo.png" alt="logo ArcaContinental">
   </div>
 </div>
<div class="col-xs-12 np contenedor-datos">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-7 text-center espacio-cambio np">
  <div class="col-xs-12 text-center">
  <img class="" src="app/img/artefinal.png" alt="">
  <div class="table-responsive col-xs-12 estilo-table np">
      <table class="table col-xs-12 np">
        <thead class="col-xs-12">
          <div class="col-xs-12 np table-head">
            <div class="col-xs-2 text-center text-leyenda">
              LEYENDA:
            </div>
            <div class="col-xs-7">
              <div class="col-xs-4 np">
                <button class="btnresultado-estilo" type="button" name="button">PUESTO ACTUAL</button>
              </div>
              <div class="col-xs-4 np">
                <button class="btnresultado-estilo2" type="button" name="button">
                  PUESTO DESEADO <br>
                  <span class="text-opcs">(CORTO PLAZO)</span>
                </button>
              </div>
              <div class="col-xs-4 np">
                <button class="btnresultado-estilo3" type="button" name="button">
                  PUESTO DESEADO <br>
                  <span class="text-opcs">(LARGO PLAZO)</span>
                </button>
              </div>
            </div>
            <div class="col-xs-offset-1 col-xs-2 ">
              <button class="btnresultado-estilo4 text-left" type="button" name="button">
                GUARDAR <br> COMPARACIÓN
              </button>
            </div>
          </div>
        </thead>
        <tbody class="col-xs-12">
          <tr class="col-xs-12">
            <th class="espacio-th text-center">Nivel / <br> Experiencia <br> </th>
            <th class="espacio-th text-center">No Aplica</th>
            <th class="espacio-th text-center">Principiante</th>
            <th class="espacio-th text-center">En Aprendizaje</th>
            <th class="espacio-th text-center">Competente</th>
            <th class="espacio-th text-center">Experto</th>
          </tr>
          <!--tr class="col-xs-12">
            <th class="experiencia-estilo1 text-center">
              <button id="btn1" class="estilo-button" data-id="1">
                Experiencia 1
              </button>
            </th>
            <th class="num-experiencia text-center"> <span id="pos1" class="circulo-numred">2</span> </th>
            <th class="num-experiencia text-center"> <span id="pos2" class="circulo-numverde"> 1</span> </th>
            <th class="num-experiencia text-center"><span class="circulo-numazul"> 3</span></th>
            <th class="num-experiencia text-center"><span class="circulo-numred">2</span> <span class="circulo-numverde"> 1</span> <span class="circulo-numazul"> 3</span></th>
            <th class="num-experiencia text-center"></th>
            <tr class="ocultar1 col-xs-12">
              <th class="estilocono">Conocimiento</th>
              <th class="num-experiencia text-center">1</th>
              <th class="num-experiencia text-center">2</th>
              <th class="num-experiencia text-center">3</th>
              <th class="num-experiencia text-center">4</th>
              <th class="num-experiencia text-center">5</th>
            </tr>
          </tr-->


            <?= $estructuraExperiencia; ?>


        </tbody>
      </table>
  </div>
  </div>
  </div>
</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
  $('.ocultar1').css('display','none');
  $('.ocultar2').css('display','none');
  $('.ocultar3').css('display','none');
  $('.ocultar4').css('display','none');
  $('.ocultar5').css('display','none');
  $('.ocultar6').css('display','none');
  $('.ocultar7').css('display','none');
  $('.ocultar8').css('display','none');
  $('.ocultar9').css('display','none');
  $('.ocultar10').css('display','none');
  $('.ocultar11').css('display','none');
  $('.ocultar12').css('display','none');
  $('.ocultar13').css('display','none');
  $('.ocultar14').css('display','none');
  $('.ocultar15').css('display','none');
  $('.ocultar16').css('display','none');
  $('.ocultar17').css('display','none');
  $('.ocultar18').css('display','none');
  $('.ocultar19').css('display','none');
  $('.ocultar20').css('display','none');
  $('.ocultar21').css('display','none');
  $('.ocultar22').css('display','none');
  $('.ocultar23').css('display','none');
  $('.ocultar24').css('display','none');

  $('.ocultar25').css('display','none');
  $('.ocultar26').css('display','none');
  $('.ocultar27').css('display','none');
  $('.ocultar28').css('display','none');
  $('.ocultar29').css('display','none');
  $('.ocultar30').css('display','none');
  $('.ocultar31').css('display','none');
  $('.ocultar32').css('display','none');

  $('.ocultar33').css('display','none');
  $('.ocultar34').css('display','none');
  $('.ocultar35').css('display','none');
  $('.ocultar36').css('display','none');
  $('.ocultar37').css('display','none');
  $('.ocultar38').css('display','none');
  $('.ocultar39').css('display','none');
  $('.ocultar40').css('display','none');

  $('.ocultar41').css('display','none');
  $('.ocultar42').css('display','none');
  $('.ocultar43').css('display','none');
  $('.ocultar44').css('display','none');
  $('.ocultar45').css('display','none');
  $('.ocultar46').css('display','none');
  $('.ocultar47').css('display','none');
  $('.ocultar48').css('display','none');

  $('.ocultar49').css('display','none');
  $('.ocultar50').css('display','none');
  $('.ocultar51').css('display','none');
  $('.ocultar52').css('display','none');
  $('.ocultar53').css('display','none');
  $('.ocultar54').css('display','none');
  $('.ocultar55').css('display','none');
  $('.ocultar56').css('display','none');

  $('.ocultar57').css('display','none');
  $('.ocultar58').css('display','none');
  $('.ocultar59').css('display','none');
  $('.ocultar60').css('display','none');
  $('.ocultar61').css('display','none');
  $('.ocultar62').css('display','none');
  $('.ocultar63').css('display','none');
  $('.ocultar64').css('display','none');

  $('.ocultar65').css('display','none');
  $('.ocultar66').css('display','none');
  $('.ocultar67').css('display','none');
  $('.ocultar68').css('display','none');
  $('.ocultar69').css('display','none');




});
$(".estilo-button").click(function () {
  var id = $(this).data('id');
  alert(id);
		$('.ocultar'+id).toggle();
});


</script>
