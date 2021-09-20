<h1 class="text-white">Proposez nous vos recettes !</h1>

<div class="container">
    <div class="row">
        <div class="addRecipText col">
            <h3>C'est a vous de jouer !</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <?php 
                    if($code){
                        echo '<div class="text-center m-0 alert'.' '.$messageCode[$code]['type'].' "><img src="https://img.icons8.com/ios-glyphs/32/000000/right.png"/> '.$messageCode[$code]['msg'].' <img src="https://img.icons8.com/ios-glyphs/32/000000/left.png"/></div>';
                    }
                ?>
                <div class="mb-3">
                    <label for="formFile" class="form-label" >Ajouter une image</label>
                    <input class="form-control" type="file" id="formFile" name="formFile">
                    <small class="alert-danger text-center"><?= $errorsArray['file'] ?? '' ?></small>
                </div>
                <div class="col-12">
                    <label for="nameRecipe" class="form-label">Nom de la recette</label>
                    <input type="text" 
                            class="form-control" 
                            id="nameRecipe" 
                            name="nameRecipe" 
                            placeholder="ex : créme pour les mains"
                            pattern="<?=REGEX_STR_NO_NUMBER?>">
                </div>
                <label for="type" class="form-label">Type de produit</label>
                <select class="form-select form-select-lg mb-3" name="type" aria-label=".form-select-lg example">
                    <option selected>Cosmétique ou produits ménager ?</option>
                    <option value="1">Cosmétique</option>
                    <option value="2">Produit ménager</option>
                </select>
                <div class="row g-3">
                    <div class="col-sm-7">
                        <div id="cadreIngredient">
                            <label for="ingredients0" class="form-label">Ingrédients</label>
                            <input type="text" 
                                    class="form-control" 
                                    placeholder="ex : huile de coco" 
                                    name="ingredients0" 
                                    aria-label="ingredients0"
                                    pattern="<?=REGEX_STR_NO_NUMBER?>">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div id="cadreQuantity">
                            <label for="quantity0" class="form-label">Quantité</label>
                            <input type="text" 
                                    class="form-control" 
                                    placeholder="ex : 1L ou 100 grs" 
                                    name="quantity0" 
                                    aria-label="quantity0"
                                    pattern="<?=REGEX_STR_NUMBER_ADDRESS?>">
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <input type="button" class="btn btn-success" style="background-color: #236d5e;" value="+" onclick="plus()" />
                        <input type="button" class="btn btn-success" style="background-color: #236d5e;" style="display:none" id="sup" value="-" onclick="moins()" />
                    </div>
                </div>
                <label for="process" class="form-label">Etapes de la recette</label>
                <div class="form-floating">
                    <textarea class="form-control" 
                                name="process" 
                                placeholder="Leave a comment here" 
                                id="floatingTextarea2" 
                                value="<?= $process ?>"
                                style="height: 100px">
                    </textarea>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-success" style="background-color: #236d5e;">Envoyé</button>
                </div>
            </form>
            <br>
            <p>Merci pour votre contribution !</p>
        </div>
        <div class="addRecipImg col"></div>
    </div>
</div>