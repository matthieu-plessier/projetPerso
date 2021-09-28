<?php
session_start();
require_once(dirname(__FILE__) . '/../utils/regex.php');
require_once(dirname(__FILE__) . '/../models/users.php');
require_once(dirname(__FILE__) . '/../config/config.php');

$code = NULL;

// ---------------------------------- ICI ON RECUPERE LE PROFIL USER ---------------------------------------------------

$resultCheckUser = User::checkUser($_SESSION['user']->id);
// Initialisation du tableau d'erreurs
$errorsArray = array();
/*************************************/

$id = $resultCheckUser->id;

// Nettoyage de l'id passé en GET dans l'url
//$id = intval(trim(filter_input(INPUT_GET, FILTER_SANITIZE_NUMBER_INT)));
/*************************************************************/

//On ne controle que s'il y a des données envoyées 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // lastname
    // On verifie l'existance et on nettoie
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if (!empty($lastname)) {
        // On test la valeur
        $testRegex = preg_match('/' . REGEX_STR_NO_NUMBER . '/', $lastname);

        if ($testRegex == false) {
            $errorsArray['name_error'] = 'Merci de choisir un nom valide';
        }
    } else {
        $errorsArray['name_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************

    // FIRSTNAME
    // On verifie l'existance et on nettoie
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if (!empty($firstname)) {
        // On test la valeur
        $testRegex = preg_match('/' . REGEX_STR_NO_NUMBER . '/', $firstname);

        if ($testRegex == false) {
            $errorsArray['firstname_error'] = 'Le prénom n\'est pas valide';
        }
    } else {
        $errorsArray['name_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************

    // EMAIL
    // On verifie l'existance et on nettoie
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    //On test si le champ n'est pas vide
    if (!empty($mail)) {
        // On test la valeur
        $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);

        if ($testMail == false) {
            $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
        }
    } else {
        $errorsArray['mail_error'] = 'Le champ est obligatoire';
    }
    // *******************************************************************

    //PASSWORD
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (empty($password1)) {
        $errorsArray['password1'] = 'Le mot de passe est obligatoire';
    }
    if (empty($password2)) {
        $errorsArray['password2'] = 'Le mot de passe est obligatoire';
    }
    if ($password1 != $password2) {
        $errorsArray['password'] = 'Les mots de passe sont différents';
    } else {
        $password = password_hash($password1, PASSWORD_DEFAULT);
    }
  
    // Si il n'y a pas d'erreurs, on met à jour le user.
    if (empty($errorsArray)) {

        $user = new User($resultCheckUser->id, $lastname, $firstname, $mail, $password);

        $result = $user->update();

        if ($result === true) {
            header('location: /controllers/profil-user_ctrl.php?messageCode=3');
        } else {
            // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
            $msgCode = $result;
        }
    }
} else {
    $user = User::get($id);
    // Si le user n'existe pas, on redirige vers la liste complète avec un code erreur
    if ($user) {
        $id = $user->id;
        $lastname = $user->lastname;
        $firstname = $user->firstname;
        $email = $user->email;
        $password1 = $user->password1;
        $password2 = $user->password2;
    } else {
        header('location: /controllers/profil-user_ctrl.php?msgCode=3');
    }

    /*************************************************************/
}
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/user/profil-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
