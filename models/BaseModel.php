<?php
/**
 * User: kittiwake
 * Date: 19.01.2016
 */

class BaseModel {
    protected $dbObject;

    public function __construct($dbObj){
        $this->dbObject = $dbObj;
    }
}