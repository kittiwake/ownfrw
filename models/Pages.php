<?php
/**
 * Created by PhpStorm.
 * User: kittiwake
 * Date: 19.01.2016
 * Time: 12:36
 */

class Pages extends BaseModel {

    public function checkAddress($address, $level, $parent){

        $res = $this->dbObject->prepare('
            SELECT *
            FROM `router_pages`
            WHERE `address` = :addr
            AND `parent_id` = :parr
            AND `level` = :level
          ');
        $res->execute(array(
            ':addr'=>$address,
            ':parr'=>$parent,
            ':level'=>$level
        ));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }

    public function getContent($pageId){
        $gid = $_SESSION['group'];
        $res = $this->dbObject->prepare('
            SELECT `permission`, `content`
            FROM `router_contents`
            WHERE `gid` = :gid
            AND `page_id` = :page_id
        ');
        $res->execute(array(
            ':gid'=>$gid,
            ':page_id'=>$pageId
        ));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }
} 