<?php

session_start();
require_once(dirname(__FILE__).'/../models/recipes.php');
require_once(dirname(__FILE__).'/../models/ingredients.php');

$title ="Les recettes";

$s = trim(filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING));
$type = intval(trim(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT)));
if ($type < 1 || $type>2) {
    header('location: /index.php');
    exit;
}
// On définit le nombre d'éléments par page grâce à une constante déclarée dans config.php
$limit = NB_ELEMENTS_BY_PAGE;

// Compte le nombre d'éléments au total selon la recherche
$countItems = Recipe::count($s, $type);

// Calcule le nombre de pages à afficher dans la pagination
$nbPages = ceil($countItems / $limit);

// A recuperer depuis paramètre d'url. Si aucune valeur, alors vaut 1
$currentPage = intval(trim(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT)));

if($currentPage <= 0 || $currentPage > $nbPages){
    $currentPage = 1;
}

//Définit à partir de quel enregistrement positionner le curseur (l'offset) dans la requête
$offset = $limit*($currentPage-1);

// Appel à la méthode statique permettant de récupérer les patients selon la recherche et la pagination
$recipes = Recipe::getAll($s,$limit,$offset, $type);

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/recipes.php');

include(dirname(__FILE__).'/../views/templates/footer.php');