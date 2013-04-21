<?php
require('DBaccess.php');

function getRecipe ( $recipeId ) {
    // This method not use _runQuery, because if it uses _runQuery then
    // it creates two DBacccess objects.

    $dba = new DBaccess();
    $query = "SELECT * FROM RECIPE WHERE RecipeId = '$recipeId' ;";
    $result = $dba->doSelect($query);

    $queryIngredients = "SELECT i.IngredientId, i.IngName, i.IngPhoto, i.Kcal, i.TypeId, c.Amount 
                            FROM CONTAINS c JOIN INGREDIENT i on c.IngredientId = i.ingredientId 
                            WHERE c.RecipeId = '$recipeId' ;";
    $result[0]['Ingredients'] = $dba->doSelect($queryIngredients);
    
    _returnJSON($result);
}

function getRecipesByCategory ( $categoryId, $page ) {
    $query = "SELECT r.RecipeId, RecName, RecDescription, RecPhoto
                FROM RECIPE_CATEGORY rc JOIN RECIPE r ON rc.RecipeId = r.RecipeId
                WHERE rc.CategoryId = '$categoryId'
                LIMIT ".($page * 10)." , ".(($page + 1) * 10).";";
    $result = _runQuery($query);

    _returnJSON($result);
}

function searchRecipe ( $keywords, $page ) {
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

    $result = _runQuery($query);

    _returnJSON($result);
}

function randomRecipeId ( $category ) {
    //Use recipe, because all recipes should have the same probability. 
    $query = "SELECT r.RecipeId FROM RECIPE r";
    if ($category != "") {
        $query = $query." JOIN RECIPE_CATEGORY rc ON r.RecipeId = rc.RecipeId WHERE CategoryId = '$category'";
    }
    $query = $query." ORDER BY RAND() LIMIT 1;";

    $result = _runQuery($query);

    _returnJSON($result);
}



function _runQuery ( $query ) {
    $dba = new DBaccess();
    return $dba->doSelect($query);
}


function _returnJSON ($return) {
    if ($return == false) {
        echo $_GET['callback'].json_encode(false);
    } else {
        echo $_GET['callback'].json_encode($return, JSON_UNESCAPED_UNICODE);
    }
}

?>
