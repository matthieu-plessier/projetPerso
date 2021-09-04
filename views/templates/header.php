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
                                <li><a class="nav-link me-2" aria-current="page" href="/products.php">Pour le corps</a></li>
                                <li><a class="nav-link me-2" aria-current="page" href="/products.php">Pour la maison</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Nos recettes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="nav-link me-2" aria-current="page" href="/recipes.php">Pour le corps</a></li>
                                <li><a class="nav-link me-2" aria-current="page" href="/recipes.php">Pour la maison</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" aria-current="page"
                                href="/controllers/addUser_controller.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="/contrllers/connectUser_controller.php">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>