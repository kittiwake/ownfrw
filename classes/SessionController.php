<?php
/**
 * Created by PhpStorm.
 * User: kittiwake
 * Date: 14.01.2016
 * Time: 14:50
 */

class SessionController {

    public $error=null;
    private $dbObject;

    public function __construct($dbObj) {

        $this->dbObject = $dbObj;

    }

    public function start(){

        if (isset($_POST['enter'])) {
            //проверяем логин-пароль
            if (isset($_POST['login']) && isset($_POST['pass'])) {

                $log = $_POST['login'];
                $pass = $_POST['pass'];

                $modelUsers = new Users($this->dbObject);
                $user = $modelUsers->getUserByLogin($log);

                if(!($user)){
                    $this->error = 'Неверный логин';
                    //остаемся на странице авторизации
                }elseif($user['user_password']!= md5(md5($pass).$user['user_hash'])){
                    $this->error = 'Неверный пароль';
                    //остаемся на странице авторизации
                }else{
                    session_start();
                    $_SESSION['ri'] = $user['user_right'];
                    $_SESSION['user'] = $user['user_login'];
                    //переходим на рабочую страницу
                }
            }

        }elseif(isset($_COOKIE['PHPSESSID'])){
            session_start();

        }elseif($_GET['out']=="1"){
            session_destroy();

        }else{
            $this->error = 'Авторизируйтесь';
        }

        return $this->error;
    }
}
