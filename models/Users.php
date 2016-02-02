<?php
/**
 * Created by PhpStorm.
 * User: kittiwake
 * Date: 03.11.2015
 * Time: 10:54
 */

class Users extends BaseModel {

    public function getUserByLogin($val){

        $res = $this->dbObject->prepare('SELECT * FROM `users` WHERE `login` = :val');
        $res->execute(array(
            ':val'=>$val));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }

    public function addUser($log, $pass, $group){
        $salt = self::generateCode(32);
        $res = $this->dbObject->prepare("
INSERT INTO users (login, password, salt, group, registration_date)
VALUES (:login, :password, :salt, :group, CURDATE())
");
        $res -> execute(array(
            'login' => $log,
            'password'=> $pass,
            'salt' => $salt,
            'group' => $group
        ));
    }

    public static function generateCode($length=6) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }

    public function getAllUserGroups(){
        $res = $this->dbObject->prepare('SELECT * FROM `user_groups`');
        $res->execute();
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $groupList = array();
        while ($row = $res->fetch()) {
            $groupList[] = $row;
        }
        return $groupList;
    }
}