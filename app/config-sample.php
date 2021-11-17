<?php
return [
    'database' => [
        'name' => 'nombre',
        'username' => 'usuario',
        'password' => 'admin1234',
        'connection' => 'www.google.com',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ]
];