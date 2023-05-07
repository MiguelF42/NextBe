<?php

session_start();

require 'Autoloader.php';

use Application\Lib\Tools;
use Application\Router\MainRouter;

$uri = str_replace('/NextBe','',$_SERVER['REQUEST_URI']);

$router = new MainRouter($uri);

$router->get('/','Homepage#execute');
$router->get('/signup','Signup#execute');
$router->post('/signup','Signup#signup');
$router->get('/login','Login#execute');
$router->post('/login','Login#login');
$router->get('/logout','Login#logout');
$router->get('/account','UserPanel#execute');


$router->run();