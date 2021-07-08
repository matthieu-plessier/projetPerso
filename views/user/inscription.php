<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    
    <title>Formulaire d'inscription au site comme à la maison</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="container-fluid " id="navbarText">
            <img src="/public/img/logo.png" alt="logo comme à la maison" width="150px" height="150px">
            <a class="navbar-brand ms-3" href="#" id="navBarText">Comme à la maison</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav  me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link  ms-5 me-2" aria-current="page" href="#">Pour la maison</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="#">Pour moi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="#">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Connection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Dites nous qui vous êtes :</h1>
    <div class="registration">
        <div class="textRegistration">
            <h2>Pourquoi s'inscrire ?</h2><br>
            <p><br>
                Vous souhaitez :
                <ul><br>
                    <li>Consommer responsable ?</li>
                    <li>Echanger des produits "fait maison" ?</li>
                    <li>Rencontrer des personnes aux mêmes centres d'intérêts ?</li>
                    <li>Partager vos connaissances et votre savoir faire ?</li>
                    <li>Découvrir une nouvelle manière de consommer ?</li>
                </ul><br>
                Dans ce cas, plus de temps à perdre.<br>
                Remplissez le formulaire ci-joint et rejoignez notre grande famille, "Comme à la maison" !
            </p>
        </div>
        
        <div class="form">
            <h2>Lancez-vous !</h2>
            <form>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Monsieur
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Madame
                    </label>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Votre nom* :</label>
                    <input 
                        type="text" 
                        class="form-control"
                        title="Veuillez entrer un nom sans chiffres"
                        id="lastname" 
                        name="lastname"
                        autocomplete="family-name"
                        placeholder="Entrez votre nom">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Votre prénom* :</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="surnameRegistration">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Votre adresse mail* :</label>
                    <input type="email" class="form-control" id="emailregistration" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="nickname " class="form-label">Votre pseudo* :</label>
                    <input type="text" class="form-control" id="nicknameRegistration">
                </div>
                <div class="mb-3">
                    <label for="password " class="form-label">Votre mot de passe * :</label>
                    <input type="password" class="form-control" id="passwordRegistration">
                </div>
                <div class="mb-3">
                    <label for="password " class="form-label">Confirmation de votre mot de passe* :</label>
                    <input type="password" class="form-control" id="confirmPasswordRegistration">
                </div>
                
                <button type="button" class="btn btn-success">Envoyé</button>
            </form>
        </div>
    </div>

    
</body>
</html>