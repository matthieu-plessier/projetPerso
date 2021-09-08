
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="formUser">

    <h1>Dites nous qui vous êtes :</h1>
    <div class="registration">
        
        <div class="textRegistration">
            <h2>Pourquoi s'inscrire ?</h2>
            <p><br>
                Vous souhaitez :
                <ul>
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
                        pattern="<?=REGEX_STR_NO_NUMBER?>"
                    >
                    <div class="error"><?=$error['lastname'] ?? ''?></div>
                </div>
                
            <!-- PRENOM -->

                <div class="mb-3">
                    <label for="firstname" class="form-label">Votre prénom :</label>
                    <input 
                        type="text" 
                        name="firstname"
                        placeholder="Entrez votre prénom"
                        class="form-control  <?=isset($error['firstname']) ? 'errorField' : ''?>" 
                        value="<?=htmlentities($firstname ?? '') ?>"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="70"
                        pattern="<?=REGEX_STR_NO_NUMBER?>"
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
                        pattern="<?=REGEX_EMAIL?>"
                        placeholder="name@example.com">
                <div class="error"><?=$error['email'] ?? ''?></div>
                </div>

                
            <!-- MOT DE PASSE -->

                <div class="mb-3">
                    <label for="password " class="form-label">Votre mot de passe * :</label>
                    <input 
                        type="password" 
                        name="password1"
                        class="form-control <?=isset($error['password']) ? 'errorField' : ''?>" 
                        value="<?=htmlentities($password ?? '') ?>"
                        autocomplete="password"
                        id="password1">
                </div>

            <!-- CONFIRMATION DE MOT PASSE -->

                <div class="mb-3">
                    <label for="confirmPassword " class="form-label">Confirmation de votre mot de passe* :</label>
                    <input 
                    type="password" 
                    name="password2"
                    value="<?=htmlentities($password ?? '') ?>"
                    class="form-control <?=isset($error['password']) ? 'errorField' : ''?>" 
                    id="password2">
                </div>
                
                <button type="submit" class="btn btn-success">Envoyé</button>
            </form>
        </div>
    </div>
<script src="/public/js/checkPass.js"></script>
