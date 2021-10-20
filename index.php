<?php
    $title = "Home";
    require_once "./utils/utils.php";
    require_once "./entity/ImageGallery.php";
    
    
    $gallery[] = new ImageGallery("1.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("2.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("3.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("4.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("5.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("6.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("7.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("8.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("9.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("10.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("11.jpg","Sin descripción",1,2,10);
    $gallery[] = new ImageGallery("12.jpg","Sin descripción",1,2,10);
    
    
    include("./views/index.view.php");    
    