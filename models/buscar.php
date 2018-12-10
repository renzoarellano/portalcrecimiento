 <?php
header("Content-Type: application/json");
header("Content-Type: application/json");
require_once 'general.class.php';

$trabajos = new generalQuery();
$consultaBusqueda='';
//$consultaBusqueda = $_POST['valorBusqueda'];
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
//$datos = $trabajos->obtenerTrabajos($consultaBusqueda);
$datos = $trabajos->obtenerTodos();
$totalLista = count($datos);
$arrayJson = array();
for($i = 0; $i<$totalLista;$i = $i + 1){
$arrayJson[$i]['id'] = $datos[$i]['id'];
$arrayJson[$i]['funcion'] = $datos[$i]['funcion_nombre'].'_'.$datos[$i]['direccion_abreviatura'];
}

$jsonStrings = json_encode(array("puestos"=>$arrayJson));
echo $jsonStrings;
 ?>
