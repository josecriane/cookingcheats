<?php
require('DBaccess.php');

function getRecipeImpl ( $recipeId ) {
    $dba = new DBaccess();
    $query = "SELECT * FROM RECIPE WHERE RecipeId = '$RecipeId' ;";
    $result = $dba->doSelect($query);

    $queryIngredients = "SELECT i.IngName, i.IngPhoto, i.Kcal, c.Amount 
                            FROM CONTAINS c JOIN INGREDIENT i on c.IngredientId = i.ingredientId 
                            WHERE c.RecipeId = '$recipeId' ;";
    $result['Ingredients'] = $dba->doSelect($queryIngredients);
    
    returnJSON($result);
}

function getRecipesByCategory ( $categoryId, $page ) {
    $dba = new DBaccess();
    $query = "SELECT r.RecipeId, RecName, RecDescription, RecPhoto
                FROM RECIPE_CATEGORY rc JOIN RECIPE r ON rc.RecipeId = r.RecipeId
                WHERE rc.CategoryId = '$categoryId'
                LIMIT ".($page * 10)." , ".(($page + 1) * 10).";";

    $result = $dba->doSelect($query);

    returnJSON($result);

}

function returnJSON ($return) {
    if ($return == false) {
        echo $_GET['callback'].'('.json_encode(false).')';
    } else {
        echo $_GET['callback'].'('.json_encode($return, JSON_UNESCAPED_UNICODE).')';
    }
}

?>
