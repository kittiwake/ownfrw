<?php

class Orders {

    private $dbObject;
    private $smObj;

    public function __construct($dbObj, $smObj) {
        $this->dbObject = $dbObj;
        $this->smObj = $smObj;
    }

    public function getContent($arg){

        if(file_exists(SITE_PATH .'templates/'.$arg.'.tpl')){
            $content = $this->smObj->fetch($arg.'.tpl');
        }else{
            $content = 'File not found';
        }
        return $content;
    }



}