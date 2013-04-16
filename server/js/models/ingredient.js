YUI().add('ingredient', function(Y){
  "use strict";
  Y.Ingredient = Y.Base.create('ingredient', Y.Model, [], {
      
    printWithSearch: function ( ) {
      //When there is a function to search by ingredient must create the link
      var _return = this.get('Amount') + " x " + this.get('IngName');
      return _return;
    }
  }, {
    ATTRS: {
      IngredientId: 0,
      IngName: null,
      IngPhoto: null,
      Amount: 0,
      Kcal: 0,
      TypeId: 0
    }
  });
}, 0.0, {requires: ['model']});