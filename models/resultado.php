
<?php
//error_reporting(0);
require_once 'general.class.php';
$resultado = new generalQuery();

$btnbuscar ='';
$opcion1 = '';
$opcion2 = '';
$opcion3 = '';
$cortoplazo = '';
$largoplazo = '';
$btnbuscar = $_POST['btnbuscar'];
$arrayPromedio1 = array();
$arrayPromedioConocimiento1 = array();
$arrayPromedio2 = array();
$arrayPromedioConocimiento2 = array();
$arrayPromedio3 = array();
$arrayPromedioConocimiento3 = array();
$arrayCortoPlazo = array();
$arrayCortoConocimiento = array();
$arrayLargoPlazo = array();
$arrayLargoConocimiento = array();
$promedioVacio2 = '';
$promedioVacio3 = '';

if($btnbuscar != null && $btnbuscar != ''){
  $opcion1 = $_POST['opcion1'];
  $opcion2 = $_POST['opcion2'];
  $opcion3 = $_POST['opcion3'];
  $cortoplazo = $_POST['cortoplazo'];
  $largoplazo = $_POST['largoplazo'];

  if($opcion1 != '' && $opcion1 != null){
    $arrayOpcion1 = explode("_",$opcion1);
    //print_r($arrayOpcion1);
    $funcion1Limpio = $arrayOpcion1[0];
    $area1Limpio = $arrayOpcion1[1];
    //echo $funcion1Limpio;
    //echo $area1Limpio;
    $idOpcion1 = $resultado->obtener_IDfuncion($funcion1Limpio,$area1Limpio);
    //print_r($idOpcion1);
    $idOpcionLimpio1 = $idOpcion1[0]['id'];
    //echo $idOpcionLimpio;
    $promedio1 = $resultado->obtener_Promedios($idOpcionLimpio1);
    $promedioconocimientos1 = $resultado->obtenerConocimientospuntaje($idOpcionLimpio1);
    //print_r($promedio1);

    $numPromedio1 = count($promedio1);
    for($i = 0; $i < $numPromedio1; $i= $i+1){
        array_push($arrayPromedio1,$promedio1[$i]['promedio_experiencia']);
    }

    //print_r($promedioconocimientos1);
    $numPromedioConocimiento1 = count($promedioconocimientos1);
    //echo $numPromedioConocimiento1;
    for($c = 0; $c < $numPromedioConocimiento1; $c= $c+1){
        array_push($arrayPromedioConocimiento1,$promedioconocimientos1[$c]['puntaje']);
    }

  }

  if($opcion2 != '' && $opcion2 != null){
    $arrayOpcion2 = explode("_",$opcion2);
    //print_r($arrayOpcion2);
    $funcion2Limpio = $arrayOpcion2[0];
    $area2Limpio = $arrayOpcion2[1];
    //echo $funcion2Limpio;
    //echo $area1Limpio;
    $idOpcion2 = $resultado->obtener_IDfuncion($funcion2Limpio,$area2Limpio);
    //print_r($idOpcion1);
    $idOpcionLimpio2 = $idOpcion2[0]['id'];
    //echo $idOpcionLimpio;
    $promedio2 = $resultado->obtener_Promedios($idOpcionLimpio2);
    $promedioconocimientos2 = $resultado->obtenerConocimientospuntaje($idOpcionLimpio2);
    //print_r($promedio2);

    $numPromedio2 = count($promedio2);
    for($j = 0; $j < $numPromedio2; $j= $j+1){
        array_push($arrayPromedio2,$promedio2[$j]['promedio_experiencia']);
    }

    $numPromedioConocimiento2 = count($promedioconocimientos2);
    for($o = 0; $o < $numPromedioConocimiento2; $o= $o+1){
        array_push($arrayPromedioConocimiento2,$promedioconocimientos2[$o]['puntaje']);
    }
  }else{
    $promedioVacio2 = 0;
  }

  if($opcion3 != '' && $opcion3 != null){
    $arrayOpcion3 = explode("_",$opcion3);
    //print_r($arrayOpcion3);
    $funcion3Limpio = $arrayOpcion3[0];
    $area3Limpio = $arrayOpcion3[1];
    //echo $funcion2Limpio;
    //echo $area1Limpio;
    $idOpcion3 = $resultado->obtener_IDfuncion($funcion3Limpio,$area3Limpio);
    //print_r($idOpcion1);
    $idOpcionLimpio3 = $idOpcion3[0]['id'];
    //echo $idOpcionLimpio;
    $promedio3 = $resultado->obtener_Promedios($idOpcionLimpio3);
    $promedioconocimientos3 = $resultado->obtenerConocimientospuntaje($idOpcionLimpio3);
    //print_r($promedio3);
    $numPromedio3 = count($promedio3);
    for($k = 0; $k < $numPromedio3; $k= $k+1){
        array_push($arrayPromedio3,$promedio3[$k]['promedio_experiencia']);
    }

    $numPromedioConocimiento3 = count($promedioconocimientos3);
    for($x = 0; $x < $numPromedioConocimiento3; $x= $x+1){
        array_push($arrayPromedioConocimiento3,$promedioconocimientos3[$x]['puntaje']);
    }

  }else{
    $promedioVacio3 = 0;
  }

  if($cortoplazo != '' && $cortoplazo != null){

    $arrayCorto = explode("_",$cortoplazo);
    //print_r($arrayOpcion3);
    $funcionCortoLimpio = $arrayCorto[0];
    $areaCortoLimpio = $arrayCorto[1];
    //echo $funcion2Limpio;
    //echo $area1Limpio;
    $idCorto= $resultado->obtener_IDfuncion($funcionCortoLimpio,$areaCortoLimpio);
    //print_r($idOpcion1);
    $idCortoLimpio = $idCorto[0]['id'];
    //echo $idOpcionLimpio;
    $promedioCorto = $resultado->obtener_Promedios($idCortoLimpio);
    $promedioCortoconocimientos = $resultado->obtenerConocimientospuntaje($idCortoLimpio);

    //print_r($promedioCorto);
    $numPromedioCorto = count($promedioCorto);
    for($m = 0; $m < $numPromedioCorto; $m= $m+1){
        array_push($arrayCortoPlazo,$promedioCorto[$m]['promedio_experiencia']);
    }

    $numCortoConocimientos = count($promedioCortoconocimientos);
    for($t = 0; $t < $numCortoConocimientos; $t= $t+1){
        array_push($arrayCortoConocimiento,$promedioCortoconocimientos[$t]['puntaje']+1);
    }
  }

  if($largoplazo != '' && $largoplazo != null){

    $arrayLargo = explode("_",$largoplazo);
    //print_r($arrayOpcion3);
    $funcionLargoLimpio = $arrayLargo[0];
    $areaLargoLimpio = $arrayLargo[1];
    //echo $funcion2Limpio;
    //echo $area1Limpio;
    $idLargo = $resultado->obtener_IDfuncion($funcionLargoLimpio,$areaLargoLimpio);
    //print_r($idOpcion1);
    $idLargoLimpio = $idLargo[0]['id'];
    //echo $idOpcionLimpio;
    $promedioLargo = $resultado->obtener_Promedios($idLargoLimpio);
    $promedioLargoconocimientos = $resultado->obtenerConocimientospuntaje($idLargoLimpio);
    //print_r($promedioLargo);
    $numPromedioLargo = count($promedioLargo);
    for($n = 0; $n < $numPromedioLargo; $n= $n+1){
        array_push($arrayLargoPlazo,$promedioLargo[$n]['promedio_experiencia']);
    }

    $numLargoConocimiento = count($promedioLargoconocimientos);
    for($v = 0; $v < $numLargoConocimiento; $v= $v+1){
        array_push($arrayLargoConocimiento,$promedioLargoconocimientos[$v]['puntaje']+1);
    }
  }



$arrayPromedioFinal = array();
$arrayConocimientosFinal = array();
  //Arrays con los promedios
  if($promedioVacio2 == 0 && $promedioVacio3 == 0){
    $arrayPromedioFinal = $arrayPromedio1;

      //print_r($arrayPromedioFinal);
      for($b = 0; $b <180 ; $b = $b +1){
        array_push($arrayConocimientosFinal,$arrayPromedioConocimiento1[$b]+1);
      }
  }

  if($promedioVacio2 != 0 && $promedioVacio3 == 0 ){
      for($l = 0; $l < 69 ;$l = $l + 1){
        if($promedio1[$l] < $promedio2[$l]){
            array_push($arrayPromedioFinal,$promedio2[$l]);
        }else{
          array_push($arrayPromedioFinal,$promedio1[$l]);
        }
      }

      for($y = 0; $y <180 ; $y = $y +1){
        if($arrayPromedioConocimiento1[$y] < $arrayPromedioConocimiento2[$y]){
          array_push($arrayConocimientosFinal,$arrayPromedioConocimiento2[$y]);
        }else{
          array_push($arrayConocimientosFinal,$arrayPromedioConocimiento1[$y]+1);
        }
      }
  }

  if($promedioVacio2 == 0 && $promedioVacio3 != 0 ){
      for($h = 0; $h < 69 ;$h = $h + 1){
        if($promedio1[$h] < $promedio3[$h]){
            array_push($arrayPromedioFinal,$promedio3[$h]);
        }else{
          array_push($arrayPromedioFinal,$promedio1[$h]);
        }
      }

      for($y = 0; $y <180 ; $y = $y +1){
        if($arrayPromedioConocimiento1[$y] < $arrayPromedioConocimiento3[$y]){

          array_push($arrayConocimientosFinal,$arrayPromedioConocimiento3[$y]);
        }else{
          array_push($arrayConocimientosFinal,$arrayPromedioConocimiento1[$y]+1);
        }
      }
  }

//Array que se puede obtener de Promedio 2 y Promedio 3
  $promedioAlternativo = array();
  $promedioAlternativoConocimiento = array();

  if($promedioVacio2 != 0 && $promedioVacio3 != 0 ){
    for($g = 0; $g < 69 ;$g = $g + 1){
      if($promedio2[$g] < $promedio3[$g]){
          array_push($promedioAlternativo,$promedio3[$g]);
      }else{
        array_push($promedioAlternativo,$promedio2[$g]);
      }
    }
    for($f = 0; $f < 69 ;$f = $f + 1){
      if($promedio1[$f] < $promedioAlternativo[$f]){
          array_push($arrayPromedioFinal,$promedioAlternativo[$f]);
      }else{
        array_push($arrayPromedioFinal,$promedio1[$f]);
      }
    }

    for($d = 0; $d < 182 ;$d = $d + 1){
      if($arrayPromedioConocimiento2[$d] < $arrayPromedioConocimiento3[$d]){
          array_push($promedioAlternativoConocimiento,$arrayPromedioConocimiento3[$d]);
      }else{
        array_push($promedioAlternativoConocimiento,$arrayPromedioConocimiento2[$d]);
      }
    }

    for($e = 0; $e < 182 ;$e = $e + 1){
      if($arrayPromedioConocimiento1[$e] < $promedioAlternativoConocimiento[$e]){
          array_push($arrayConocimientosFinal,$arrayPromedioConocimiento3[$e]+1);
      }else{
        array_push($arrayConocimientosFinal,$arrayPromedioConocimiento1[$e]+1);
      }
    }
  }



//Sumando 1 para la muestra final de datos.
    for($s = 0 ; $s < 69;$s = $s+1){
      $arrayPromedioFinal[$s] = $arrayPromedioFinal[$s] + 1;
      $arrayCortoPlazo[$s] = $arrayCortoPlazo[$s] + 1;
      $arrayLargoPlazo[$s] = $arrayLargoPlazo[$s] + 1;
    }
    //Jalo experiencias
    $experiencias = $resultado->obtener_Experiencias();
    //Jalo conocimientos
    $conocimientos = $resultado->obtenerConocimientos();


  $arrayMaqueta = array();
  $numConocimientos = count($conocimientos);
  $contE = 0;

  $contadorRepetitivo = 0;
  for($i = 0 ; $i < 69; $i = $i + 1){
    $contC = 0;
    for($j = 0 ; $j < 180; $j = $j + 1){

      if($experiencias[$i]['experiencia_nombre'] == $conocimientos[$j]['experiencia_nombre']){
        $arrayMaqueta[$i]['experiencia'] = $experiencias[$i]['experiencia_nombre'];
        $arrayMaqueta[$i]['conocimientos'][$contC] = $conocimientos[$j]['conocimiento_nombre'];
        $contE++;
        $contC++;
        $contadorRepetitivo ++;
      }
    }
  }

  //Numero total de conocimientos
  $countMaqueta = count($arrayMaqueta);


  //Puntaje de las experiencias
  $lineasExperiencias = array();
  $lineasConocimientos = array();

//rojo - Puesto ACTUAL <span class="circulo-numred"> </span>
//Verde - Puesto deseado Corto PLAZO <span class="circulo-numverde">  </span>
//Azul - Puesto deseado Largo PLAZO <span class="circulo-numazul">  </span

  for($a = 0 ; $a < 69 ; $a = $a +1){

    //Rojos
    if($arrayPromedioFinal[$a] == 1){
      $rojo1 = '<span id="experiencia'.$a.'rojo" class="circulo-numred"> '.$arrayPromedioFinal[$a].' </span>';
    }else{
      $rojo1 = ' ';
    }
    if($arrayPromedioFinal[$a] == 2){
      $rojo2 = '<span id="experiencia'.$a.'rojo" class="circulo-numred"> '.$arrayPromedioFinal[$a].' </span>';
    }else{
      $rojo2 = ' ';
    }
    if($arrayPromedioFinal[$a] == 3){
      $rojo3 = '<span id="experiencia'.$a.'rojo" class="circulo-numred"> '.$arrayPromedioFinal[$a].' </span>';
    }else{
      $rojo3 = ' ';
    }
    if($arrayPromedioFinal[$a] == 4){
      $rojo4 = '<span id="experiencia'.$a.'rojo" class="circulo-numred"> '.$arrayPromedioFinal[$a].' </span>';
    }else{
      $rojo4 = ' ';
    }
    if($arrayPromedioFinal[$a] == 5){
      $rojo5 = '<span id="experiencia'.$a.'rojo" class="circulo-numred"> '.$arrayPromedioFinal[$a].' </span>';
    }else{
      $rojo5 = ' ';
    }

    //Verdes

    if($arrayCortoPlazo[$a] == 1){
      $verde1 = '<span id="experiencia'.$a.'verde" class="circulo-numverde"> '.$arrayCortoPlazo[$a].' </span>';
    }else{
      $verde1 = ' ';
    }
    if($arrayCortoPlazo[$a] == 2){
      $verde2 = '<span id="experiencia'.$a.'verde" class="circulo-numverde"> '.$arrayCortoPlazo[$a].' </span>';
    }else{
      $verde2 = ' ';
    }
    if($arrayCortoPlazo[$a] == 3){
      $verde3 = '<span id="experiencia'.$a.'verde" class="circulo-numverde"> '.$arrayCortoPlazo[$a].' </span>';
    }else{
      $verde3 = ' ';
    }
    if($arrayCortoPlazo[$a] == 4){
      $verde4 = '<span id="experiencia'.$a.'verde" class="circulo-numverde"> '.$arrayCortoPlazo[$a].' </span>';
    }else{
      $verde4 = ' ';
    }
    if($arrayCortoPlazo[$a] == 5){
      $verde5 = '<span id="experiencia'.$a.'verde" class="circulo-numverde"> '.$arrayCortoPlazo[$a].' </span>';
    }else{
      $verde5 = ' ';
    }

    //Azules

    if($arrayLargoPlazo[$a] == 1){
      $azul1 = '<span id="experiencia'.$a.'azul" class="circulo-numazul"> '.$arrayLargoPlazo[$a].' </span>';
    }else{
      $azul1 = ' ';
    }
    if($arrayLargoPlazo[$a] == 2){
      $azul2 = '<span <span id="experiencia'.$a.'azul" class="circulo-numazul"> '.$arrayLargoPlazo[$a].' </span>';
    }else{
      $azul2 = ' ';
    }
    if($arrayLargoPlazo[$a] == 3){
      $azul3 = '<span <span id="experiencia'.$a.'azul" class="circulo-numazul"> '.$arrayLargoPlazo[$a].' </span>';
    }else{
      $azul3 = ' ';
    }
    if($arrayLargoPlazo[$a] == 4){
      $azul4 = '<span <span id="experiencia'.$a.'azul" class="circulo-numazul"> '.$arrayLargoPlazo[$a].' </span>';
    }else{
      $azul4 = ' ';
    }
    if($arrayLargoPlazo[$a] == 5){
      $azul5 = '<span <span id="experiencia'.$a.'azul" class="circulo-numazul"> '.$arrayLargoPlazo[$a].' </span>';
    }else{
      $azul5 = ' ';
    }

    $lineas = '
      <th class="num-experiencia text-center"> '.$rojo1.' '.$verde1.' '.$azul1.' </th>
      <th class="num-experiencia text-center"> '.$rojo2.' '.$verde2.' '.$azul2.' </th>
      <th class="num-experiencia text-center"> '.$rojo3.' '.$verde3.' '.$azul3.' </th>
      <th class="num-experiencia text-center"> '.$rojo4.' '.$verde4.' '.$azul4.' </th>
      <th class="num-experiencia text-center"> '.$rojo5.' '.$verde5.' '.$azul5.' </th>
    ';
    array_push($lineasExperiencias,$lineas);
  }

  for($h = 0; $h < 182; $h = $h + 1){

       //Rojos
       if($arrayConocimientosFinal[$h] == 1){
        $rojoConocimiento1 = '<span  id="conocimiento'.$h.'rojo" class="circulo-numrede"> '.$arrayConocimientosFinal[$h].' </span>';
      }else{
        $rojoConocimiento1 = ' ';
      }
      if($arrayConocimientosFinal[$h] == 2){
        $rojoConocimiento2 = '<span id="conocimiento'.$h.'rojo" class="circulo-numrede"> '.$arrayConocimientosFinal[$h].' </span>';
      }else{
        $rojoConocimiento2 = ' ';
      }
      if($arrayConocimientosFinal[$h] == 3){
        $rojoConocimiento3 = '<span id="conocimiento'.$h.'rojo" class="circulo-numrede"> '.$arrayConocimientosFinal[$h].' </span>';
      }else{
        $rojoConocimiento3 = ' ';
      }
      if($arrayConocimientosFinal[$h] == 4){
        $rojoConocimiento4 = '<span id="conocimiento'.$h.'rojo" class="circulo-numrede"> '.$arrayConocimientosFinal[$h].' </span>';
      }else{
        $rojoConocimiento4 = ' ';
      }
      if($arrayConocimientosFinal[$h] == 5){
        $rojoConocimiento5 = '<span id="conocimiento'.$h.'rojo" class="circulo-numrede"> '.$arrayConocimientosFinal[$h].' </span>';
      }else{
        $rojoConocimiento5 = ' ';
      }


      //Verdes

      if($arrayCortoConocimiento[$h] == 1){
        $verdeConocimiento1 = '<span id="conocimiento'.$h.'verde" class="circulo-numverdee"> '.$arrayCortoConocimiento[$h].' </span>';
      }else{
        $verdeConocimiento1 = ' ';
      }
      if($arrayCortoConocimiento[$h] == 2){
        $verdeConocimiento2 = '<span id="conocimiento'.$h.'verde" class="circulo-numverdee"> '.$arrayCortoConocimiento[$h].' </span>';
      }else{
        $verdeConocimiento2 = ' ';
      }
      if($arrayCortoConocimiento[$h] == 3){
        $verdeConocimiento3 = '<span id="conocimiento'.$h.'verde" class="circulo-numverdee"> '.$arrayCortoConocimiento[$h].' </span>';
      }else{
        $verdeConocimiento3 = ' ';
      }
      if($arrayCortoConocimiento[$h] == 4){
        $verdeConocimiento4 = '<span id="conocimiento'.$h.'verde" class="circulo-numverdee"> '.$arrayCortoConocimiento[$h].' </span>';
      }else{
        $verdeConocimiento4 = ' ';
      }
      if($arrayCortoConocimiento[$h] == 5){
        $verdeConocimiento5 = '<span id="conocimiento'.$h.'verde" class="circulo-numverdee"> '.$arrayCortoConocimiento[$h].' </span>';
      }else{
        $verdeConocimiento5 = ' ';
      }

      //Azules

      if($arrayLargoConocimiento[$h] == 1){
        $azulConocimiento1 = '<span id="conocimiento'.$h.'azul" class="circulo-numazule"> '.$arrayLargoConocimiento[$h].' </span>';
      }else{
        $azulConocimiento1 = ' ';
      }
      if($arrayLargoConocimiento[$h] == 2){
        $azulConocimiento2 = '<span id="conocimiento'.$h.'azul" class="circulo-numazule"> '.$arrayLargoConocimiento[$h].' </span>';
      }else{
        $azulConocimiento2 = ' ';
      }
      if($arrayLargoConocimiento[$h] == 3){
        $azulConocimiento3 = '<span id="conocimiento'.$h.'azul" class="circulo-numazule"> '.$arrayLargoConocimiento[$h].' </span>';
      }else{
        $azulConocimiento3 = ' ';
      }
      if($arrayLargoConocimiento[$h] == 4){
        $azulConocimiento4 = '<span id="conocimiento'.$h.'azul" class="circulo-numazule"> '.$arrayLargoConocimiento[$h].' </span>';
      }else{
        $azulConocimiento4 = ' ';
      }
      if($arrayLargoConocimiento[$h] == 5){
        $azulConocimiento5 = '<span id="conocimiento'.$h.'azul" class="circulo-numazule"> '.$arrayLargoConocimiento[$h].' </span>';
      }else{
        $azulConocimiento5 = ' ';
      }

      $lineasConocimiento = '
      <th class="num-experiencia text-center"> '.$rojoConocimiento1.' '.$verdeConocimiento1.' '.$azulConocimiento1.' </th>
      <th class="num-experiencia text-center"> '.$rojoConocimiento2.' '.$verdeConocimiento2.' '.$azulConocimiento2.' </th>
      <th class="num-experiencia text-center"> '.$rojoConocimiento3.' '.$verdeConocimiento3.' '.$azulConocimiento3.' </th>
      <th class="num-experiencia text-center"> '.$rojoConocimiento4.' '.$verdeConocimiento4.' '.$azulConocimiento4.' </th>
      <th class="num-experiencia text-center"> '.$rojoConocimiento5.' '.$verdeConocimiento5.' '.$azulConocimiento5.' </th>
    ';
    array_push($lineasConocimientos,$lineasConocimiento);
  }



  $conocimientos = $resultado->obtenerConocimientos();
//print_r($experiencias);

  $arrayMaqueta = array();
  $numConocimientos = count($conocimientos);
  $contE = 0;

  $contadorRepetitivo = 0;
  for($i = 0 ; $i < 69; $i = $i + 1){
    $contC = 0;
    for($j = 0 ; $j < 182; $j = $j + 1){
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

  $mostrarLineas = 0;
  $mostrarLineasExperiencia =0;
  foreach($arrayMaqueta as $datos)
  {

    foreach($datos['conocimientos'] as $conos){
      $estructuraConocimiento .= '
      <tr class="ocultar'.$btnMostrar.' col-xs-12">
      <th class="estilocono">'.$conos.'</th>
      '.$lineasConocimientos[$mostrarLineasExperiencia].'
      </tr>
      ';
      $mostrarLineasExperiencia++;
    }


    $estructuraExperiencia .= '
    <tr class="col-xs-12">
    <th class="experiencia-estilo2 text-center">
    <button id="btn1" class="estilo-button" data-id="'.$btnMostrar.'">
       '.$datos['experiencia'].'
      </button>
    </th>
    '.$lineasExperiencias[$mostrarLineas].'
    '.$estructuraConocimiento.'
    ';
    unset($estructuraConocimiento);
    $btnMostrar++;
    $mostrarLineas++;
  }

}
?>



<div class="col-xs-12 text-center">

<input type="hidden" name="opcion1" value="<?= $opcion1; ?>">
<input type="hidden" name="opcion2" value="<?= $opcion2; ?>">
<input type="hidden" name="opcion3" value="<?= $opcion3; ?>">
<input type="hidden" name="cortoplazo" value="<?= $cortoplazo; ?>">
<input type="hidden" name="largoplazo" value="<?= $largoplazo; ?>">
</div>

  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-7 text-center espacio-cambio np">
  <div class="col-xs-12 text-center">
  <div class="col-xs-12 estilo-table table-responsive np">
      <table class="table col-xs-12 np">
        <thead class="col-xs-12">
          <div class="col-xs-12 np table-head">
            <div class="col-xs-3 text-center text-leyenda">
              LEYENDA:
            </div>
            <div class="col-xs-9">
              <div class="col-xs-4 ">
                <button class="btnresultado-estilo" type="button" name="button">PUESTO ACTUAL</button>
              </div>
              <div class="col-xs-4 np">
                <button class="btnresultado-estilo2" type="button" name="button">
                  PUESTO DESEADO <br>
                  <span class="text-opcs">(CORTO PLAZO)</span>
                </button>
              </div>
              <div class="col-xs-4 ">
                <button class="btnresultado-estilo3" type="button" name="button">
                  PUESTO DESEADO <br>
                  <span class="text-opcs">(LARGO PLAZO)</span>
                </button>
              </div>
            </div>
            <!--div class="col-xs-offset-1 col-xs-2 ">
              <button class="btnresultado-estilo4 text-left" type="button" name="button">
                GUARDAR <br> COMPARACIÓN
              </button>
            </div-->
          </div>
        </thead>
        <tbody class="col-xs-12">
          <tr class="col-xs-12">
            <th class="espacio-th text-center">
              <button type="button" class="estiloCabecerabtn" name="button">
                Nivel / Experiencia
              </button>
            </th>
            <th class="num-Cabecera text-center">
              <button type="button" class="estiloCabecerabtn2" name="button">
                No Aplica
              </button>
            </th>
            <th class="num-Cabecera text-center">
              <button type="button" class="estiloCabecerabtn2" name="button">
              Principiante
            </button></th>
            <th class="num-Cabecera text-center"><button type="button" class="estiloCabecerabtn2" name="button">
              En Aprendizaje
            </button></th>
            <th class="num-Cabecera text-center"><button type="button" class="estiloCabecerabtn2" name="button">
              Competente
            </button></th>
            <th class="num-Cabecera text-center"><button type="button" class="estiloCabecerabtn2" name="button">
              Experto
            </button></th>
          </tr>
          <?= $estructuraExperiencia; ?>

        </tbody>
      </table>
  </div>
  </div>

  </div>





  <script type="text/javascript">

$(function(){
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

 $(function() {

//Experiencias Rojo
$('#experiencia0rojo').connections({to:'#experiencia1rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia1rojo').connections({to:'#experiencia2rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia2rojo').connections({to:'#experiencia3rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia3rojo').connections({to:'#experiencia4rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia4rojo').connections({to:'#experiencia5rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia5rojo').connections({to:'#experiencia6rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia6rojo').connections({to:'#experiencia7rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia7rojo').connections({to:'#experiencia8rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia8rojo').connections({to:'#experiencia9rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia9rojo').connections({to:'#experiencia10rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia10rojo').connections({to:'#experiencia11rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia11rojo').connections({to:'#experiencia12rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia12rojo').connections({to:'#experiencia13rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia13rojo').connections({to:'#experiencia14rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia14rojo').connections({to:'#experiencia15rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia15rojo').connections({to:'#experiencia16rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia16rojo').connections({to:'#experiencia17rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia17rojo').connections({to:'#experiencia18rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia18rojo').connections({to:'#experiencia19rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia19rojo').connections({to:'#experiencia20rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia20rojo').connections({to:'#experiencia21rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia21rojo').connections({to:'#experiencia22rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia22rojo').connections({to:'#experiencia23rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia23rojo').connections({to:'#experiencia24rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia24rojo').connections({to:'#experiencia25rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia25rojo').connections({to:'#experiencia26rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia26rojo').connections({to:'#experiencia27rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia27rojo').connections({to:'#experiencia28rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia28rojo').connections({to:'#experiencia29rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia29rojo').connections({to:'#experiencia30rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia30rojo').connections({to:'#experiencia31rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia31rojo').connections({to:'#experiencia32rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia32rojo').connections({to:'#experiencia33rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia33rojo').connections({to:'#experiencia34rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia34rojo').connections({to:'#experiencia35rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia35rojo').connections({to:'#experiencia36rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia36rojo').connections({to:'#experiencia37rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia37rojo').connections({to:'#experiencia38rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia38rojo').connections({to:'#experiencia39rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia39rojo').connections({to:'#experiencia40rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia40rojo').connections({to:'#experiencia41rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia41rojo').connections({to:'#experiencia42rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia42rojo').connections({to:'#experiencia43rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia43rojo').connections({to:'#experiencia44rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia44rojo').connections({to:'#experiencia45rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia45rojo').connections({to:'#experiencia46rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia46rojo').connections({to:'#experiencia47rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia47rojo').connections({to:'#experiencia48rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia48rojo').connections({to:'#experiencia49rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia49rojo').connections({to:'#experiencia50rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia50rojo').connections({to:'#experiencia51rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia51rojo').connections({to:'#experiencia52rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia52rojo').connections({to:'#experiencia53rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia53rojo').connections({to:'#experiencia54rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia54rojo').connections({to:'#experiencia55rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia55rojo').connections({to:'#experiencia56rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia56rojo').connections({to:'#experiencia57rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia57rojo').connections({to:'#experiencia58rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia58rojo').connections({to:'#experiencia59rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia59rojo').connections({to:'#experiencia60rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia60rojo').connections({to:'#experiencia61rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia61rojo').connections({to:'#experiencia62rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia62rojo').connections({to:'#experiencia63rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia63rojo').connections({to:'#experiencia64rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia64rojo').connections({to:'#experiencia65rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia65rojo').connections({to:'#experiencia66rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia66rojo').connections({to:'#experiencia67rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});
$('#experiencia67rojo').connections({to:'#experiencia68rojo','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#d22136'}});

//Experiencias Verde
$('#experiencia0verde').connections({to:'#experiencia1verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia1verde').connections({to:'#experiencia2verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia2verde').connections({to:'#experiencia3verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia3verde').connections({to:'#experiencia4verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia4verde').connections({to:'#experiencia5verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia5verde').connections({to:'#experiencia6verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia6verde').connections({to:'#experiencia7verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia7verde').connections({to:'#experiencia8verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia8verde').connections({to:'#experiencia9verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia9verde').connections({to:'#experiencia10verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia10verde').connections({to:'#experiencia11verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia11verde').connections({to:'#experiencia12verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia12verde').connections({to:'#experiencia13verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia13verde').connections({to:'#experiencia14verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia14verde').connections({to:'#experiencia15verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia15verde').connections({to:'#experiencia16verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia16verde').connections({to:'#experiencia17verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia17verde').connections({to:'#experiencia18verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia18verde').connections({to:'#experiencia19verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia19verde').connections({to:'#experiencia20verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia20verde').connections({to:'#experiencia21verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia21verde').connections({to:'#experiencia22verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia22verde').connections({to:'#experiencia23verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia23verde').connections({to:'#experiencia24verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia24verde').connections({to:'#experiencia25verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia25verde').connections({to:'#experiencia26verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia26verde').connections({to:'#experiencia27verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia27verde').connections({to:'#experiencia28verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia28verde').connections({to:'#experiencia29verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia29verde').connections({to:'#experiencia30verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia30verde').connections({to:'#experiencia31verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia31verde').connections({to:'#experiencia32verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia32verde').connections({to:'#experiencia33verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia33verde').connections({to:'#experiencia34verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia34verde').connections({to:'#experiencia35verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia35verde').connections({to:'#experiencia36verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia36verde').connections({to:'#experiencia37verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia37verde').connections({to:'#experiencia38verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia38verde').connections({to:'#experiencia39verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia39verde').connections({to:'#experiencia40verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia40verde').connections({to:'#experiencia41verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia41verde').connections({to:'#experiencia42verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia42verde').connections({to:'#experiencia43verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia43verde').connections({to:'#experiencia44verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia44verde').connections({to:'#experiencia45verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia45verde').connections({to:'#experiencia46verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia46verde').connections({to:'#experiencia47verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia47verde').connections({to:'#experiencia48verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia48verde').connections({to:'#experiencia49verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia49verde').connections({to:'#experiencia50verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia50verde').connections({to:'#experiencia51verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia51verde').connections({to:'#experiencia52verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia52verde').connections({to:'#experiencia53verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia53verde').connections({to:'#experiencia54verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia54verde').connections({to:'#experiencia55verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia55verde').connections({to:'#experiencia56verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia56verde').connections({to:'#experiencia57verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia57verde').connections({to:'#experiencia58verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia58verde').connections({to:'#experiencia59verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia59verde').connections({to:'#experiencia60verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia60verde').connections({to:'#experiencia61verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia61verde').connections({to:'#experiencia62verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia62verde').connections({to:'#experiencia63verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia63verde').connections({to:'#experiencia64verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia64verde').connections({to:'#experiencia65verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia65verde').connections({to:'#experiencia66verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia66verde').connections({to:'#experiencia67verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});
$('#experiencia67verde').connections({to:'#experiencia68verde','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#048c2e'}});


//Experiencias Azul
$('#experiencia0azul').connections({to:'#experiencia1azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia1azul').connections({to:'#experiencia2azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia2azul').connections({to:'#experiencia3azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia3azul').connections({to:'#experiencia4azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia4azul').connections({to:'#experiencia5azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia5azul').connections({to:'#experiencia6azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia6azul').connections({to:'#experiencia7azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia7azul').connections({to:'#experiencia8azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia8azul').connections({to:'#experiencia9azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia9azul').connections({to:'#experiencia10azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia10azul').connections({to:'#experiencia11azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia11azul').connections({to:'#experiencia12azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia12azul').connections({to:'#experiencia13azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia13azul').connections({to:'#experiencia14azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia14azul').connections({to:'#experiencia15azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia15azul').connections({to:'#experiencia16azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia16azul').connections({to:'#experiencia17azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia17azul').connections({to:'#experiencia18azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia18azul').connections({to:'#experiencia19azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia19azul').connections({to:'#experiencia20azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia20azul').connections({to:'#experiencia21azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia21azul').connections({to:'#experiencia22azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia22azul').connections({to:'#experiencia23azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia23azul').connections({to:'#experiencia24azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia24azul').connections({to:'#experiencia25azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia25azul').connections({to:'#experiencia26azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia26azul').connections({to:'#experiencia27azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia27azul').connections({to:'#experiencia28azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia28azul').connections({to:'#experiencia29azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia29azul').connections({to:'#experiencia30azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia30azul').connections({to:'#experiencia31azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia31azul').connections({to:'#experiencia32azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia32azul').connections({to:'#experiencia33azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia33azul').connections({to:'#experiencia34azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia34azul').connections({to:'#experiencia35azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia35azul').connections({to:'#experiencia36azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia36azul').connections({to:'#experiencia37azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia37azul').connections({to:'#experiencia38azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia38azul').connections({to:'#experiencia39azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia39azul').connections({to:'#experiencia40azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia40azul').connections({to:'#experiencia41azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia41azul').connections({to:'#experiencia42azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia42azul').connections({to:'#experiencia43azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia43azul').connections({to:'#experiencia44azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia44azul').connections({to:'#experiencia45azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia45azul').connections({to:'#experiencia46azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia46azul').connections({to:'#experiencia47azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia47azul').connections({to:'#experiencia48azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia48azul').connections({to:'#experiencia49azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia49azul').connections({to:'#experiencia50azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia50azul').connections({to:'#experiencia51azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia51azul').connections({to:'#experiencia52azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia52azul').connections({to:'#experiencia53azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia53azul').connections({to:'#experiencia54azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia54azul').connections({to:'#experiencia55azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia55azul').connections({to:'#experiencia56azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia56azul').connections({to:'#experiencia57azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia57azul').connections({to:'#experiencia58azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia58azul').connections({to:'#experiencia59azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia59azul').connections({to:'#experiencia60azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia60azul').connections({to:'#experiencia61azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia61azul').connections({to:'#experiencia62azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia62azul').connections({to:'#experiencia63azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia63azul').connections({to:'#experiencia64azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia64azul').connections({to:'#experiencia65azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia65azul').connections({to:'#experiencia66azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia66azul').connections({to:'#experiencia67azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});
$('#experiencia67azul').connections({to:'#experiencia68azul','class':'first', tag: 'inner', css: { borderWidth: 1.5,color: '#068fc4'}});



//Conocimiento Rojo
//2
$('#conocimiento1rojo').connections({to:'#conocimiento2rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento2rojo').connections({to:'#conocimiento3rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento3rojo').connections({to:'#conocimiento5rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento4rojo').connections({to:'#conocimiento5rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//5
$('#conocimiento8rojo').connections({to:'#conocimiento9rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento9rojo').connections({to:'#conocimiento10rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//6
$('#conocimiento11rojo').connections({to:'#conocimiento12rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento12rojo').connections({to:'#conocimiento13rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento13rojo').connections({to:'#conocimiento14rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento14rojo').connections({to:'#conocimiento15rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento15rojo').connections({to:'#conocimiento16rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//7
$('#conocimiento17rojo').connections({to:'#conocimiento18rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//8
$('#conocimiento19rojo').connections({to:'#conocimiento20rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento20rojo').connections({to:'#conocimiento21rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento21rojo').connections({to:'#conocimiento22rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//10
$('#conocimiento24rojo').connections({to:'#conocimiento25rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento25rojo').connections({to:'#conocimiento26rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento26rojo').connections({to:'#conocimiento27rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento27rojo').connections({to:'#conocimiento28rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento28rojo').connections({to:'#conocimiento29rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento29rojo').connections({to:'#conocimiento30rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento30rojo').connections({to:'#conocimiento31rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento31rojo').connections({to:'#conocimiento32rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//12
$('#conocimiento34rojo').connections({to:'#conocimiento35rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento35rojo').connections({to:'#conocimiento36rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//13
$('#conocimiento37rojo').connections({to:'#conocimiento38rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento38rojo').connections({to:'#conocimiento39rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//17
$('#conocimiento43rojo').connections({to:'#conocimiento44rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//18
$('#conocimiento45rojo').connections({to:'#conocimiento46rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento46rojo').connections({to:'#conocimiento47rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento47rojo').connections({to:'#conocimiento48rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento48rojo').connections({to:'#conocimiento49rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento49rojo').connections({to:'#conocimiento50rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento50rojo').connections({to:'#conocimiento51rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento51rojo').connections({to:'#conocimiento52rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento52rojo').connections({to:'#conocimiento53rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento53rojo').connections({to:'#conocimiento54rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento54rojo').connections({to:'#conocimiento55rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento55rojo').connections({to:'#conocimiento56rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento56rojo').connections({to:'#conocimiento57rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento57rojo').connections({to:'#conocimiento58rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//19
$('#conocimiento59rojo').connections({to:'#conocimiento60rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento60rojo').connections({to:'#conocimiento61rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//22
$('#conocimiento64rojo').connections({to:'#conocimiento65rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento65rojo').connections({to:'#conocimiento66rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//24
$('#conocimiento68rojo').connections({to:'#conocimiento69rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento69rojo').connections({to:'#conocimiento70rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento70rojo').connections({to:'#conocimiento71rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento71rojo').connections({to:'#conocimiento72rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento72rojo').connections({to:'#conocimiento73rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento73rojo').connections({to:'#conocimiento74rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//25
$('#conocimiento75rojo').connections({to:'#conocimiento76rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento76rojo').connections({to:'#conocimiento77rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento77rojo').connections({to:'#conocimiento78rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//26
$('#conocimiento79rojo').connections({to:'#conocimiento80rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//27
$('#conocimiento81rojo').connections({to:'#conocimiento82rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento82rojo').connections({to:'#conocimiento83rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento83rojo').connections({to:'#conocimiento84rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//29
$('#conocimiento86rojo').connections({to:'#conocimiento87rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//31
$('#conocimiento89rojo').connections({to:'#conocimiento90rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//32
$('#conocimiento91rojo').connections({to:'#conocimiento92rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento92rojo').connections({to:'#conocimiento93rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//34
$('#conocimiento95rojo').connections({to:'#conocimiento96rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento96rojo').connections({to:'#conocimiento97rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento97rojo').connections({to:'#conocimiento98rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//36
$('#conocimiento100rojo').connections({to:'#conocimiento101rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento101rojo').connections({to:'#conocimiento102rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento102rojo').connections({to:'#conocimiento103rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//37
$('#conocimiento104rojo').connections({to:'#conocimiento105rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//38
$('#conocimiento106rojo').connections({to:'#conocimiento107rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//39
$('#conocimiento108rojo').connections({to:'#conocimiento109rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento109rojo').connections({to:'#conocimiento110rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//40
$('#conocimiento111rojo').connections({to:'#conocimiento112rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//41
$('#conocimiento113rojo').connections({to:'#conocimiento114rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//43
$('#conocimiento116rojo').connections({to:'#conocimiento117rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento117rojo').connections({to:'#conocimiento118rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento118rojo').connections({to:'#conocimiento119rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento119rojo').connections({to:'#conocimiento120rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//47
$('#conocimiento124rojo').connections({to:'#conocimiento125rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//48
$('#conocimiento126rojo').connections({to:'#conocimiento127rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento127rojo').connections({to:'#conocimiento128rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento128rojo').connections({to:'#conocimiento129rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//49
$('#conocimiento130rojo').connections({to:'#conocimiento131rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//50
$('#conocimiento132rojo').connections({to:'#conocimiento133rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//51
$('#conocimiento134rojo').connections({to:'#conocimiento135rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//52
$('#conocimiento136rojo').connections({to:'#conocimiento137rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento137rojo').connections({to:'#conocimiento138rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento138rojo').connections({to:'#conocimiento139rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento139rojo').connections({to:'#conocimiento140rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento140rojo').connections({to:'#conocimiento141rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento141rojo').connections({to:'#conocimiento142rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento142rojo').connections({to:'#conocimiento143rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento143rojo').connections({to:'#conocimiento144rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//53
$('#conocimiento145rojo').connections({to:'#conocimiento146rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento146rojo').connections({to:'#conocimiento147rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//54
$('#conocimiento148rojo').connections({to:'#conocimiento149rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//57
$('#conocimiento152rojo').connections({to:'#conocimiento153rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//58
$('#conocimiento154rojo').connections({to:'#conocimiento155rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//59
$('#conocimiento156rojo').connections({to:'#conocimiento157rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//60
$('#conocimiento158rojo').connections({to:'#conocimiento159rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento159rojo').connections({to:'#conocimiento160rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento160rojo').connections({to:'#conocimiento161rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento161rojo').connections({to:'#conocimiento162rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//63
$('#conocimiento165rojo').connections({to:'#conocimiento166rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//64
$('#conocimiento167rojo').connections({to:'#conocimiento168rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento168rojo').connections({to:'#conocimiento169rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//67
$('#conocimiento172rojo').connections({to:'#conocimiento173rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento173rojo').connections({to:'#conocimiento174rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
//69
$('#conocimiento176rojo').connections({to:'#conocimiento177rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento177rojo').connections({to:'#conocimiento178rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento178rojo').connections({to:'#conocimiento179rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento179rojo').connections({to:'#conocimiento180rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});
$('#conocimiento180rojo').connections({to:'#conocimiento181rojo','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#d22136'}});


//Conocimiento Verde
//2
$('#conocimiento1verde').connections({to:'#conocimiento2verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento2verde').connections({to:'#conocimiento3verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento3verde').connections({to:'#conocimiento5verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento4verde').connections({to:'#conocimiento5verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//5
$('#conocimiento8verde').connections({to:'#conocimiento9verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento9verde').connections({to:'#conocimiento10verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//6
$('#conocimiento11verde').connections({to:'#conocimiento12verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento12verde').connections({to:'#conocimiento13verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento13verde').connections({to:'#conocimiento14verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento14verde').connections({to:'#conocimiento15verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento15verde').connections({to:'#conocimiento16verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//7
$('#conocimiento17verde').connections({to:'#conocimiento18verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//8
$('#conocimiento19verde').connections({to:'#conocimiento20verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento20verde').connections({to:'#conocimiento21verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento21verde').connections({to:'#conocimiento22verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//10
$('#conocimiento24verde').connections({to:'#conocimiento25verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento25verde').connections({to:'#conocimiento26verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento26verde').connections({to:'#conocimiento27verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento27verde').connections({to:'#conocimiento28verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento28verde').connections({to:'#conocimiento29verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento29verde').connections({to:'#conocimiento30verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento30verde').connections({to:'#conocimiento31verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento31verde').connections({to:'#conocimiento32verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//12
$('#conocimiento34verde').connections({to:'#conocimiento35verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento35verde').connections({to:'#conocimiento36verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//13
$('#conocimiento37verde').connections({to:'#conocimiento38verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento38verde').connections({to:'#conocimiento39verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//17
$('#conocimiento43verde').connections({to:'#conocimiento44verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//18
$('#conocimiento45verde').connections({to:'#conocimiento46verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento46verde').connections({to:'#conocimiento47verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento47verde').connections({to:'#conocimiento48verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento48verde').connections({to:'#conocimiento49verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento49verde').connections({to:'#conocimiento50verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento50verde').connections({to:'#conocimiento51verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento51verde').connections({to:'#conocimiento52verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento52verde').connections({to:'#conocimiento53verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento53verde').connections({to:'#conocimiento54verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento54verde').connections({to:'#conocimiento55verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento55verde').connections({to:'#conocimiento56verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento56verde').connections({to:'#conocimiento57verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento57verde').connections({to:'#conocimiento58verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//19
$('#conocimiento59verde').connections({to:'#conocimiento60verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento60verde').connections({to:'#conocimiento61verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//22
$('#conocimiento64verde').connections({to:'#conocimiento65verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento65verde').connections({to:'#conocimiento66verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//24
$('#conocimiento68verde').connections({to:'#conocimiento69verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento69verde').connections({to:'#conocimiento70verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento70verde').connections({to:'#conocimiento71verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento71verde').connections({to:'#conocimiento72verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento72verde').connections({to:'#conocimiento73verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento73verde').connections({to:'#conocimiento74verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//25
$('#conocimiento75verde').connections({to:'#conocimiento76verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento76verde').connections({to:'#conocimiento77verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento77verde').connections({to:'#conocimiento78verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//26
$('#conocimiento79verde').connections({to:'#conocimiento80verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//27
$('#conocimiento81verde').connections({to:'#conocimiento82verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento82verde').connections({to:'#conocimiento83verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento83verde').connections({to:'#conocimiento84verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//29
$('#conocimiento86verde').connections({to:'#conocimiento87verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//31
$('#conocimiento89verde').connections({to:'#conocimiento90verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//32
$('#conocimiento91verde').connections({to:'#conocimiento92verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento92verde').connections({to:'#conocimiento93verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//34
$('#conocimiento95verde').connections({to:'#conocimiento96verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento96verde').connections({to:'#conocimiento97verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento97verde').connections({to:'#conocimiento98verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//36
$('#conocimiento100verde').connections({to:'#conocimiento101verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento101verde').connections({to:'#conocimiento102verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento102verde').connections({to:'#conocimiento103verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//37
$('#conocimiento104verde').connections({to:'#conocimiento105verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//38
$('#conocimiento106verde').connections({to:'#conocimiento107verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//39
$('#conocimiento108verde').connections({to:'#conocimiento109verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento109verde').connections({to:'#conocimiento110verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//40
$('#conocimiento111verde').connections({to:'#conocimiento112verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//41
$('#conocimiento113verde').connections({to:'#conocimiento114verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//43
$('#conocimiento116verde').connections({to:'#conocimiento117verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento117verde').connections({to:'#conocimiento118verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento118verde').connections({to:'#conocimiento119verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento119verde').connections({to:'#conocimiento120verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//47
$('#conocimiento124verde').connections({to:'#conocimiento125verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//48
$('#conocimiento126verde').connections({to:'#conocimiento127verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento127verde').connections({to:'#conocimiento128verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento128verde').connections({to:'#conocimiento129verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//49
$('#conocimiento130verde').connections({to:'#conocimiento131verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//50
$('#conocimiento132verde').connections({to:'#conocimiento133verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//51
$('#conocimiento134verde').connections({to:'#conocimiento135verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//52
$('#conocimiento136verde').connections({to:'#conocimiento137verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento137verde').connections({to:'#conocimiento138verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento138verde').connections({to:'#conocimiento139verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento139verde').connections({to:'#conocimiento140verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento140verde').connections({to:'#conocimiento141verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento141verde').connections({to:'#conocimiento142verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento142verde').connections({to:'#conocimiento143verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento143verde').connections({to:'#conocimiento144verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//53
$('#conocimiento145verde').connections({to:'#conocimiento146verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento146verde').connections({to:'#conocimiento147verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//54
$('#conocimiento148verde').connections({to:'#conocimiento149verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//57
$('#conocimiento152verde').connections({to:'#conocimiento153verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//58
$('#conocimiento154verde').connections({to:'#conocimiento155verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//59
$('#conocimiento156verde').connections({to:'#conocimiento157verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//60
$('#conocimiento158verde').connections({to:'#conocimiento159verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento159verde').connections({to:'#conocimiento160verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento160verde').connections({to:'#conocimiento161verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento161verde').connections({to:'#conocimiento162verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//63
$('#conocimiento165verde').connections({to:'#conocimiento166verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//64
$('#conocimiento167verde').connections({to:'#conocimiento168verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento168verde').connections({to:'#conocimiento169verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//67
$('#conocimiento172verde').connections({to:'#conocimiento173verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento173verde').connections({to:'#conocimiento174verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
//69
$('#conocimiento176verde').connections({to:'#conocimiento177verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento177verde').connections({to:'#conocimiento178verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento178verde').connections({to:'#conocimiento179verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento179verde').connections({to:'#conocimiento180verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});
$('#conocimiento180verde').connections({to:'#conocimiento181verde','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#048c2e'}});


//Conocimiento Azul
//2
$('#conocimiento1azul').connections({to:'#conocimiento2azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento2azul').connections({to:'#conocimiento3azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento3azul').connections({to:'#conocimiento5azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento4azul').connections({to:'#conocimiento5azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//5
$('#conocimiento8azul').connections({to:'#conocimiento9azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento9azul').connections({to:'#conocimiento10azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//6
$('#conocimiento11azul').connections({to:'#conocimiento12azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento12azul').connections({to:'#conocimiento13azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento13azul').connections({to:'#conocimiento14azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento14azul').connections({to:'#conocimiento15azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento15azul').connections({to:'#conocimiento16azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//7
$('#conocimiento17azul').connections({to:'#conocimiento18azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//8
$('#conocimiento19azul').connections({to:'#conocimiento20azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento20azul').connections({to:'#conocimiento21azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento21azul').connections({to:'#conocimiento22azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//10
$('#conocimiento24azul').connections({to:'#conocimiento25azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento25azul').connections({to:'#conocimiento26azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento26azul').connections({to:'#conocimiento27azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento27azul').connections({to:'#conocimiento28azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento28azul').connections({to:'#conocimiento29azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento29azul').connections({to:'#conocimiento30azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento30azul').connections({to:'#conocimiento31azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento31azul').connections({to:'#conocimiento32azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//12
$('#conocimiento34azul').connections({to:'#conocimiento35azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento35azul').connections({to:'#conocimiento36azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//13
$('#conocimiento37azul').connections({to:'#conocimiento38azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento38azul').connections({to:'#conocimiento39azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//17
$('#conocimiento43azul').connections({to:'#conocimiento44azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//18
$('#conocimiento45azul').connections({to:'#conocimiento46azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento46azul').connections({to:'#conocimiento47azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento47azul').connections({to:'#conocimiento48azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento48azul').connections({to:'#conocimiento49azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento49azul').connections({to:'#conocimiento50azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento50azul').connections({to:'#conocimiento51azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento51azul').connections({to:'#conocimiento52azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento52azul').connections({to:'#conocimiento53azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento53azul').connections({to:'#conocimiento54azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento54azul').connections({to:'#conocimiento55azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento55azul').connections({to:'#conocimiento56azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento56azul').connections({to:'#conocimiento57azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento57azul').connections({to:'#conocimiento58azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//19
$('#conocimiento59azul').connections({to:'#conocimiento60azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento60azul').connections({to:'#conocimiento61azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//22
$('#conocimiento64azul').connections({to:'#conocimiento65azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento65azul').connections({to:'#conocimiento66azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//24
$('#conocimiento68azul').connections({to:'#conocimiento69azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento69azul').connections({to:'#conocimiento70azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento70azul').connections({to:'#conocimiento71azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento71azul').connections({to:'#conocimiento72azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento72azul').connections({to:'#conocimiento73azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento73azul').connections({to:'#conocimiento74azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//25
$('#conocimiento75azul').connections({to:'#conocimiento76azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento76azul').connections({to:'#conocimiento77azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento77azul').connections({to:'#conocimiento78azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//26
$('#conocimiento79azul').connections({to:'#conocimiento80azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//27
$('#conocimiento81azul').connections({to:'#conocimiento82azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento82azul').connections({to:'#conocimiento83azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento83azul').connections({to:'#conocimiento84azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//29
$('#conocimiento86azul').connections({to:'#conocimiento87azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//31
$('#conocimiento89azul').connections({to:'#conocimiento90azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//32
$('#conocimiento91azul').connections({to:'#conocimiento92azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento92azul').connections({to:'#conocimiento93azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//34
$('#conocimiento95azul').connections({to:'#conocimiento96azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento96azul').connections({to:'#conocimiento97azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento97azul').connections({to:'#conocimiento98azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//36
$('#conocimiento100azul').connections({to:'#conocimiento101azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento101azul').connections({to:'#conocimiento102azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento102azul').connections({to:'#conocimiento103azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//37
$('#conocimiento104azul').connections({to:'#conocimiento105azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//38
$('#conocimiento106azul').connections({to:'#conocimiento107azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//39
$('#conocimiento108azul').connections({to:'#conocimiento109azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento109azul').connections({to:'#conocimiento110azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//40
$('#conocimiento111azul').connections({to:'#conocimiento112azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//41
$('#conocimiento113azul').connections({to:'#conocimiento114azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//43
$('#conocimiento116azul').connections({to:'#conocimiento117azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento117azul').connections({to:'#conocimiento118azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento118azul').connections({to:'#conocimiento119azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento119azul').connections({to:'#conocimiento120azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//47
$('#conocimiento124azul').connections({to:'#conocimiento125azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//48
$('#conocimiento126azul').connections({to:'#conocimiento127azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento127azul').connections({to:'#conocimiento128azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento128azul').connections({to:'#conocimiento129azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//49
$('#conocimiento130azul').connections({to:'#conocimiento131azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//50
$('#conocimiento132azul').connections({to:'#conocimiento133azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//51
$('#conocimiento134azul').connections({to:'#conocimiento135azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//52
$('#conocimiento136azul').connections({to:'#conocimiento137azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento137azul').connections({to:'#conocimiento138azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento138azul').connections({to:'#conocimiento139azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento139azul').connections({to:'#conocimiento140azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento140azul').connections({to:'#conocimiento141azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento141azul').connections({to:'#conocimiento142azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento142azul').connections({to:'#conocimiento143azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento143azul').connections({to:'#conocimiento144azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//53
$('#conocimiento145azul').connections({to:'#conocimiento146azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento146azul').connections({to:'#conocimiento147azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//54
$('#conocimiento148azul').connections({to:'#conocimiento149azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//57
$('#conocimiento152azul').connections({to:'#conocimiento153azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//58
$('#conocimiento154azul').connections({to:'#conocimiento155azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//59
$('#conocimiento156azul').connections({to:'#conocimiento157azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//60
$('#conocimiento158azul').connections({to:'#conocimiento159azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento159azul').connections({to:'#conocimiento160azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento160azul').connections({to:'#conocimiento161azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento161azul').connections({to:'#conocimiento162azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//63
$('#conocimiento165azul').connections({to:'#conocimiento166azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//64
$('#conocimiento167azul').connections({to:'#conocimiento168azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento168azul').connections({to:'#conocimiento169azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//67
$('#conocimiento172azul').connections({to:'#conocimiento173azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento173azul').connections({to:'#conocimiento174azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
//69
$('#conocimiento176azul').connections({to:'#conocimiento177azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento177azul').connections({to:'#conocimiento178azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento178azul').connections({to:'#conocimiento179azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento179azul').connections({to:'#conocimiento180azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});
$('#conocimiento180azul').connections({to:'#conocimiento181azul','class':'first', tag: 'inner', css: { borderWidth: 1.2,color: '#068fc4'}});

var connections = $('connection, inner');
setInterval(function() { connections.connections('update') }, 0.1);
});

$(".estilo-button").click(function () {
  var id = $(this).data('id');
  //alert(id);
		$('.ocultar'+id).toggle();
});


</script>
