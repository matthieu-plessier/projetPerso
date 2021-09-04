<?php

    include(dirname(__FILE__).'/views/templates/header.php');

?>
<h1>Nos recettes Beauté</h1>
<div class="bodyRecipes">
    <div class="row row-cols-1 row-cols-md-3 g-4 m-0" id="recipesPage">
        <div class="col" id="recipesCard">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">recette 1</h5>
                    <p class="card-text">Présentation du produit </p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Voir la recette</button>
                </div>

            </div>
        </div>

        <div class="col" id="recipesCard">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Recette 2</h5>
                    <p class="card-text">Présentation du produit </p>
                    <a href="#" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>

        <div class="col" id="recipesCard">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Recette 3</h5>
                    <p class="card-text">Présentation du produit</p>
                    <a href="#" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>

        <div class="col" id="recipesCard">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Recette 4</h5>
                    <p class="card-text">Présentation du produit </p>
                    <a href="#" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>
        <div class="col" id="recipesCard">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Recette 5</h5>
                    <p class="card-text">Présentation du produit</p>
                    <a href="#" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>

        <div class="col" id="recipesCard">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Recette 6</h5>
                    <p class="card-text">Présentation du produit </p>
                    <a href="#" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- MODAL RECETTE -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titre de la recette</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" alt="" width="50">
                <h5>Liste des ingrédients :</h5>
                <ul>
                    <li>...</li>
                    <li>...</li>
                    <li>...</li>
                </ul>
                <h5>Préparation :</h5>
                <p>
                    ...
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sauvegarder cette recette</button>
            </div>
        </div>
    </div>
</div>













<?php

    include(dirname(__FILE__).'/views/templates/footer.php');

?>