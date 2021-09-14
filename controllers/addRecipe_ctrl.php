<?php
session_start();

include(dirname(__FILE__).'/../utils/regex.php');
include(dirname(__FILE__).'/../models/recipes.php');
include(dirname(__FILE__).'/../models/ingredients.php');


// Initialisation du tableau d'erreurs
$errorsArray = array();
$code = null;
/*************************************/

//On ne controle que s'il y a des données envoyées

if($_SERVER["REQUEST_METHOD"] == "POST"){




}



















include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/addRecipe.php');

include(dirname(__FILE__).'/../views/templates/footer.php');