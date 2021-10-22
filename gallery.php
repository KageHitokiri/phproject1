<?php

    $title = "Gallery";
    require_once "./utils/utils.php";

    $info = $description = $imgUrl = "";
    $descriptionError = $imageError = $thereAreErrors = false;
    $errors = [];

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        if (empty($_POST)) {
            $errors[] = "Se ha producido un error al procesar el formulario";
            $imageError = true;            
        }

        if (empty($description)) {
            $errors[] = "La descripción es obligatoria";
            $descriptionError = true;
        }

        if (isset($_FILES['image']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK)) {
            if($_FILES['image']['size'] > (2 * (1024**2))) {
                $errors[] = "Este archivo es demasiado pesado, los archivos no pueden pesar más de 2MB";
                $imageError = true;
            }
        }

        
    }

    

    include("./views/gallery.view.php");

?>