<h1 class="text-white">Nos recettes Beauté</h1>

<div class="bodyRecipes">


    <div class="row row-cols-1 row-cols-md-3 g-4 m-0" id="recipesPage">
    <?php foreach($recipes as $recipe) : 
        $ingredientArray = Ingredient::get($recipe->id);
        ?>

        <div class="col" id="recipesCard<?= $recipe->id ?>">
            <div class="card">
                <img src="/uploads/recipes/<?= $recipe->id ?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$recipe->name ?? '' ?></h5>
                    <p class="card-text"><?=$recipe->process_comment ?? '' ?></p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?= $recipe->id ?>">Voir la recette</button>
                </div>

            </div>
        </div>
        <!-- MODAL RECETTE -->
        <div class="modal fade" id="exampleModal<?= $recipe->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $recipe->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?= $recipe->id ?>"><?= $recipe->name?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <img src="/uploads/recipes/<?= $recipe->id ?>.jpg" alt="" width="150">
                        <h5>Liste des ingrédients :</h5>
                        <ul>
                            <?php foreach($ingredientArray as $ingredientObject) : ?>
                                <li><?= $ingredientObject->quantity?> <?= $ingredientObject->ingredient ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <h5>Préparation :</h5>
                        <p>
                        <?= $recipe->process_comment?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Sauvegarder cette recette</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        

    </div>
</div>



