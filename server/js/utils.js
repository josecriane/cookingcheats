/* Recipe page functions */

var getRecipe = function ( Y, callback ) {
  //Search a solution with YUI
  var recipeId = window.location.hash.split('#!')[1];
  Y.io('http://localhost/API/api.php', {
    data: 'method=getRecipe&RecipeId='+ recipeId,
    on: {
      complete: function (id, response) { 
        var recipe = new Y.Recipe(Y.JSON.parse(response.responseText)[0]);
        callback(Y, recipe);
      }
    }
  });
}

var set_text = function (node, text){
  node.setHTML(text);
}

var init_recipe = function (Y, recipe){
  set_text(Y.one('#rec_name'), recipe.get('RecName'));
  set_text(Y.one('#difficulty_name'), recipe.get('Difficulty'));
  //set_text(Y.one('#average_name'), '5');
  change_number_to_image(Y.one('#average_name'), "fork.png", 2)
  set_text(Y.one('#diners_name'), recipe.get('NumDiners'));
  set_text(Y.one('#time_name'), recipe.get('Time'));
  set_text(Y.one('#text'), recipe.get('RecDescription'));
}

var change_number_to_image = function (node, image, num) {
  var img_tag = "<img src='./res/" + image + "' alt=" + image + " />";
  var text = "";
  for (var i = 0; i < num; i++){
    text += img_tag;
  }
  set_text(node, text);
}

/*Search page functions */

var searchRecipes = function ( Y, callback ) {
  // Search a solution with YUI
  var url_split = window.location.href.split('=');
  var keywords;
  if ( url_split[0].match('keywords') ) {
    keywords = url_split[1];
  } else { 
    keywords = " ";
  }
  Y.io('http://localhost/API/api.php', {
    data: 'method=searchRecipe&Keywords='+ keywords + '&Page=0',
    on: {
      complete: function (id, response) {
        callback(Y.JSON.parse(response.responseText));
      }
    }
  });
}

var jsonToRecipe = function ( Y, json_recipe ) {
  return new Y.Recipe( json_recipe );
}