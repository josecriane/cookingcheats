

getRecipe = function ( Y, callback ) {
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