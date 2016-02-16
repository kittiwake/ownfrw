<?php

class Orders {

    private $dbObject;
    private $smObj;

    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
        $this->smObj = new Smarty();
        $this->smObj->template_dir = 'templates';
        $this->smObj->compile_dir =  "lib/Smarty/templates_c/";
        $this->smObj->config_dir =   "lib/Smarty/configs/";
        $this->smObj->cache_dir =    "lib/Smarty/cache/";
    }

    public function getContent($arg){

        switch ($arg){
            case 'addnew':
                if(sizeof($_POST)>0){
                    var_dump($_POST);//
                    $order = new Order($this->dbObject);
                    $order->setCon($_POST['con']);
                    $this->smObj->assign('message', $order->addNew());
                }else{
                    $this->smObj->assign('message', '');
                }
                $content = $this->smObj->fetch('addnew.tpl');
                break;

        }

 /*       if(file_exists(SITE_PATH .'templates/'.$arg.'.tpl')){
            $content = $this->smObj->fetch($arg.'.tpl');
        }else{
            $content = 'File not found';
        }*/
        return $content;
    }



}