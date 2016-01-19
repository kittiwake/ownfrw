<?php
/**
 * Created by PhpStorm.
 * User: kittiwake
 * Date: 19.01.2016
 * Time: 12:36
 */

class Pages extends BaseModel {

    public function checkAddress($address, $level){

        $res = $this->dbObject->prepare('
          SELECT *
          FROM `router_pages`
          WHERE `address` = :addr
          AND `level` = :level
          ');
        $res->execute(array(
            ':addr'=>$address,
            ':level'=>$level
        ));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }

} 