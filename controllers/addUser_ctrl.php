<?php

include(dirname(__FILE__).'/../utils/regex.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

// Lastname : Nettoyage et validation
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if(!empty($lastname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$lastname);
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if(!$testRegex){
            $error["lastname"] = "Le nom n'est pas au bon format"; 
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if(strlen($lastname)<=1 || strlen($lastname)>=70){
                $error["lastname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un nom";
    }

// firstname : Nettoyage et validation
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$firstname);
        if(!$testRegex){
            $error["firstname"] = "Le prénom n'est pas au bon format!!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=70){
                $error["firstname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }
// email : Nettoyage et validation
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if(!empty($email)){
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$testEmail){
            $error["email"] = "L'adresse email n'est pas au bon format!!"; 
        }
    } else {
        $error["email"] = "L'adresse mail est obligatoire!!"; 
    }

// Pseudo : Nettoyage et validation
    $nickname = trim(filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($nickname)){
        $testRegex = preg_match('/'.REGEX_PSEUDO.'/',$nickname);
        if(!$testRegex){
            $error["nickname"] = "Le pseudo n'est pas au bon format!!"; 
        } else {
            if(strlen($nickname)<=1 || strlen($nickname)>=70){
            $error["nickname"] = "La longueur de chaine n'est pas bonne";
        }
    }
    }
// Password : validation
    
    if (!empty($password)) {
        $testRegex = preg_match('/'.REGEX_PASSWORD.'/',$password);
        
    }








}

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/user/addUser.php');

include(dirname(__FILE__).'/../views/templates/footer.php');