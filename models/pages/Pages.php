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

    public function getContent($pageId, $gid){
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

    public function getPageById($pageId){

        $res = $this->dbObject->prepare('
            SELECT *
            FROM `router_pages`
            WHERE `id` = :pid
          ');
        $res->execute(array(
            ':pid'=>$pageId
        ));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }

    public function getChildren($pageId){

        $res = $this->dbObject->prepare('
            SELECT *
            FROM `router_pages`
            WHERE `parent_id` = :pid
          ');
        $res->execute(array(
            ':pid'=>$pageId
        ));
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $pageList = array();
        while ($row = $res->fetch()){
            $pageList[] = $row;
        }
        return $pageList;
    }

    public function setNewPage($address, $parentPageId, $level, $status){

        $res = $this->dbObject->prepare('
            INSERT INTO `router_pages`(
            `address`,
            `level`,
            `parent_id`,
            `status`
            ) VALUES (
            :addr,
            :level,
            :parr,
            :status
            )
          ');
        $res->execute(array(
            ':addr'  =>$address,
            ':level' =>$level,
            ':parr'   =>$parentPageId,
            ':status'=>$status
        ));

        return $this->dbObject->lastInsertId ();
    }

    public function setContent($pageId, $gid, $content, $permission = 'open'){

        $res = $this->dbObject->prepare('
            INSERT INTO `router_contents`(
            `page_id`,
            `gid`,
            `permission`,
            `content`
            ) VALUES (
            :pid,
            :gid,
            :perm,
            :cont
            )
          ');
        $res->execute(array(
            ':pid'  =>$pageId,
            ':gid' =>$gid,
            ':perm'   =>$permission,
            ':cont'=>$content
        ));
    }

    public function delContent($pageId){

        $res = $this->dbObject->prepare('
            DELETE FROM `router_contents`
            WHERE `page_id` = :pid
          ');
        $res->execute(array(
            ':pid'=>$pageId,
        ));
    }

    public function delPage($pageId){

        $res = $this->dbObject->prepare('
            DELETE FROM `router_pages`
            WHERE `id` = :pid
          ');
        $res->execute(array(
            ':pid'=>$pageId,
        ));
    }

}