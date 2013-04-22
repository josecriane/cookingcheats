YUI().add('recipe', function(Y){

  "use strict";
  Y.Recipe = Y.Base.create('recipe', Y.Model, [], {

    initializer: function () {
      var prev_ingredients = this.get('Ingredients');
      var next_ingredients = new Array();
      for ( var index in prev_ingredients ) {
        next_ingredients.push(new Y.Ingredient(prev_ingredients[index]));
      }
      this.set('Ingredients', next_ingredients);
    },
    
    fillPreparationIn: function ( node ) {
      var preparation = this.get('Preparation').split('\n');
      var gen_preparation = "";
      for ( var index in preparation ) {
        gen_preparation += preparation[index] + "<br>"; 
      }
      node.setHTML(gen_preparation);
    },

    fillIngredientsIn: function ( node ) {
      var gen_ingredients = "";
      var ingredients = this.get('Ingredients')
      for ( var index in ingredients ) {
        gen_ingredients += ingredients[index].printWithSearch() + '<br>';
      }

      node.setHTML(gen_ingredients);

    }

  }, {
    ATTRS: {
      RecipeId: 0,
      RecName: null,
      RecDescription: null,
      RecPhoto: null,
      Time: 0,
      Ingredients: [],
      Preparation: null,
      NumDinners: 0,
      Presentation: null,
      Difficulty: 1,
      Video: null,
      Average: 1
    }
  });
}, 0.0, {requires: ['model', 'ingredient']});