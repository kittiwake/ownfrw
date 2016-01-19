<?php
/**
 * Created by PhpStorm.
 * User: kittiwake
 * Date: 03.11.2015
 * Time: 10:54
 */

class Users extends BaseModel {

    public function getUserByLogin($val){

        $res = $this->dbObject->prepare('SELECT * FROM `users` WHERE `user_login` = :val');
        $res->execute(array(
            ':val'=>$val));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }
}