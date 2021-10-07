<?php if($isRegistered){ ?>
    <h1 class="text-white">Félicitation ...</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="congratulation d-none d-md-block col-10 col-md-5"></div>
            <div class="textCongratulation col-10 col-md-5">
                <h4>... et merci !</h4>
                <p>Toute l'équipe de "Comme à la maison" vous remercie pour votre confiance, apportant ainsi votre précieux
                    soutien à notre démarche de construire ensemble le monde de demain. Un monde où l'écoconception, les
                    produits verts, bio ou issus du commerce équitable seraient la priorité.</p><br>
                    <hr><br>
                <p>Vous pouvez dès maintenant échanger vos produits en cliquant sur le lien suivant :</p>
                <a href="/../index.php">Accueil</a>
            </div>
        </div>
    </div>
<?php }else{?>
    <h1 class="text-white">Zut ...</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="congratulation d-none d-md-block col-10 col-md-5"></div>
            <div class="textCongratulation col-10 col-md-5">
                <h4>... nous avons rencontré un problème</h4>
                <p>Nous vous invitons à renouveler la procédure d'inscription en cliquant sur le lien suivant :</p><br>
                <br>
                <a href="/../index.php">Accueil</a>
            </div>
        </div>
    </div>
<?php }?>