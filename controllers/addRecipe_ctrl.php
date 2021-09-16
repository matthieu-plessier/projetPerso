<?php
session_start();

include(dirname(__FILE__).'/../utils/regex.php');
include(dirname(__FILE__).'/../models/recipes.php');
include(dirname(__FILE__).'/../models/ingredients.php');



// Initialisation du tableau d'erreurs
$errorsArray = array();
$code = null;
$ingredientsArray = [];
$count = 0;
/*************************************/

//On ne controle que s'il y a des données envoyées

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nameRecipe = strip_tags(trim(filter_input(INPUT_POST, 'nameRecipe', FILTER_SANITIZE_STRING)));
    $type = strip_tags(trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT)));
    $process = strip_tags(trim(filter_input(INPUT_POST, 'process', FILTER_SANITIZE_STRING)));

    /////////////////////////////////////// GESTION DE L UPLOAD ///////////////////////////////////////////////

// L'idéal serait de créer une fonction qui gère l'enregistrement sur le serveur

    if (!empty($nameRecipe)) {
        if(!preg_match('/'.REGEX_STR_NO_NUMBER.'/', $nameRecipe,)){
            $errorsArray['nameRecipe'] = 'Le nom de la reccette n\'est pas valide ';
        }
    }else{
        $errorsArray['nameRecipe'] = 'Veuillez saisir un nom de recette ';

    }

    if (!empty($type)) {
        if($type<1 || $type>2){
            $errorsArray['type'] = 'Le type de la reccette n\'est pas valide ';
        }
    }else{
        $errorsArray['type'] = 'Veuillez saisir un type de recette ';

    }

    if (empty($process)) {
        
        $errorsArray['process'] = 'Veuillez saisir les étapes de la recette ';

    }
    
    while (!empty($_POST["ingredients".$count]) || !empty($_POST["quantity".$count])) {
        //Traitement
        $ingredient = strip_tags(trim(filter_input(INPUT_POST, 'ingredients'.$count, FILTER_SANITIZE_STRING)));
        $quantity = strip_tags(trim(filter_input(INPUT_POST, 'quantity'.$count, FILTER_SANITIZE_STRING)));

        $ingredientsArray[$count]['ingredient'] = $ingredient;
        $ingredientsArray[$count]['quantity'] = $quantity;
        $count++;
    }
    if($count == 0){
        $errorsArray['ingredients'] = 'ERREUR pas d\'ingredient';
    }

    if(empty($errorsArray)){
        $recipe = new Recipe('', $nameRecipe, $process, $type);
        $code = $recipe->create();
        $pdo = Database::getInstance();
        $lastId = $pdo->lastInsertId();

        foreach ($ingredientsArray as $value) {
            $ingredient = new Ingredient('', $value['quantity'],$value['ingredient'], $lastId);
            $code = $ingredient->create();
        }
        
        if($_FILES['formFile'] && $_FILES['formFile']['error']==0){

            // Vérification du poids limité
            if($_FILES['formFile']['size'] > LIMIT_WEIGHT){
                $errorsArray['file'] = 'Poids limite dépassée';
            }
            // Vérification du format autorisé
            $mime = mime_content_type($_FILES['formFile']['tmp_name']);
            if(!in_array($mime, SUPPORTED_FORMAT)){
                $errorsArray['file'] = 'Format non autorisé';
            }
    
            $sizes = getimagesize($_FILES['formFile']['tmp_name']);
            $originalWidth = $sizes[0];
            $originalHeight = $sizes[1];
            if($originalWidth < MIN_WIDTH || $originalHeight < MIN_HEIGHT){
                $errorsArray['file'] = 'Dimensions trop petites';
            }
            //Enregistrement du fichier sur mon site
            if(empty($errorsArray)){
                $from = $_FILES['formFile']['tmp_name'];
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
                        $dst_resampled_file = dirname(__FILE__) . '/../uploads/recipes/'.$lastId.'.jpg';
                        imagejpeg($dst_image, $dst_resampled_file,75);
    
                        // Recadrage
                        $im = imagecreatefromjpeg($dst_resampled_file);
                        $croppedRessource = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 200, 'height' => 200]);
                        $dst_cropped_file = dirname(__FILE__) . '/../uploads/recipes/'.$lastId.'.jpg';
                        imagejpeg($croppedRessource, $dst_cropped_file,75);
                    } else {
                        $errorsArray['file'] = 'Problème lors du recadrage';
                    }
    
                }
    
            }
        } else {
            $errorsArray['file'] = "Une erreur s'est produite lors de l'envoi du fichier";
        }
    }
    
///////////////////////////////////////////////////////////////// FIN DE GESTION DE L UPLOAD ///////////////////////////////////////////////////
}

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/products-recipes/addRecipe.php');

include(dirname(__FILE__).'/../views/templates/footer.php');