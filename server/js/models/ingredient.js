YUI().add('ingredient', function(Y){
  "use strict";
  Y.Recipe = Y.Base.create('ingredient', Y.Model, [], {
      //Function gone here.
  }, {
    ATTRS: {
      IngredientId: 0,
      IngName: null,
      IngPhoto: null,
      Kcal: 0,
      TypeId: 0
    }
  });
}, 0.0, {requires: ['model']});