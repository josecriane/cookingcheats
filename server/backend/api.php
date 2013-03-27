<?php
	require ('secureVars.php');
	require ('api_impl.php');

	// Interface to api, only accepts "case" methods, and secures parameters
	try {
		$secureVars = new secureVars();
		if(isset($_GET['method'])){
			switch ($_GET['method']) {
				case "getRecipe":
					$RecipeId = $secureVars->secText("RecipeId", 11, REG_DIGIT_UNSIGNED);
		    		
		    		getRecipeImpl($RecipeId);
		    		break;
			}
		}
	} catch (Exception $e) {
		echo "Excepction catch ".$e->getMessage()."\n";
		echo $_GET['callback'].'('.json_encode(false).')';
	}
?>