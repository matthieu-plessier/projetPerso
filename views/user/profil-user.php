
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="formUser">

<h1 class="text-white">Votre profil :</h1>

<?php 
    if($code){
        echo '<div class="text-center m-0 alert'.' '.$messageCode[$code]['type'].' "><img src="https://img.icons8.com/ios-glyphs/32/000000/right.png"/>'.$messageCode[$code]['msg'].' <img src="https://img.icons8.com/ios-glyphs/32/000000/left.png"/></div>';
    }
?>
<div class="editUser">
    
    <div class="textRegistration">
        <h2>Mofifiez vos recettes :</h2>
        <table class="table ">
        <thead>
            
            <th scope="col">Nom</th>
            <th scope="col">ingredients</th>
            <th scope="col">Quantity</th>
            <th scope="col">Process</th>
            <th scope="col">Image</th>
            
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
    
    <div class="form">
        <h2>Mofifiez vos infos personnelles :</h2>
        <form>

        
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
                    name="email"
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
            
            <button type="submit" class="btn btn-success" style="background-color: #236d5e;">Envoyé</button>
        </form>
    </div>
</div>

<script src="/public/js/checkPass.js"></script>
