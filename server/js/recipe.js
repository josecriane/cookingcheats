

// Recipe class

// ToDo
YUI().add('recipe', function(Y){
  "use strict";
  Y.Recipe = Y.Base.create('recipe', Y.Model, [], {
      //Function gone here.
  }, {
    ATTRS: {
      RecipeId: 0,
      RecName: null,
      RecDescription: null,
      RecPhoto: null,
      Time: 0,
      Ingredients: [],
      Preparation: null,
      NumDiners: 0,
      Presentation: null,
      Difficulty: 0,
      Video: null
    }
  });
}, 0.0, {requires: ['model']});
