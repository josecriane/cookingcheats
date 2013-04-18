<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>

<html xmlns ="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Tortilla de patatas y calabacín · CookingCheats</title>
    <meta name="description" content="">
    <script src="http://yui.yahooapis.com/3.9.0/build/yui/yui-min.js"></script>
  </head>

  <body>
    <?php include "main_bar.php"; ?>

    <div id="content" class="inner">
      <div class="title">CookingCheats</div>
      <div id="proposal_recipes" class="shadow_content">
        <div id="proposal_label">Te proponemos las siguientes recetas</div>
        <figure>
          <img src="test.jpg">
          <div id="rec_name">Recipe Name</div>
        </figure>
        <figure>
          <img src="test.jpg">
          <div id="rec_name">Recipe Name</div>
        </figure>
        <figure>
          <img src="test.jpg">
          <div id="rec_name">Recipe Name</div>
        </figure>
      </div>
      <div id="pet_logo">
        <img src="./res/logo.png">
      </div>

    <div>
  </body>
  <script>
    YUI().use('node', function(Y) {
        var current = Y.one('.menu_element');
        current.addClass('current_element');
      });
  </script>


</html>