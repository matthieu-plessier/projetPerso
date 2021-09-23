<?php
session_start();
require_once(dirname(__FILE__) . '/../models/users.php');

// Nettoyage de l'id du user passé en GET dans l'url
/*********************************************************/
// Suppression du user, et de toutes ses recettes. Une contrainte ON DELETE CASCADE, permet de supprimer tous les
// enregistrements de recettes également. 
$code = User::delete($_SESSION['user']->id); 
unset($_SESSION['user']);
// $code = intval(User::delete($id));

// On redirige vers la page d'acceuil avec un code pour le message
header('location: /index.php?code='.$code);
/*************************************************************/