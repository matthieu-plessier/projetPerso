<?php
session_start();

include dirname(__FILE__).'/../models/users.php';

$email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
$passwordPost = isset($_POST['password']) ? $_POST['password'] : '';

$user = User::getByEmail($email);

if($user){
    $isPasswordOk = password_verify($passwordPost, $user->password);
    if($isPasswordOk){
        //On connecte le user
        $_SESSION['user'] = $user;
        header('location: /index.php');
        exit;
    }else{
        header('location: /index.php?code=19');
        exit;
    }
}else{
    header('location: /index.php?code=19');
}