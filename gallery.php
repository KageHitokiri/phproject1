<?php

    $title = "Galería";
    require_once "./utils/utils.php";

    $info = $description = $imgUrl = "";
    $descriptionError = $imageError = $thereAreErrors = false;
    $errors = [];

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        if (empty($_POST)) {
            $errors[] = "Se ha producido un error al procesar el formulario";
            $imageError = true;            
        }

        if (!$imageError) {
            $description = sanitizeInput(($_POST["description"] ?? ""));
            
            if (empty($description)) {
                $errors[] = "La descripción es obligatoria";
                $descriptionError = true;
            }
        }        

        if (isset($_FILES['image']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK)) {
            if($_FILES['image']['size'] > (2 * (1024**2))) {
                $errors[] = "Este archivo es demasiado pesado, los archivos no pueden pesar más de 2MB";
                $imageError = true;
            }
        

            $extensions = array("image/jpeg","image/jpg","image/png");

            if (false === in_array($_FILES['image']['type'], $extensions)) {
                $errors[] = "Extensión no permitida, solo son válidos los archivos .jpg o .png";
                $imageError = true;
            }

            if(!$imageError) {
                if (false === move_uploaded_file($_FILES['image']['tmp_name'], "images/index/gallery/".$_FILES['image']['name'])) {
                    $errors [] = "Se ha producido un error al mover la imagen";
                    $imageError = true;
                }
            }

        } else {
            $errors[] = "Se ha producido un error. Código de error :".$_FILES['image']['error'];
            $imageError = true;
        }

        if (sizeof($errors) > 0){
            $thereAreErrors = true;
        }

        if (!$thereAreErrors) {
            $info = "Imagen enviada correctamente";
            $imgUrl = "images/index/gallery/". $_FILES['image']['name'];
            $description = "";        
        } else {
            $info="Datos erróneos";
        }
        
    }

    

    include("./views/gallery.view.php");

?>