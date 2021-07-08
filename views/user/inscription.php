<?php

    include(dirname(__FILE__).'/../templates/header.php');

?>

<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="formUser">

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

            <!-- CIVILITE -->

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

            <!-- NOM -->

                <div class="mb-3">
                    <label for="lastname" class="form-label">Votre nom* :</label>
                    <input 
                        type="text" 
                        name="lastname"
                        id="lastname" 
                        title="Veuillez entrer un nom sans chiffres"
                        placeholder="Entrez votre nom"
                        class="form-control <?=isset($error['lastname']) ? 'errorField' : ''?>"
                        autocomplete="family-name"
                        value="<?=htmlentities($lastname ?? '') ?>"
                        minlength="2"
                        maxlength="70"
                        required
                        pattern="<?=REGEXP_STR_NO_NUMBER?>"
                    >
                    <div class="error"><?=$error['lastname'] ?? ''?></div>
                </div>
                
            <!-- PRENOM -->

                <div class="mb-3">
                    <label for="firstname" class="form-label">Votre prénom :</label>
                    <input 
                        type="text" 
                        name="firstname"
                        class="form-control  <?=isset($error['firstname']) ? 'errorField' : ''?>" 
                        value="<?=htmlentities($firstname ?? '') ?>"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="70"
                        pattern="<?=REGEXP_STR_NO_NUMBER?>"
                        id="firstname">
                </div>

            <!-- MAIL -->

                <div class="mb-3">
                    <label for="email" class="form-label">Votre adresse mail* :</label>
                    <input 
                        type="email" 
                        name="email"
                        value="<?=htmlentities($email ?? '') ?>"
                        class="form-control  <?=isset($error['email']) ? 'errorField' : ''?>" 
                        id="email" 
                        autocomplete="email"
                        placeholder="name@example.com">
                <div class="error"><?=$error['email'] ?? ''?></div>
                </div>

            <!-- PSEUDO -->

                <div class="mb-3">
                    <label for="nickname " class="form-label">Votre pseudo* :</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="nicknameRegistration">
                </div>
                
            <!-- MOT DE PASSE -->

                <div class="mb-3">
                    <label for="password " class="form-label">Votre mot de passe * :</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="passwordRegistration">
                </div>

            <!-- CONFIRMATION DE PASSE -->

                <div class="mb-3">
                    <label for="password " class="form-label">Confirmation de votre mot de passe* :</label>
                    <input type="password" class="form-control" id="confirmPasswordRegistration">
                </div>
                
                <button type="submit" class="btn btn-success">Envoyé</button>
            </form>
        </div>
    </div>

    
    <?php

include(dirname(__FILE__).'/../templates/footer.php');

?>
