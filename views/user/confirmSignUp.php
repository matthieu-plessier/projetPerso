<?php if($isRegistered){ ?>



<h1 class="text-white">Félicitation ...</h1>

<div class="container">
    <div class="row">
        <div class="congratulation col"></div>
        <div class="textCongratulation col">
            <h4>... et merci !</h4>
            <p>Toute l'équipe de "Comme à la maison" vous remercie pour votre confiance, apportant ainsi votre précieux
                soutien à notre démarche de construire ensemble le monde de demain. Un monde où l'écoconception, les
                produits verts, bio ou issus du commerce équitable serait la priorité.</p><br>
                <hr><br>
            <p>Vous pouvez dès maintenant échanger vos produits en cliquant sur le lien suivant :</p>
            <a href="/../index.php">Accueil</a>
        </div>
    </div>

</div>
</div>

<?php }else{?>


    <h1 class="text-white">Zut ...</h1>

<div class="container">
    <div class="row">
        <div class="congratulation col"></div>
        <div class="textCongratulation col">
            <h4>... nous avons recontré un problème</h4>
            <p>Nous vous invitons à renouveler la procédure d'inscription en cliquant sur le lien suivant :</p><br>
            <br>
            <a href="/../index.php">Accueil</a>
        </div>
    </div>

</div>
</div>
<?php }?>