<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<!DOCTYPE html>

<html xmlns ="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>CookingCheats</title>
    <meta name="description" content="">
    <script src="http://yui.yahooapis.com/3.9.0/build/yui/yui-min.js"></script>
    <script src="./js/utils.js"></script>
    <script src="./js/model.js"></script>
  </head>
  
  <body>
    <?php include "main_bar.php" ?>
    <div id="content">
      <div id="rec_name"></div>
      <div id="rec_menu">
        <div class="rec_menu_element rotate_90 rec_menu_selected"><span id="description_label" />Description</div>
        <div class="rec_menu_element rotate_90"><span id="ingredients_label" />Ingredients</div>
        <div class="rec_menu_element rotate_90"><span id="preparation_label" />Preparation</div>
        <div class="rec_menu_element rotate_90"><span id="presentation_label" />Presentation</div>
      </div>
      <div id="text"></div>
      <div id="r_side">
        <div id="characteristics" class="shadow_content">
          <div class="cello rotate-left" id="top-left"></div>
          <div class="cello rotate-right" id="top-right"></div>
          <div class="cello rotate-right" id="bottom-left"></div>
          <div class="cello rotate-left" id="bottom-right"></div>
          <div id="photo"><img src="test.jpg" /></div>
          <div id="recipe_attributes">
            <span class="att_label" id="difficulty_label">Difficulty</span><div class="att_name" id="difficulty_name"> </div>
            <span class="att_label" id="average_label">Average</span><div class="att_name" id="average_name"> </div>
            <span class="att_label" id="diners_label">Dinners</span><div class="att_name" id="diners_name"> </div>
            <span class="att_label" id="time_label">Time</span><div class="att_name" id="time_name"> </div>
            <div id="diners"></div>
            <div id="time"></div>
          </div>
        </div>
        <div id="social_icons">
          <div class="social_icon" id="twitter"></div>
          <a class="social_icon" id="facebook" href="" targer="_self"></a>
          <div class="social_icon" id="google_plus"></div>
        </div>
      </div>
    </div>
  </body>

  <script>

    YUI().use('io', 'json', 'recipe', function ( Y ) {

      //Needs a solution on YUI3

      var change_text;
      getRecipe(Y, function(Y, recipe){
        change_text = set_recipe(Y, recipe);
      });

      var menu_change = function (e) {
        var button_clicked = e.currentTarget;
        var button_selected = Y.one('.rec_menu_selected');
        button_selected.removeClass('rec_menu_selected');
        button_clicked.addClass('rec_menu_selected');
        change_text();
      };

      var buttons = Y.all('.rec_menu_element');
      buttons.each( function (button) { 
        button.on('click', menu_change);
      });


      var set_text = function (node, text){
        node.setHTML(text);
      }

      var init_recipe = function (Y, recipe){
        set_text(Y.one('#rec_name'), recipe.get('RecName'));
        set_text(Y.one('#difficulty_name'), recipe.get('Difficulty'));
        set_text(Y.one('#average_name'), '5');
        set_text(Y.one('#diners_name'), recipe.get('NumDiners'));
        set_text(Y.one('#time_name'), recipe.get('Time'));
        set_text(Y.one('#text'), recipe.get('RecDescription'));
      }

      var set_recipe = function ( Y, recipe ) {
        var recipe =  recipe;
        var Y = Y;

        init_recipe(Y, recipe);
        var change_text = function () {    
          var text_div = Y.one('#text');
          var element = Y.one('.rec_menu_selected');
          if (element.contains(description_label)) { set_text(text_div, recipe.get('RecDescription')); }
          if (element.contains(ingredients_label)) { recipe.fillIngredientsIn(text_div); }
          if (element.contains(preparation_label)) { recipe.fillPreparationIn(text_div); }
          if (element.contains(presentation_label)) { set_text(text_div, recipe.get('Presentation')); }
        }
        return change_text;
      }

    });
  </script>
</html> 