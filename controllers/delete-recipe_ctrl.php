<?php
require_once(dirname(__FILE__) . '/../models/recipes.php');

// Nettoyage de l'id de la recette passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*********************************************************/
$title ="Supprimer une recette";
$code = Recipe::delete($id);

// On redirige vers la page du profil du patient avec un code pour le message
header('location: /controllers/profil-user_ctrl.php?msgCode='.$code);
/*************************************************************/