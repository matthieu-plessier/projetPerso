<h1 class="text-white">Proposez nous vos recettes !</h1>

<div class="container">
    <div class="row">
        <div class="addRecipText col">
            <h3>C'est a vous de jouer !</h3>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                    <label for="formFile" class="form-label">Ajouter une image</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Nom de la recette</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="ex : créme pour les mains">
                </div>
                <label for="inputAddress" class="form-label">Type de produit</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Cosmétique ou produits ménager ?</option>
                    <option value="1">Cosmétique</option>
                    <option value="2">Produit ménager</option>
                </select>
                <div class="row g-3">
                    <div class="col-sm-7">
                        <label for="ingredients" class="form-label">Ingrédients</label>
                        <input type="text" class="form-control" placeholder="ex : huile de coco" aria-label="ingredients">
                    </div>
                    <div class="col-sm">
                        <label for="quantity" class="form-label">Quantité</label>
                        <input type="text" class="form-control" placeholder="ex : 1L ou 100 grs" aria-label="quantity">
                    </div>
                </div>
                <label for="inputAddress" class="form-label">Etapes de la recette</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
            </form>
            <br>
            <p>Merci pour votre contribution !</p>
        </div>
        <div class="addRecipImg col"></div>
    </div>
</div>