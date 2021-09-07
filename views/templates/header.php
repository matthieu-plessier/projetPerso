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
                                <li><a class="nav-link me-2" aria-current="page" href="/controllers/products_ctrl.php">Pour le corps</a></li>
                                <li><a class="nav-link me-2" aria-current="page" href="/controllers/products_ctrl.php">Pour la maison</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Nos recettes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="nav-link me-2" aria-current="page" href="/controllers/recipes_ctrl.php">Pour le corps</a></li>
                                <li><a class="nav-link me-2" aria-current="page" href="/controllers/recipes_ctrl.php">Pour la maison</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" aria-current="page"
                                href="/controllers/addUser_ctrl.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#connectUser"
                                href="/controllers/connectUser_ctrl.php">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="connectUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" alt="" width="50">
                <div class="mb-3">
                    <label for="mail" class="form-label">Votre mail :</label>
                    <input 
                        type="text" 
                        name="mail"
                        class="form-control <?=isset($error['mail']) ? 'errorField' : ''?>" 
                        value="<?=htmlentities($mail ?? '') ?>"
                        autocomplete="mail"
                        placeholder="ex : johndoe@exemple.com"
                        pattern="<?=REGEX_EMAIL?>"
                        id="mail">
                <div class="error"><?=$error['mail'] ?? ''?></div>
                </div>
                
            <!-- MOT DE PASSE -->

                <div class="mb-3">
                    <label for="password " class="form-label">Votre mot de passe :</label>
                    <input 
                        type="password" 
                        name="password"
                        class="form-control <?=isset($error['password']) ? 'errorField' : ''?>" 
                        value="<?=htmlentities($password ?? '') ?>"
                        pattern="<?=REGEX_PASSWORD?>"
                        placeholder="ex : 123abc456"
                        autocomplete="new-password"
                        id="password">
                </div>
            </div>
            <div class="modal-footer">
                <p><a href="">J'ai oublié mon mot de passe.</a></p>
                <button type="button" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </div>
</div>

    </header>