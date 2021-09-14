<?php

session_start();
require_once(dirname(__FILE__).'/../models/recipes.php');
require_once(dirname(__FILE__).'/../models/ingredients.php');



$recipes = Recipe::findAll();

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/recipes.php');

include(dirname(__FILE__).'/../views/templates/footer.php');