<?php
if(preg_match('/\.(png|jpg|gif)$/',$_SERVER["REQUEST_URI"])){
    return false;
}
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/db.php';
require __DIR__ . '/../app/config.php';
require __DIR__ . '/../app/dispatcher.php';
