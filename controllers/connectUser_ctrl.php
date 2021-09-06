<?php

include(dirname(__FILE__).'/../utils/regex.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

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

include(dirname(__FILE__).'/../views/connectUser.php');

include(dirname(__FILE__).'/../views/templates/footer.php');