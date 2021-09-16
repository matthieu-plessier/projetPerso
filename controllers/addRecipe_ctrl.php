<?php
session_start();

include(dirname(__FILE__).'/../utils/regex.php');
include(dirname(__FILE__).'/../models/recipes.php');
include(dirname(__FILE__).'/../models/ingredients.php');



// Initialisation du tableau d'erreurs
$errorsArray = array();
$code = null;
/*************************************/

//On ne controle que s'il y a des données envoyées

if($_SERVER["REQUEST_METHOD"] == "POST"){

    /////////////////////////////////////// GESTION DE L UPLOAD ///////////////////////////////////////////////

// L'idéal serait de créer une fonction qui gère l'enregistrement sur le serveur
if($_FILES['profile'] && $_FILES['profile']['error']==0){

// Vérification du poids limité
if($_FILES['profile']['size'] > LIMIT_WEIGHT){
    $errorsArray['file'] = 'Poids limite dépassée';
}
// Vérification du format autorisé
$mime = mime_content_type($_FILES['profile']['tmp_name']);
if(!in_array($mime, SUPPORTED_FORMAT)){
    $errorsArray['file'] = 'Format non autorisé';
}

$sizes = getimagesize($_FILES['profile']['tmp_name']);
$originalWidth = $sizes[0];
$originalHeight = $sizes[1];
if($originalWidth < MIN_WIDTH || $originalHeight < MIN_HEIGHT){
    $errorsArray['file'] = 'Dimensions trop petites';
}
//Enregistrement du fichier sur mon site
if(empty($errorsArray)){
    $from = $_FILES['profile']['tmp_name'];
    if(empty($errorsArray)){
        // Redimensionnement
        $src_width = $originalWidth;
        $src_height = $originalHeight;

        // Si format portrait on redimensionne selon la largeur sinon, selon la hauteur
        if($src_width<$src_height){
            $dst_width = 200;
            $dst_height = $dst_width*$src_height/$src_width;
        } else {
            $dst_height = 200;
            $dst_width = $dst_height*$src_width/$src_height;
        }

        $dst_image = imagecreatetruecolor($dst_width, $dst_height);

        // On pourrait creer une ressource selon le type mime de fichier
        $src_image = imagecreatefromjpeg($from); // Ou $to (ligne 33)
        //$src_image = imagecreatefrompng($from); // Ou $to (ligne 33)

        $dst_x = 0;
        $dst_y = 0;
        $src_x = 0;
        $src_y = 0;

        $isResampled = imagecopyresampled(
            $dst_image,
            $src_image,
            $dst_x,
            $dst_y,
            $src_x,
            $src_y,
            $dst_width,
            $dst_height,
            $src_width,
            $src_height
        );

        if($isResampled){
            $dst_resampled_file = dirname(__FILE__) . '/../uploads/users/resampled.jpg';
            imagejpeg($dst_image, $dst_resampled_file,75);

            // Recadrage
            $im = imagecreatefromjpeg($dst_resampled_file);
            $croppedRessource = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 200, 'height' => 200]);
            $dst_cropped_file = dirname(__FILE__) . '/../uploads/users/cropped.jpg';
            imagejpeg($croppedRessource, $dst_cropped_file,75);
        } else {
            $errorsArray['file'] = 'Problème lors du recadrage';
        }

    }

}

} else {
$errorsArray['file'] = "Une erreur s'est produite lors de l'envoi du fichier";
}

///////////////////////////////////////////////////////////////// FIN DE GESTION DE L UPLOAD ///////////////////////////////////////////////////

}

// Nom de la recette : Nettoyage et validation

$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
// On vérifie que ce n'est pas vide
if(!empty($name)){
    $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$name);
    // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
    if(!$testRegex){
        $errorsArray["name"] = "Le nom n'est pas au bon format"; 
    } else {
        // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
        if(strlen($name)<=1 || strlen($name)>=70){
            $errorsArray["name"] = "La longueur de chaine n'est pas bonne";
        }
    }
} else { // Pour les champs obligatoires, on retourne une erreur
    $errorsArray["name"] = "Vous devez entrer un nom";
}

// Ingrédient de la recette : Nettoyage et validation J'utilise la même regex que le nom

$ingredients = trim(filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
// On vérifie que ce n'est pas vide
if(!empty($ingredients)){
    $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$ingredients);
    // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
    if(!$testRegex){
        $errorsArray["ingredients"] = "Le nom n'est pas au bon format"; 
    } else {
        // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
        if(strlen($ingredients)<=1 || strlen($ingredients)>=70){
            $errorsArray["ingredients"] = "La longueur de chaine n'est pas bonne";
        }
    }
} else { // Pour les champs obligatoires, on retourne une erreur
    $errorsArray["ingredients"] = "Vous devez entrer un nom";
}

// Quantité  de la l'ingrédient : Nettoyage et validation J'utilise la même regex que pour un pseudo, j'autorise chiffres et lettres

$quantity = trim(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
// On vérifie que ce n'est pas vide
if(!empty($quantity)){
    $testRegex = preg_match('/'.REGEX_PSEUDO.'/',$quantity);
    // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
    if(!$testRegex){
        $errorsArray["quantity"] = "Le nom n'est pas au bon format"; 
    } else {
        // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
        if(strlen($quantity)<=1 || strlen($quantity)>=70){
            $errorsArray["quantity"] = "La longueur de chaine n'est pas bonne";
        }
    }
} else { // Pour les champs obligatoires, on retourne une erreur
    $errorsArray["quantity"] = "Vous devez entrer un nom";
}




















include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/addRecipe.php');

include(dirname(__FILE__).'/../views/templates/footer.php');