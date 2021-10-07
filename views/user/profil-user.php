


<h1 class="text-white">Votre profil :</h1>

<?php 
    if($code){
        echo '<div class="text-center m-0 alert'.' '.$messageCode[$code]['type'].' "><img src="https://img.icons8.com/ios-glyphs/32/000000/right.png"/>'.$messageCode[$code]['msg'].' <img src="https://img.icons8.com/ios-glyphs/32/000000/left.png"/></div>';
    }
?>
<div class="container-fluid">
<div class="row editUser justify-content-center">
        <!-- <div class="row col-10 col-md-5 textRegistration">
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

    </div> -->
    
    <div class="form row col-10 col-md-5">
        <h2>Modifiez vos infos personnelles :</h2>
        <form method="post" action="/controllers/edit-user_ctrl.php">

        
        <!-- NOM -->

            <div class="mb-3">
                <label for="lastname" class="form-label">Votre nom* :</label>
                <input 
                    type="text" 
                    name="lastname"
                    id="lastname" 
                    class="form-control <?=isset($errorsArray['lastname']) ? 'errorField' : ''?>"
                    value="<?= $resultCheckUser->lastname ?>"
                    
                >
            </div>
            
        <!-- PRENOM -->

            <div class="mb-3">
                <label for="firstname" class="form-label">Votre prénom :</label>
                <input 
                    type="text" 
                    name="firstname"
                    class="form-control  <?=isset($error['firstname']) ? 'errorField' : ''?>" 
                    value="<?= $resultCheckUser->firstname?>"
                    id="firstname">
            </div>

        <!-- MAIL -->

            <div class="mb-3">
                <label for="email" class="form-label">Votre adresse mail* :</label>
                <input 
                    type="email" 
                    name="mail"
                    value="<?= $resultCheckUser->mail ?>"
                    class="form-control  <?=isset($error['email']) ? 'errorField' : ''?>" 
                    id="email" 
                    >
                    
            </div>

            
        <!-- MOT DE PASSE -->

            <div class="mb-3">
                <label for="password " class="form-label">Votre mot de passe * :</label>
                <input 
                    type="password" 
                    name="password1"
                    class="form-control <?=isset($error['password1']) ? 'errorField' : ''?>" 
                    autocomplete="password"
                    id="password1"
                    required>
                    <div class="error alert-danger text-center"><?=$errorsArray['password1'] ?? ''?></div>
            </div>

        <!-- CONFIRMATION DE MOT PASSE -->

            <div class="mb-3">
                <label for="confirmPassword " class="form-label">Confirmation de votre mot de passe* :</label>
                <input 
                type="password" 
                name="password2"
                class="form-control <?=isset($error['password']) ? 'errorField' : ''?>" 
                id="password2"
                required>
                <div class="error alert-danger text-center"><?=$errorsArray['password2'] ?? ''?></div>
            </div>
            
            <button type="submit" class="btn btn-success" style="background-color: #236d5e;">Envoyer</button>
            <a href="/controllers/delete-user_ctrl.php"  class="btn btn-outline-danger">Supprimer mon compte</a>
        </form>
    </div>
</div>
</div>


