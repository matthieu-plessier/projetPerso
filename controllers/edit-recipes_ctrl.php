<?php

session_start();

require_once(dirname(__FILE__) . '/../utils/regex.php');
require_once(dirname(__FILE__) . '/../models/recipes.php');
require_once(dirname(__FILE__) . '/../models/ingredients.php');
require_once(dirname(__FILE__) . '/../config/config.php');

$code = null;
$title ="Modification de la recette";
// --------------------------------- ICI ON RECUPERE LES RECETTES PAR USER ---------------------------------------------



/*************************************************************/



// -------------------------- -------AFFICHAGE DES VUES ----------------------------------------------------------------

$recipes = Recipe::getRecipe($_SESSION['user']->id);


include(dirname(__FILE__).'/../views/templates/header.php');


include(dirname(__FILE__).'/../views/products-recipes/edit-recipes.php');

include(dirname(__FILE__).'/../views/templates/footer.php');