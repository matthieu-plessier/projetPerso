<div class="row col-10 col-md-5 textRegistration">
        <h2>Modifiez vos recettes :</h2>
        <?php if(empty($recipes)){ ?>
            

            <div class="h-75 w-100 d-flex justify-content-center align-items-center">
                <p class="text-center">Vous n'avez pas de recettes : <br><a class="btn btn-success" style="background-color: #236d5e;" href="/controllers/addRecipe_ctrl.php"> Ajoutez en une !</a></p>
                
            </div>
        <?php }else{ ?>
        <table class="table ">

            <thead>
                <th scope="col">Nom</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </thead>

            <tbody>
                <?php
                    foreach($recipes as $recipe) : ?>
                <tr class="align-middle">
                    <td><?=$recipe->name ?? '' ?></td>
                    <td><a href="/controllers/edit-recipes_ctrl.php?id=<?=$recipe->id ?>" style="color: #236d5e;">Modifier</a></td>
                    <td><a href="/controllers/delete-recipe_ctrl.php?id=<?=$recipe->id ?>"><img
                                src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php } ?>

    </div>