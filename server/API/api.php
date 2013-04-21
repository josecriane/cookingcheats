<?php
	require ('secureVars.php');
	require ('api_impl.php');

	// Interface to api, only accepts "case" methods, and secures parameters
	try {
		$secureVars = new secureVars();
		if(isset($_GET['method'])){
			switch ($_GET['method']) {
				case "getRecipe":

					$recipeId = $secureVars->secText("RecipeId", 11, REG_DIGIT_UNSIGNED);
		    		
	    		getRecipe($recipeId);
	    		break;
	    	case "getRecipesByCategory":
	    		$categoryId = $secureVars->secText("CategoryId", 11, REG_DIGIT_UNSIGNED);
					$page = $secureVars->secText("Page", 11, REG_DIGIT_UNSIGNED);

	    		getRecipesByCategory($CategoryId, intval($page));
	    		break;
	    	case "searchRecipe":
	    		$keywords = $secureVars->secText("Keywords", 255, REG_TEXT);
	    		$page = $secureVars->secText("Page", 11, REG_DIGIT_UNSIGNED);

	    		searchRecipe($keywords, intval($page));
	    		break;
	    	case "randomRecipeId":
	    		randomRecipeId("");
	    		break;
	    	case "randomRecipeIdByCategory":
	    		$category = $secureVars->secText("CategoryId", 11, REG_DIGIT_UNSIGNED);

	    		randomRecipeId($category);
	    		break;
			}
		}
	} catch (Exception $e) {
		echo "Excepction catch ".$e->getMessage()."\n"; //Comment this line before deploy.
		echo $_GET['callback'].'('.json_encode(false).')';
	}
?>