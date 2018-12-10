$(document).ready(function(){

 $(".fancybox").fancybox();

});

$(document).ready(function() {
  $(".pos-logo").fadeOut(1500,function(){
    $(".img-tamano").css('opacity','0');
  });
  $( ".pos-logo" ).fadeIn(0, function() {
      $(".pos-logo").css('opacity','1');
      $(".pos-logo").css('margin-top','-90px');
      $(".logorombocambio").attr('src','app/img/logocambio.png');
      $(".colorfooter").css('opacity','1');
      $("#backheader").css('opacity','1');
      $(".img-tamano").css('opacity','1');
      $(".pos-logomap").css('text-align','center');
      $(".img-tamano").attr('src','app/img/mapaLogoinicio.png');
      $(".pos-logomap").css('margin-top','-90px');
      $(".fondotransparente").css('opacity','1');
    });
});

$(document).ready(function() {
  $(".contenedor-datos").fadeOut(0,function(){

  });
  $( ".contenedor-datos" ).fadeIn(2000, function() {
      $(".contenedor-datos").css('opacity','1');
    });
});

$(document).ready(function() {
  $('.estilo-empezar').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('.estilo-empezar').val();
    $(".contenedor-datos").fadeOut(1000,function(){
      $(".contenedor-datos").css('margin-left','-500px');
      $.ajax({
        url:'models/puestos.php',
        type:'POST',
        data:{btn:btn},
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
  });
});

$(document).ready(function() {
  $('.btn-contacto').click(function(){

    var btncontacto = $('.btn-contacto').val();

    $(".contenedor-datos").fadeOut(1000,function(){
      $(".contenedor-datos").css('margin-left','-500px');
      $('.contenedor-datos').css('opacity','0');
      $('.contenedor-datos').css('transition','0.8s all');
      $.ajax({
        url:'models/contacto.php',
        type:'POST',
        data:{btncontacto:btncontacto},
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
  });

  $('.btn-inicio').click(function(){

    var btninicio = $('.btn-inicio').val();

    $(".contenedor-datos").fadeOut(1000,function(){
      $.ajax({
        url:'models/inicio.php',
        type:'POST',
        data:{btninicio:btninicio},
        datatype:'html',
        success:function(datahtml){
          $('.contenedor-datos').html(datahtml);
        },error: function(){
          $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
        }
      });
      $(".contenedor-datos").css('margin-left','-500px');
      $('.contenedor-datos').css('opacity','0');
      $('.contenedor-datos').css('transition','0.8s all');

    });
    $( ".contenedor-datos" ).fadeIn(500, function() {
      $(".contenedor-datos").css('margin-left','0px');
      $('.contenedor-datos').css('opacity','1');
      $('.contenedor-datos').css('margin-bottom','90px');

    });
  });
});



/*
function adjustLine(from, to, line){
  var fT = from.offsetTop + from.offsetHeight/2;
  var tT = to.offsetTop + to.offsetHeight/2;
  var fL = from.offsetLeft + from.offsetWidth/2;
  var tL = to.offsetLeft + to.offsetWidth/2;
  var CA = Math.abs(tT - fT);
  var CO = Math.abs(tL - fL);
  var H = Math.sqrt(CA*CA + CO*CO);
  var ANG = 180 / Math.PI * Math.acos( CA/H );
  if(tT > fT){
    var top = (tT-fT)/2 + fT;
  }else{
    var top = (fT-tT)/2 + tT;
  }
  if(tL > fL){
    var left = (tL-fL)/2 + fL;
  }else{
    var left = (fL-tL)/2 + tL;
   }
   if(( fT < tT && fL < tL) || ( tT < fT && tL < fL) || (fT > tT && fL > tL) || (tT > fT && tL > fL)){
      ANG *= -1;
    }
      top-= H/2;
      line.style["-webkit-transform"] = 'rotate('+ ANG +'deg)';
      line.style["-moz-transform"] = 'rotate('+ ANG +'deg)';
      line.style["-ms-transform"] = 'rotate('+ ANG +'deg)';
      line.style["-o-transform"] = 'rotate('+ ANG +'deg)';
      line.style["-transform"] = 'rotate('+ ANG +'deg)';
      line.style.top = top+'px';
      line.style.left = left+'px';
      line.style.height = H + 'px';
 }
adjustLine( document.getElementById('div1'), document.getElementById('div2'), document.getElementById('line') );
*/
