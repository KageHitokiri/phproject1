<?php

    $title = "Galería";
    require_once "./utils/utils.php";
    require_once "./entity/ImageGallery.php";
    require_once "./utils/File.php";
    require_once "./exceptions/FileException.php";
    require_once "./utils/SimpleImage.php";

    $info = $description = $imgUrl = "";
    $descriptionError = $imageError = $thereAreErrors = false;
    $errors = [];

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        try {
            if (empty($_POST)) {
                throw new FileException("Se ha producido un error al procesar el formulario");
            }    
            $imageFile = new File('image',
                                       array('image/jpeg','image/jpg','image.png'),
                                       (2*(1024**2)));
            $imageFile->saveUploadedFile(ImageGallery::PATH_IMAGE_GALLERY);
            try {
                $simpleImage = new \claviska\SimpleImage();
                $simpleImage
                ->fromFile(ImageGallery::PATH_IMAGE_GALLERY . $imageFile->getFileName())
                ->resize(975, 525)
                ->toFile(ImageGallery::PATH_IMAGE_PORTFOLIO . $imageFile->getFileName())
                ->resize(650, 350)
                ->toFile(ImageGallery::PATH_IMAGE_GALLERY . $imageFile->getFileName());                
            } catch (Exception $err) {
                $errors[] = $err->getMessage();
                $imageError = true;
            }
        

        } catch (FileException $fe) {
            $errors[] = $fe->getMessage();
            $imageError = true;
        }
        
        $description = sanitizeInput(($_POST["description"] ?? ""));
            
        if (empty($description)) {
            $errors[] = "La descripción es obligatoria";
            $descriptionError = true;
        }
        
        if(0 == count($errors)) {
            $info = 'Imagen enviada satisfactoriamente';
            $imgUrl = ImageGallery::PATH_IMAGE_GALLERY . $imageFile->getFileName();

            $description ="";
        } else {
            $info ="Datos erróneos";
        }
              
    }

    include("./views/gallery.view.php");

?>