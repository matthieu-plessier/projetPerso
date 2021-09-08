<h1 class="m-3">Liste des recettes</h1>

<div class="container mt-3">
    <!-- <form action="/controllers/search-patient_ctrl.php" method="GET" class="d-flex m-3 justify-content-center"> -->
    <!-- <input class="form-control me-2 w-25" type="search" placeholder="Nom du patient" aria-label="Search" name="lastname"> -->
    <!-- <button class="btn btn-outline-success" type="submit">Rechercher</button> 
    </form>-->
    <table class="table ">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">ingredients</th>
            <th scope="col">Quantity</th>
            <th scope="col">Process</th>
            <th scope="col">Image</th>
            <th scope="col">Id type de produit</th>
            <th scope="col">Supprimer</th>
        </thead>

        <tbody>
            <?php 
                foreach($recipes as $recipe) : ?>
            <tr class="table-primary align-middle">
                <td scope="row"><?=$recipe->id ?? '' ?></td>
                <td><?=$recipe->name ?? '' ?></td>
                <td><?=$recipe->ingredients ?? '' ?></td>
                <td><?=$recipe->quantity ?? '' ?></td>
                <td ><?=$recipe->process_comment ?? '' ?></td>
                <td><?= $recipe->image ?? ''?></td>
                <td><?=$recipe->id_type_of_product ?? ''?></td>
                <td><a href="/controllers/delete-user_ctrl.php?id=<?=$recipe->id ?>"><img
                            src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>