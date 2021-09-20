<?php
require_once(dirname(__FILE__) . '/../models/users.php');

// Nettoyage de l'id du user passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*********************************************************/

// Suppression du user, et de toutes ses recettes. Une contrainte ON DELETE CASCADE, permet de supprimer tous les
// enregistrements de recettes également.  
$code = intval(User::delete($id));

// On redirige vers la page d'acceuil avec un code pour le message
header('location: /views/index.php?msgCode='.$code);
/*************************************************************/