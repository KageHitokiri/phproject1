<?php
    $title = "Single post";
    require_once "./utils/utils.php";
    require_once "./core/App.php";
    require_once "./database/Connection.php";
    require_once "./database/QueryBuilder.php";
    

    $config = require_once 'app/config.php';
    App::bind('config',$config);
    App::bind('connection', Connection::make($config['database']));
    $queryBuilder = new QueryBuilder();

    include("./views/single_post.view.php");