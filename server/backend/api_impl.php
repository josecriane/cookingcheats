<?php
require('DBaccess.php');

function getRecipeImpl ( $RecipeId ) {
	error_log($RecipeId);
    $dba = new DBaccess();
    error_log($dba);
    $query = "SELECT * FROM RECIPE WHERE RecipeId = '$RecipeId' ;";
    $result = $dba->doSelect($query);
    
    if ($result == false) {
    	echo $_GET['callback'].'('.json_encode(false).')';
    } else {

    	echo $_GET['callback'].'('.json_encode($result, JSON_UNESCAPED_UNICODE).')';
    }
}

?>
