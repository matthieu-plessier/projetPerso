<?php

session_start();
require_once(dirname(__FILE__).'/../models/users.php');


$users = User::findAll();


include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/user/userList.php');

include(dirname(__FILE__).'/../views/templates/footer.php');







