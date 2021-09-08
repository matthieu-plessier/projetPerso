<?php

require_once(dirname(__FILE__).'/../models/recipes.php');


$recipes = Recipe::findAll();



include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/recipesList.php');

include(dirname(__FILE__).'/../views/templates/footer.php');