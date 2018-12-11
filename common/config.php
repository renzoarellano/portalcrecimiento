<?php
error_reporting(E_ALL ^ E_NOTICE);

define("SLASH", "/");
define("SLASH_SUP", "../");

//mysql://b28d9ca4a43096:7fa2b6f2@us-cdbr-iron-east-01.cleardb.net/heroku_0abc0e21d37e5bf?reconnect=true
// DATOS DE CONEXIÓN A BD
define('HOST', 'us-cdbr-iron-east-01.cleardb.net');
define('DATA_BASE', 'heroku_0abc0e21d37e5bf');
//define('DATA_BASE', 'eigbitco_portalcrecimiento');
/*define('USER_DB', 'eigbitco_portal');
define('PASS_DB', 'M@:v3r!cK');*/
define('USER_DB', 'b28d9ca4a43096');
define('PASS_DB', '7fa2b6f2');

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
