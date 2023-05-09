<?php

session_start();

require 'Autoloader.php';

use Application\Lib\Tools;
use Application\Router\MainRouter;

if(!isset($_SESSION['user'])) Tools::defaultUser();

$uri = str_replace('/NextBe','',$_SERVER['REQUEST_URI']);

$router = new MainRouter($uri);

$router->get('/','Homepage#execute');
$router->get('/signup','Signup#execute');
$router->post('/signup','Signup#signup');
$router->get('/login','Login#execute');
$router->post('/login','Login#login');
$router->get('/logout','Login#logout');
$router->get('/panel','Panel#panel');
$router->get('/panel/account','Panel#account');
$router->get('/panel/reservation','Panel#reservation');
$router->get('/panel/planes','Panel#planes');
$router->get('/panel/models','Panel#models');
$router->get('/panel/flights-manager','Panel#flightManager');
$router->post('/panel/flight-manager','Panel#addFlight');


$router->run();