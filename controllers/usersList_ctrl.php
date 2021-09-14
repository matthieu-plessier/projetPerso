<?php

session_start();
require_once(dirname(__FILE__).'/../models/users.php');

$users = User::findAll();

if (is_array($users)) {
    //Pour avoir date dans le bon sens

    foreach($users as $user):
        $birth = $user->birthdate;
        $timeStamp = strtotime($birth);
        $newDate = date("d-m-Y",$timeStamp);
        $user->birthdate = $newDate;
    endforeach;
    
}else{
    $error = "wrong";

}
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/user/userList.php');

include(dirname(__FILE__).'/../views/templates/footer.php');







