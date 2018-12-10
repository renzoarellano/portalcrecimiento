<?php
error_reporting(E_ALL ^ E_NOTICE);

define("SLASH", "/");
define("SLASH_SUP", "../");

// DATOS DE CONEXIÓN A BD
define('HOST', 'localhost');
define('DATA_BASE', 'portalcrecimiento');
//define('DATA_BASE', 'eigbitco_portalcrecimiento');
/*define('USER_DB', 'eigbitco_portal');
define('PASS_DB', 'M@:v3r!cK');*/
define('USER_DB', 'root');
define('PASS_DB', 'root');

$path = array(
    "controllers" => "controllers" . SLASH,
    "css" => "app/css" . SLASH,
    "img" => "app/img" . SLASH,
    "js" => "app/js" . SLASH,
    "module" => "module" . SLASH,
    "tpl" => "tpl" . SLASH,
    "views" => "views" . SLASH,
    "common" => "common" . SLASH,
    "lib" => "common" . SLASH . "lib" . SLASH,
    "lang" => "common" . SLASH . "lang" . SLASH
);
$contact = array(
    "msgok" => "No se pudo enviar el mensaje, intentelo de nuevo.",
    "msgerror" => "El mensaje se envio correctamente, en breve nos pondremos en contacto con usted."
);

?>
