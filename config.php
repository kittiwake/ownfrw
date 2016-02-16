<?php

// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта
$siteDir =  basename(dirname(__FILE__));
define ('SITE_DIR', $siteDir);

//константы для подключения к базе данных
define('HOST', 'localhost'); 		//сервер
define('USER', 'root'); 			//пользователь
define('PASSWORD', ''); 			//пароль
define('NAME_BD', 'ownfrw');		//база


function __autoload_ownfrw($class_name){

    switch($class_name){
        case 'Orders':
            require_once (SITE_PATH .'models/orders/Orders.php');
            break;
        case 'Order':
            require_once (SITE_PATH .'models/orders/Order.php');
            break;
        default:
            $array_paths = array('models', 'controllers');
            foreach ($array_paths as $path){
                $path = SITE_PATH . $path .DS. $class_name . '.php';
                if (is_file($path)){
                    require_once $path;
                }
            }
            break;
    }
}

spl_autoload_register('__autoload_ownfrw');

?>