<h1 class="m-3">Liste des users</h1>




<div class="container mt-3">
    <!-- <form action="/controllers/search-patient_ctrl.php" method="GET" class="d-flex m-3 justify-content-center"> -->
    <!-- <input class="form-control me-2 w-25" type="search" placeholder="Nom du patient" aria-label="Search" name="lastname"> -->
    <!-- <button class="btn btn-outline-success" type="submit">Rechercher</button> 
    </form>-->
    <table class="table ">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Mot de passe</th>
            <th scope="col">Status</th>
            <th scope="col">Voir Profil</th>
            <th scope="col">Supprimer</th>
        </thead>

        <tbody>
            <?php 
                foreach($users as $user) : ?>
            <tr class="table-primary align-middle">
                <td scope="row"><?=$user->id ?? '' ?></td>
                <td><?=$user->lastname ?? '' ?></td>
                <td><?=$user->firstname ?? '' ?></td>
                <td><a href="mailto:<?=$user->mail ?? '' ?>"><?=$user->mail ?? '' ?></a></td>
                <td><?=$user->password ?? '' ?></td>
                <td><?=$user->status ?? '' ?></td>

                <td><a class="btn btn-primary" href="/controllers/profil-user_ctrl.php?id=<?=$user->id ?>">Voir
                        Profil</button></td>
                <td><a href="/controllers/delete-user_ctrl.php?id=<?=$user->id ?>"><img
                            src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>