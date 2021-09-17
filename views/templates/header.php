<?php
require_once(dirname(__FILE__).'/../../models/users.php');
if(!empty($_SESSION)){
    $resultCheckUser = User::checkUser($_SESSION['user']->id);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Projet perso comme à la maison vente de produit fait maison</title>
</head>

<body>
    <!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">

            <div class="container-fluid " id="navbarText">

                <a class="navbar-brand ms-3" href="/index.php" id="navBarText">Comme à la maison</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll text-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Nos produits
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/products_ctrl.php">Pour le corps</a></li>
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/products_ctrl.php">Pour la maison</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Les recettes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/recipes_ctrl.php">Pour le corps</a></li>
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/recipes_ctrl.php">Pour la maison</a></li>
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/addRecipe_ctrl.php">Proposer une recette</a></li>

                            </ul>
                        </li>
                        <?php
                            if(empty($_SESSION['user'])){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Connexion/Inscription
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="nav-link me-2" aria-current="page" data-bs-toggle="modal" href="#"
                                        data-bs-target="#connectUser">Connexion</a></li>
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/addUser_ctrl.php">Inscription</a></li>

                            </ul>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item dropdown ms-3 fw-bold">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$_SESSION['user']->firstname?> <?=$_SESSION['user']->lastname?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a href="../../controllers/profil-user_ctrl.php" class="nav-link me-2" aria-current="page">Profil</a></li>
                                <li><a class="nav-link me-2" aria-current="page"
                                        href="/controllers/disconnectUser_ctrl.php">Déconnexion</a></li>

                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ///////////////////////////////////////// MODAL DE CONNECTION ///////////////////////////////////////////////// -->

        <div class="modal fade" id="connectUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/controllers/connectUser_ctrl.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="mail" class="form-label">Votre mail :</label>
                                <input type="text" name="mail"
                                    class="form-control <?=isset($error['mail']) ? 'errorField' : ''?>"
                                    value="<?=htmlentities($mail ?? '') ?>" autocomplete="mail"
                                    placeholder="ex : johndoe@exemple.com" pattern="<?=REGEX_EMAIL?>" id="mail">
                                <div class="error"><?=$error['mail'] ?? ''?></div>
                            </div>

                            <!-- MOT DE PASSE -->
                            <div class="mb-3">
                                <label for="password " class="form-label">Votre mot de passe :</label>
                                <input type="password" name="password"
                                    class="form-control <?=isset($error['password']) ? 'errorField' : ''?>"
                                    value="<?=htmlentities($password ?? '') ?>" 
                                    placeholder="ex : 123abc456" autocomplete="new-password" id="password">
                            </div>
                            <div class="error"><?=$error['password'] ?? ''?></div>
                        </div>
                        <div class="modal-footer">
                            <p><a href="">J'ai oublié mon mot de passe.</a></p>
                            <button type="submit" class="btn btn-primary">Valider</button>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </header>