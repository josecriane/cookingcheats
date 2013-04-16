<?php
require('DBaccess.php');

function getRecipeImpl ( $recipeId ) {
    $dba = new DBaccess();
    $query = "SELECT * FROM RECIPE WHERE RecipeId = '$recipeId' ;";
    $result = $dba->doSelect($query);

    $queryIngredients = "SELECT i.IngName, i.IngPhoto, i.Kcal, c.Amount 
                            FROM CONTAINS c JOIN INGREDIENT i on c.IngredientId = i.ingredientId 
                            WHERE c.RecipeId = '$recipeId' ;";
    $result[0]['Ingredients'] = $dba->doSelect($queryIngredients);
    
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

function searchRecipe ( $keywords, $page ) {
    $dba = new DBaccess();
    $keywords = explode(' ', $keywords);
    $keywordsToSearch = array();
    $searchParams = [recname, recdescription, preparation, presentation];

    $query = "SELECT RecipeId, RecName, RecDescription, RecPhoto
                FROM RECIPE
                WHERE   (";
    foreach ($searchParams as $param){
        foreach ($keywords as $term) {
            $query = $query." ".$param." LIKE '%".$term."%' AND";
        }
        $query = substr($query, 0, strlen($query)-3);
        $query = $query.") OR (";
    }
    $query = substr($query, 0, strlen($query)-4);
    $query = $query."LIMIT ".($page * 10)." , ".(($page + 1) * 10).";";

    $result = $dba->doSelect($query);

    returnJSON($result);
}

function returnJSON ($return) {
    if ($return == false) {
        echo $_GET['callback'].json_encode(false);
    } else {
        echo $_GET['callback'].json_encode($return, JSON_UNESCAPED_UNICODE);
    }
}

?>
