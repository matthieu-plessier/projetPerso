<?php

include(dirname(__FILE__).'/../utils/regex.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

// mail : validation
// Password : validation

if (!empty($password)) {
    $testRegex = preg_match('/'.REGEX_PASSWORD.'/',$password);
    
}








}

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/connectUser.php');

include(dirname(__FILE__).'/../views/templates/footer.php');