<?php


require_once __DIR__ . '/vendor/autoload.php';


use Core\Router;

use App\Controller\UserAuthController;
use App\Model\SongUpload;
use App\View\Display;

$router = new Router();

$router->get('/', Display::class . '::viewJukebox');
$router->post('/', Display::class . '::viewJukebox');



$router->get('/register', Display::class . '::viewRegister');
$router->post('/register', UserAuthController::class . '::insert');

$router->get('/login', Display::class . '::viewLogin');
$router->post('/login', UserAuthController::class . '::enter_login');

$router->get('/logout', UserAuthController::class . '::removeSessionUsername');

$router->get('/upload', Display::class . '::viewUpload');
$router->post('/upload', SongUpload::class . '::insertSong');




$router->addNotFoundHandler(function () {
    require_once __DIR__ . '/templates/404.php';
});

$router->run();
