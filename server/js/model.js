var YUI_config = {
  groups: {
    'local-modules': {
      base: './js/models/',
      modules: {
        'recipe': {
          path: 'recipe.js',
          requires: ['model', 'ingredient']
        },
        'ingredient': {
          path: 'ingredient.js',
          requires: ['model']
        },
      }
    }
  }
}
