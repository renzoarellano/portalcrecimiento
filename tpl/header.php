<?php
$bien=$cont=0;
switch (basename($_SERVER['PHP_SELF'])) {
    case "inicio.php":
      $bien="class='active'";
    break;
    case "contactenos.php":
      $cont="class='active'";
    break;
}
?>

<header id="backheader">
  <div class="container">
    <div class="col-xs-12 np">
      <div class="col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 col-lg-offset-6 col-lg-6 np">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left np m-header">
          <button class="btn-inicio" type="button" name="incio" value="inicio">
              INICIO
          </button> |
          <button class="btn-contacto" type="button" name="contacto" value="contacto">CONTACTO</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right right np">
          <ul class="estilo-ul">
            <li class="list-redes">
              <a target="_blank" href="#">
                <img src="app/img/facebook.png" alt="facebook-icon Portal de Crecimiento">
              </a>
            </li>
            <li class="list-redes">
              <a target="_blank" href="#">
                <img src="app/img/google.png" alt="google-icon Portal de Crecimiento">
              </a>
            </li>
            <li class="list-redes">
              <a target="_blank" href="#">
                <img src="app/img/linkedin.png" alt="linkedin-icon Portal de Crecimiento">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
