<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>

<html xmlns ="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>CookingCheats</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.png" />
    <script src="http://yui.yahooapis.com/3.9.0/build/yui/yui-min.js"></script>
  </head>

  <body>
    <?php include "main_bar.php"; ?>

    <div id="content">
      <div id="buttons">
        <div id="paypal">
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
            <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
          </form>
        </div>
        <div id="github">
          <a href="https://github.com/josecriane/cookingcheats"><img src="./res/github.png"/>GitHub</a>
        </div>
      </div>
      <div id="description">
        <div id="info">
          <div class="question">¿Qué es CookingCheats, y por que es diferente a cualquier otra web?</div>
          CookingCheats es una página de Recetas que pretende hacerte la vida más facil, el proyecto empezó cuando, después de usar muchas aplicaciones y webs de recetas, ninguna era lo que yo buscaba: un sitio donde buscar recetas de forma facil, y sin publicidad.
        </div>
        <div id="future">
          <div class="question">¿Y en un futuro?</div>
          CookingCheats es una idea en constante desarrollo y se mejora semana a semana. Tiene previstas, entre otras, las siguiente mejoras:<br>
          <ul>
            <li>Búsqueda de recetas, usando los ingredientes que tienes en casa.</li>
            <li>Una aplicación móvil.</li>
            <li>Usuarios, los cuales podrán subir sus propias recetas y ser valorados por ellas.</li>
            <li>Gestor de dietas, mediante las Kilocalorías de los ingredientes de las recetas.</li>
          </ul>
        </div>
        <div id="help">
          <div class="question">Me gusta, ¿cómo puedo ayudar?</div>
          CookingCheats es software libre, así que si tienes conocimientos sobre desarrollo de aplicaciones Web, Andriod, iOS... y quieres ayudar, en la zona de arriba encontrarás el icono de Github que te llevará al codigo.<br>
          Si no tienes conocimientos de informática o no sabes programar siempre puedes aportar ideas y mejoras al poyecto enviándome un email a josecriane (at) gmail (dot) com.<br>
          En caso de que te guste mucho siempre, puedes realizar una donación para que el proyecto no se muera usando el boton de donar que puedes encontrar en la zona de arriba.
        </div>
      <div>
    </div>
  </body>
  <script>
    YUI().use('node', function(Y) {
        var current = Y.one('#about_menu');
        current.addClass('current_element');
      });
  </script>


</html>