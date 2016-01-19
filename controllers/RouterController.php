<?php
/**
 * User: kittiwake
 * Date: 07.10.2015
 */

class RouterController {
    public $error=null;
    private $dbObject;

    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
    }

    public function run(){
        //парсим адрес
        $route = $_GET['route'];
        $segments = explode('/', $route);

        //каждый элемент проверить в базе
        foreach($segments as $key=>$val){
            $pageModel = new Pages($this->dbObject);
            $result = $pageModel->checkAddress($val,$key+1);//?route=order/new -> ?????????????
            //если найдена не существ страница, вернуть ошибку $this->error
            if(!$result) $this->error = 'Такого адреса не существует';
            elseif($result['status']=='passive') $this->error = 'Данная страница недоступна';
            else $pageId = $result['id'];
        }
        //возвращаем индекс последнего элемента(если каждый элемент существует)
        if($this->error == null) return $pageId;

        //??? что вернуть по умолчанию? $this->error?
    }
}