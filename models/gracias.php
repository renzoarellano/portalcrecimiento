<?php
/*
include 'common/config.php';
require 'common/mysql.php';
$conexion = new MySQL(); */
$btnenviar = '';
$nombre = '';
$email = '';
$message = '';
$btnenviar = $_POST['btnenviar'];
if($btnenviar != null && $btnenviar != ''){
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['message'];
}
/*$query = "INSERT INTO registro_formulario_portalcrecimiento SET nombres ='$nombre', email='$email', mensaje='$mensaje'";
$result = $conexion->execute($query); */
  //EMAIL BÁSICO SIN PHPMAILER
  //$to = 'danny@likeseasons.com';
    $to = 'renzo.munoz@likeseasons.com';
//	$to = 'renzo.munoz@likeseasons.com';
  //$to = $tienda_correo;
  $headers= "From: Portal Crecimiento <noreply@portalcrecimiento.net>\r\n";
      $subject = 'DATOS DE Portal de Crecimiento - Lindley';
  //$headers.= "Reply-To: Derco Perú <noreply@dercoperu.net>\r\n";
  //$headers .= "BCC: likeseasons17@gmail.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
  $message .= '<p><b>DATOS PERSONALES DEL CLIENTE:</b><br>';
  $message .= '<b>Nombres y Apellidos: </b>' .$nombre .'<br>';
  $message .= '<b>Email: </b>' .$email .'<br>';
  $message .= '<b>Mensaje: </b>' .$mensaje .'<br>';
  $message .= '</p>';
  $message .= '</body></html>';

  mail($to, $subject, $message, $headers);

 ?>

<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
  <div class="col-xs-12  np text-center">
    <span>Gracias!</span> <br>
    Estaremos en contacto contigo lo mas pronto posible. <br>
    <?= $nombre; ?> <br>
    <?= $email; ?> <br>
    <?= $mensaje; ?>
  </div>

  <div class="col-xs-12 text-center">
    <a class="estilo-enviar" href="inicio.php">Volver</a>
  </div>
</div>
