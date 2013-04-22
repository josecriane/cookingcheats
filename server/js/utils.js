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

var add_meta_description = function (RecipeName, URL) {
  var meta_des = document.createElement('meta');
  meta_des.name = "description";
  meta_des.content = encodeURIComponent("Cocinando " + RecipeName + " con CookingCheats " + URL);
  document.getElementsByTagName('head').item(0).appendChild(meta_des);
}

var init_recipe = function (Y, recipe) {
  add_meta_description(recipe.get('RecName'), window.location);
  set_text(Y.one('#rec_name'), recipe.get('RecName'));
  change_number_to_image(Y.one('#difficulty_name'), "chef_hat.png", recipe.get('Difficulty'));
  change_number_to_image(Y.one('#average_name'), "fork.png", recipe.get('Average'));
  set_text(Y.one('#diners_name'), recipe.get('NumDiners'));
  set_text(Y.one('#time_name'), recipe.get('Time')+" min");
  set_text(Y.one('#text'), recipe.get('RecDescription'));

  //set_icons
  shareButtons(Y.one('#social_icons'), recipe.get("RecName"), window.location);
}

var change_number_to_image = function (node, image, num) {
  var img_tag = "<img src='./res/" + image + "' alt=" + image + " />";
  var text = "";
  for (var i = 0; i < num; i++){
    text += img_tag;
  }
  set_text(node, text);
}

var google_js = function () {
  window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");
  return false;
}

var shareButtons = function (node, RecipeName, URL) {
  var min_window = "onclick=\"window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\"";
  var text = encodeURIComponent("Cocinando " + RecipeName + " con CookingCheats " + URL);
  var twitter = '<a class="social_icon" id="twitter" href="http://twitter.com/home?status=' + text + '" ' + min_window + 'target="_blank"></a>';
  var facebook = '<a class="social_icon" id="facebook" href="https://www.facebook.com/sharer/sharer.php?u=' + URL + '" ' + min_window + ' target="_blank"></a>';
  var google_plus = '<a class="social_icon" id="google_plus" href="https://plus.google.com/share?url=' + URL + '" ' + min_window + ' target="_blank"></a>';
  set_text(node, twitter+facebook+google_plus);
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