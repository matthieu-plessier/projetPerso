<h1 class="text-white">Vos recettes :</h1>

<div class="container-fluid p-0 min-vh-100 ">
<div class="row justify-content-center">
    <div class="col-10 col-md-5 textRegistration">
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
                        <td><a href="/controllers/updateRecipe_ctrl.php?id=<?=$recipe->id ?>" style="color: #236d5e;">Modifier</a></td>
                        <td><a href="/controllers/delete-recipe_ctrl.php?id=<?=$recipe->id ?>"><img
                                    src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php } ?>
            
    </div>
    <div class="col-10 col-md-5 d-none d-md-block textEditRecip">

    </div>
    </div>
</div>