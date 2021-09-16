<?php


$messageCode = [

    001=> ['type' => 'alert-danger', 'msg' => 'Une erreur SQL est survenue'],
    002 => ['type' => 'alert-danger', 'msg' => 'Le pseudo existe déjà'],
    003 => ['type' => 'alert-success', 'msg' => 'Modifications validées !'],
    004 => ['type' => 'alert-danger', 'msg' => 'L\'id n\'est pas au bon format!!'],
    005 => ['type' => 'alert-success', 'msg' => 'Pour valider votre inscription, vérifiez vos mails !'],
    006 => ['type' => 'alert-danger', 'msg' => 'l\'id doit être renseigné!!' ],
    010 => ['type' => 'alert-danger', 'msg' => 'Cet utilisateur n\'existe pas'],
    011 => ['type' => 'alert-danger', 'msg' => 'La date entrée n\'est pas valide'],
    012 => ['type' => 'alert-success', 'msg' => 'Le rendez-vous est enregistré'],
    013 => ['type' => 'alert-success', 'msg' => 'La date n\'est pas au bon format'],
    014 => ['type' => 'alert-success', 'msg' => 'Le rdv est bien supprimé !'],
    015 => ['type' => 'alert-success', 'msg' => 'Le user est bien supprimé !'],
    016 => ['type' => 'alert-danger', 'msg' => 'Aucune correspondances trouvées'],

];

// Ici on défini les variables de connection
define('DSN', 'mysql:host=localhost;dbname=comme_a_la_maison;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');

// Ici on défini la pagination
define('NB_ELEMENTS_BY_PAGE', 4);

// Ici on défini les limite pour l'upload
define('LIMIT_WEIGHT', 2*1024*1024);
define('SUPPORTED_FORMAT', array('image/jpeg', 'image/png'));
define('MIN_WIDTH', 200);
define('MIN_HEIGHT', 200);