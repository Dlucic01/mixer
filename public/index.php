<?php

use Core\Router;

require_once '../config/config.php';
require_once '../vendor/autoload.php';

$router = new Router();

$router->get('/', function() {
    echo 'Home Page';
});
