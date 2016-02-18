<?php

class BaseView {
    protected  $dbObject;
    protected  $smObj;

    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
        $this->smObj = new Smarty();
        $this->smObj->template_dir = 'templates';
        $this->smObj->compile_dir =  "lib/Smarty/templates_c/";
        $this->smObj->config_dir =   "lib/Smarty/configs/";
        $this->smObj->cache_dir =    "lib/Smarty/cache/";
    }

} 