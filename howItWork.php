<?php
    session_start();
    include(dirname(__FILE__).'/views/templates/header.php');
?>
<h1 class="text-white">Comment ca marche ...</h1>

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="howItWorkImg col-10 col-md-5 d-none d-md-block"></div>
        <div class="howItWorkText col-10 col-md-5 h-100">
            <h3>... et bien très simplement en fait !</h3>
            <br>
            <p>
                Vous souhaitez avoir une consommation plus responsable, avec des produits plus sains, mais malheureusement vous ne pouvez pas préparer vous-même tous ces produits ?
            </p>
            <p>
                Vous fabriquez vous-même vos produits ? Vous connaissez des recettes, des petits "trucs de grand-mère" que vous aimeriez partager ?
            </p>
            <p>
                "Comme à la maison" est le point de rencontre de ces deux profils, une plateforme d'échange de produits et de conseils. Une réunion entre amis où l'on peut troquer ses produits "faits maison", donner son avis sur une recette, etc ...
            </p>
            <p>
                N'attendez plus ! Rejoignez-nous et partagez votre expérience entre amis ! 
            </p>
        </div>
    </div>
</div>









<?php

    include(dirname(__FILE__).'/views/templates/footer.php');

?>