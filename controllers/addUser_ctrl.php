<?php
session_start();

include(dirname(__FILE__).'/../utils/regex.php');
include(dirname(__FILE__).'/../models/users.php');

// Initialisation du tableau d'erreurs
$errorsArray = array();
$code = null;
/*************************************/

//On ne controle que s'il y a des données envoyées

if($_SERVER["REQUEST_METHOD"] == "POST"){

// Lastname : Nettoyage et validation

    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if(!empty($lastname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$lastname);
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if(!$testRegex){
            $errorsArray["lastname"] = "Le nom n'est pas au bon format"; 
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if(strlen($lastname)<=1 || strlen($lastname)>=70){
                $errorsArray["lastname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $errorsArray["lastname"] = "Vous devez entrer un nom";
    }

// firstname : Nettoyage et validation

    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$firstname);
        if(!$testRegex){
            $errorsArray["firstname"] = "Le prénom n'est pas au bon format!!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=70){
                $errorsArray["firstname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }else { // Pour les champs obligatoires, on retourne une erreur
        $errorsArray["firstname"] = "Vous devez entrer un prénom";
    }

// email : Nettoyage et validation

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if(!empty($email)){
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$testEmail){
            $errorsArray["email"] = "L'adresse email n'est pas au bon format!!"; 
        }
    } else {
        $errorsArray["email"] = "L'adresse mail est obligatoire!!"; 
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

// Si aucune erreur, on enregistre en BDD
if(empty($errorsArray)){
    $user = new User('', $lastname, $firstname, $email, $password,'','','',0,'','',1 );
    $code = $user->create();

}

}

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/user/addUser.php');

include(dirname(__FILE__).'/../views/templates/footer.php');