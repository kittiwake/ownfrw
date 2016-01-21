<?php
// включим отображение всех ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

// подключаем конфиг
include ('config.php');

// Соединяемся с БД
$dbObject = DbController::getConection();
if(!$dbObject) exit('Unable to connect to database');

//начать сессию
$sessObject = new SessionController($dbObject);
$sessError = $sessObject->start();

// Загружаем router
$router = new RouterController($dbObject);
$routerError = $router->run();

$content = new ContentController($dbObject);
$content->display($sessError, $routerError);
