<?php

session_start();

require_once(dirname(__FILE__).'/../models/users.php');
require_once(dirname(__FILE__).'/../models/recipes.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../config/config.php');

$code = NULL;
$title ="Votre profil";

// On récup l'ID en GET
$id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
$resultCheckUser = trim(filter_input(INPUT_POST,'resultCheckUser',FILTER_SANITIZE_NUMBER_INT));


if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    // Lastname : Nettoyage et validation
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if(!empty($lastname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$lastname);
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if(!$testRegex){
            $error["lastname"] = "Le nom n'est pas au bon format !!"; 
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if(strlen($lastname)<=1 || strlen($lastname)>=70){
                $error["lastname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un nom !!";
    }

    // firstname : Nettoyage et validation
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$firstname);
        if(!$testRegex){
            $error["firstname"] = "Le prénom n'est pas au bon format !!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=70){
                $error["firstname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un prénom !!";
    }

    // email : Nettoyage et validation
    $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if(!empty($email)){
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$testEmail){
            $error["mail"] = "L'adresse email n'est pas au bon format !!"; 
        }
    } else {
        $error["mail"] = "L'adresse mail est obligatoire !!"; 
    }

// Password : validation

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if (empty($password1)) {
    $errorsArray['password1'] = 'Le mot de passe est obligatoire';
}
if (empty($password2)) {
    $errorsArray['password2'] = 'Le mot de passe est obligatoire';
}
if($password1!=$password2){
    $errorsArray['password'] = 'Les mots de passe sont différents';
} else {
    $password = password_hash($password1, PASSWORD_DEFAULT);
}

// Récup le patient dans la BD
if (!$resultCheckUser) {
    $code = 10;
}

}
$recipes = Recipe::getRecipe($_SESSION['user']->id);

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/user/profil-user.php');

include(dirname(__FILE__).'/../views/templates/footer.php');