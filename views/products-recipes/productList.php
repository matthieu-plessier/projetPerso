<h1 class="m-3">Liste des produits disponibles</h1>

<div class="container mt-3">
    
    <table class="table ">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">type de produit</th>
            <th scope="col">Nom</th>
            <th scope="col">Image</th>
            <th scope="col">Quantity</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Id user</th>
            <th scope="col">Id type de produit</th>
            <th scope="col">Supprimer</th>
        </thead>
        
        <tbody>
            <?php 
                foreach($products as $product) : ?>
            <tr class="table-primary align-middle">
                <td scope="row"><?=$product->id ?? '' ?></td>
                <td><?=$product->$type_of_product ?? '' ?></td>
                <td><?=$product->product ?? '' ?></td>
                <td><?=$product->image ?? '' ?></td>
                <td ><?=$product->quantity ?? '' ?></td>
                <td><?= $product->comment ?? ''?></td>
                <td><?= $product->id_user ?? ''?></td>
                <td><?=$product->id_type_of_product ?? ''?></td>
                <td><a href="/controllers/delete-user_ctrl.php?id=<?=$product->id ?>"><img
                            src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>