<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<!DOCTYPE html>

<html xmlns ="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Search · CookingCheats</title>
    <meta charset="utf-8">
    <script src="http://yui.yahooapis.com/3.9.0/build/yui/yui-min.js"></script>
    <script src="./js/utils.js"></script>
    <script src="./js/model.js"></script>
  </head>
  
  <body>
    <?php include "main_bar.php" ?>
    <div id="content">
    </div>
  </body>
  
  <script id="list-template" type="text/x-handlebars-template">
    <ul id="recipes" class="inner shadow_content">
      {{#items}}
        <a href="recipe.php#!{{RecipeId}}">
          <li>
            <img src="test.jpg">
            <div id="recipe_info">
              <div id="rec_name">{{RecName}}</div>
              <div id="description">{{RecDescription}}</div>
            </div>
          </li>
        </a>
      {{/items}}
    </ul>
  </script>

  <script>
      YUI().use('io', 'json', 'recipe', 'node-base', 'handlebars', function ( Y ) {

      var source = Y.one('#list-template').getHTML(),
          template = Y.Handlebars.compile(source),
          html;

      searchRecipes(Y, function(recipes){
        html = template ({
          items: recipes
        });

        Y.one('#content').append(html);
      });
    });
  </script>
</html> 