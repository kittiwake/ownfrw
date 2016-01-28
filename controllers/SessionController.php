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

                if(!($user)||$user['password']!= md5(md5($pass).$user['salt'])){
                    $this->error = 'Invalid login or password';
                    //остаемся на странице авторизации
                }elseif($user['status']== 'disabled'){
                    $this->error = 'You are denied access';
                    //остаемся на странице авторизации
                }else{
                    session_start();
                    $this->error = 'session started';

                    $_SESSION['gid'] = $user['gid'];
                    $_SESSION['user'] = $user['login'];
                    //переходим на рабочую страницу
                }
            }

        }elseif(isset($_COOKIE['PHPSESSID'])){
            session_start();
            $this->error = 'session ok';

        }elseif($_GET['out']=="1"){
            session_destroy();

        }else{
            $this->error = 'You need to log in';
        }

        return $this->error;
    }
}
