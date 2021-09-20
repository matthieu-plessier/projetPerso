
<div class="bodyRecipes">

    <h1 class="text-white">Nos recettes Beauté</h1>

    <div class="row row-cols-1 row-cols-md-4 m-0 pt-5" id="recipesPage">
        <?php foreach($recipes as $recipe) : 
        $ingredientArray = Ingredient::get($recipe->id);
        $user = User::get($recipe->id_user);
        ?>

        <div class="col mb-5 mb-lg-0 d-flex justify-content-center" id="recipesCard<?= $recipe->id ?>">
            <div class="card" style="width: 20rem;">
                <img src="/uploads/recipes/<?= $recipe->id ?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <i>Proposé par : <?= $user->lastname.' '.$user->firstname?></i>
                    <h5 class="card-title"><?=$recipe->name ?? '' ?></h5>
                    
                    <p class="card-text text-truncate"><?=$recipe->process_comment ?? '' ?></p>
                    <button type="button" class="btn btnPropose" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?= $recipe->id ?>">Voir la recette</button>
                </div>

            </div>
        </div>
        <!-- MODAL RECETTE -->
        <div class="modal fade" id="exampleModal<?= $recipe->id ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel<?= $recipe->id ?>" aria-hidden="true">
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
                        <button type="button" class="btn btnPropose">Sauvegarder cette recette</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <nav class="w-100 d-flex align-items-center justify-content-center">
            <ul class="pagination pagination-sm m-0">
                <?php
                for($i=1;$i<=$nbPages;$i++){
                if($i==$currentPage){ ?>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        <?=$i?>
                        <span class="visually-hidden">(current)</span>
                    </span>
                </li>
                <?php } else { ?>
                <li class="page-item"><a class="page-link" href="?currentPage=<?=$i?>&s=<?=$s?>&type=<?=$type?>"><?=$i?></a></li>
                <?php } 
            }?>
            </ul>
        </nav>
    </div>
    
</div>
