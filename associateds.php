<?php
    session_start();
    $title = "Asociados";
    require_once "./utils/utils.php";
    require_once "./entity/Associated.php";
    require_once "./utils/File.php";
    require_once "./exceptions/FileException.php";
    require_once "./utils/SimpleImage.php";
    require_once "./core/App.php";
    require_once "./database/Connection.php";
    require_once "./database/QueryBuilder.php";
    $config = require_once 'app/config.php';
    App::bind('config',$config);
    App::bind('connection', Connection::make($config['database']));
    $queryBuilder = new QueryBuilder();

    $info = $description = $logo = $name = "" ;
    $descriptionError = $imageError = $nameError = $thereAreErrors = false;
    $errors = [];

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        try {
            if (empty($_POST)) {
                throw new FileException("Se ha producido un error al procesar el formulario");
            }    
            $imageFile = new File('image',
                                       array('image/jpeg','image/jpg','image.png'),
                                       (2*(1024**2)));
            $imageFile->saveUploadedFile(Associated::PATH_IMAGE_ASSOCIATED);
            try {
                $simpleImage = new \claviska\SimpleImage();
                $simpleImage
                ->fromFile(Associated::PATH_IMAGE_ASSOCIATED . $imageFile->getFileName())
                ->resize(50, 50)
                ->toFile(Associated::PATH_IMAGE_ASSOCIATED . $imageFile->getFileName());
                               
            } catch (Exception $err) {
                $errors[] = $err->getMessage();
                $imageError = true;
            }
        

        } catch (FileException $fe) {
            $errors[] = $fe->getMessage();
            $imageError = true;
        }
        
        $name = sanitizeInput(($_POST["name"] ?? ""));
        if (empty($name)) {
            $errors[] = "El nombre es obligatorio";
            $descriptionError = true;
        }

        $description = sanitizeInput(($_POST["description"] ?? ""));                    
        if (empty($description)) {
            $errors[] = "La descripción es obligatoria";
            $descriptionError = true;
        }

        if(0 == count($errors)) {
            $info = 'Imagen enviada satisfactoriamente';
            $logo = Associated::PATH_IMAGE_ASSOCIATED . $imageFile->getFileName();

            $description ="";
            $name = "";
        } else {
            $info ="Datos erróneos";
        }
              
    }

    include("./views/associateds.view.php");

?>