<?php
    session_start();
    include(dirname(__FILE__).'/views/templates/header.php');
?>
<!-- FIN NAVBAR -->

<div class="main">
    <div class="card text-center ms-md-5" style="width: 18rem;">
        <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title">Pour proposer vos produits c'est ici !</h5>

            <a href="#" class="btn btnPropose " data-bs-toggle="modal" data-bs-target="#exampleModal">Proposer</a>
            <a href="#" class="btn btnPropose2 mt-2">Comment ca marche</a>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proposer votre produit</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>Remplissez le formulaire ci-dessous pour ajouter votre produit au magasin</div><br>
                <label for="nickname" type="text" class="form-label">Votre pseudo</label>
                <input class="form-control" type="text" placeholder="Pseudo" aria-label="default input example">
                <br>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ajouter une image</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <br>
                <label for="nickname" type="text" class="form-label">Quel type de produit proposez-vous </label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Catégorie de produit</option>
                    <option value="1">Produit pour le corps </option>
                    <option value="2">Produit pour la maison</option>
                </select>
                <br>
                <div class="input-group">
                    <span class="input-group-text">Un petit commentaire ?</span>
                    <textarea class="form-control" aria-label="text"></textarea>
                </div>
                <br>
                <div>Merci pour votre contribution !</div><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-outline-success">Proposer !</button>
            </div>
        </div>
    </div>
</div>


<?php

    include(dirname(__FILE__).'/views/templates/footer.php');

?>