<?php
require('DBaccess.php');

function getRecipeImpl ( $RecipeId ) {
    $dba = new DBaccess();
    $query = "SELECT * FROM RECIPE WHERE RecipeId = '$RecipeId' ;";
    $result = $dba->doSelect($query);

    $queryIngredients = "SELECT i.IngName, i.IngPhoto, i.Kcal, c.Amount 
                            FROM CONTAINS c JOIN INGREDIENT i on c.IngredientId = i.ingredientId 
                            WHERE c.RecipeId = '$RecipeId' ;";
    $result['Ingredients'] = $dba->doSelect($queryIngredients);
    
    if ($result == false) {
    	echo $_GET['callback'].'('.json_encode(false).')';
    } else {

    	echo $_GET['callback'].'('.json_encode($result, JSON_UNESCAPED_UNICODE).')';
    }
}

?>
