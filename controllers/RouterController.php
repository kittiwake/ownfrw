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
        if(isset($_GET['route'])) {
            $get_route = $_GET['route'];
            $route = '/'.(substr($get_route, -1)=='/' ? substr($get_route, 0, -1) : $get_route);
        }
        else $route = null;
        $segments = explode('/', $route);

        //каждый элемент проверить в базе
        foreach($segments as $key=>$val){
            $pageModel = new Pages($this->dbObject);
            $result = $pageModel->checkAddress($val,$key);
            //если найдена не существ страница, вернуть ошибку $this->error
            if(!$result) $this->error = 'Page not found';
            elseif($result['status']=='passive') $this->error = 'Page is not available';
            else $pageId = $result['id'];
        }
        //возвращаем индекс последнего элемента(если каждый элемент существует)
        if($this->error == null) return $pageId;

        return $this->error;
    }
}