<?php
$messageCode = [
    1=> ['type' => 'alert-danger', 'msg' => 'Une erreur SQL est survenue'],
    2 => ['type' => 'alert-danger', 'msg' => 'Le pseudo existe déjà'],
    3=> ['type' => 'alert-success', 'msg' => 'Modifications validées !'],
    4 => ['type' => 'alert-danger', 'msg' => 'L\'id n\'est pas au bon format!!'],
    5 => ['type' => 'alert-success', 'msg' => 'Pour valider votre inscription, vérifiez vos mails !'],
    6 => ['type' => 'alert-danger', 'msg' => 'l\'id doit être renseigné!!' ],
    7 => ['type' => 'alert-danger', 'msg' => 'erreur de mot de passe' ],
    8 => ['type' => 'alert-danger', 'msg' => 'Votre recette est bien supprimée.' ],
    10 => ['type' => 'alert-danger', 'msg' => 'Cet utilisateur n\'existe pas'],
    11 => ['type' => 'alert-danger', 'msg' => 'La date entrée n\'est pas valide'],
    12 => ['type' => 'alert-success', 'msg' => 'Le rendez-vous est enregistré'],
    13 => ['type' => 'alert-success', 'msg' => 'La date n\'est pas au bon format'],
    14 => ['type' => 'alert-success', 'msg' => 'Le rdv est bien supprimé !'],
    15 => ['type' => 'alert-success', 'msg' => 'La recette est bien supprimée !'],
    16 => ['type' => 'alert-danger', 'msg' => 'Aucune correspondances trouvées'],
    17 => ['type' => 'alert-success', 'msg' => 'Recette ajoutée'],
    18 => ['type' => 'alert-danger', 'msg' => 'Votre compte est désactivé'],
    19 => ['type' => 'alert-danger', 'msg' => 'Identifiant invalide'],


];

// Ici on défini les variables de connection
define('DSN', 'mysql:host=localhost;dbname=comme_a_la_maison;charset=utf8');
define('LOGIN', 'comme_a_la_maison');
define('PASSWORD', 'bjE&7HytAkxEdaMx');

// Ici on défini la pagination
define('NB_ELEMENTS_BY_PAGE', 4);

// Ici on défini les limite pour l'upload
define('LIMIT_WEIGHT', 2*1024*1024);
define('SUPPORTED_FORMAT', array('image/jpeg'));
define('MIN_WIDTH', 200);
define('MIN_HEIGHT', 200);