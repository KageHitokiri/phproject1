<?php
    require_once "database/Connection.php";
    require_once 'core/App.php';
    $config = require_once 'app/config.php';
    App::bind('config',$config);
    App::bind('connection', Connection::make($config['database']));
    
