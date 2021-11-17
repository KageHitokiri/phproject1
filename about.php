<?php
    $title = "About";
    require_once "./utils/utils.php";

    require_once "./core/App.php";
    
    $config = require_once 'app/config.php';
    App::bind('config',$config);
    App::bind('connection', Connection::make($config['database']));
    $queryBuilder = new QueryBuilder();
    
    include("./views/about.view.php");