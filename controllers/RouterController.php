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

        $route = $_SERVER['REQUEST_URI'];
        $route = (substr($route, -1)=='/' ? substr($route, 0, -1) : $route);//убираем завершающий слэш
        $segments = explode('/', $route);
        array_shift($segments);
        $segments[0] = '';
        $pageId = 0;
        //каждый элемент проверить в базе
        foreach($segments as $key=>$val){
            $pageModel = new Pages($this->dbObject);
            $result = $pageModel->checkAddress($val,$key,$pageId);
            //если найдена не существ страница, вернуть ошибку $this->error
            if(!$result) $this->error = 'Page not found';
            elseif($result['status']=='passive') $this->error = 'Page is not available';
            else $pageId = $result['id'];
        }
        //возвращаем индекс последнего элемента(если каждый элемент существует)
        if($this->error == null) return $pageId;

        return $this->error;
    }

    public function addPage($parentPageId, $address, $status='active'){
        //читаем инфу по родительской стр из бд
        $pageModel = new Pages($this->dbObject);
        $parPage = $pageModel->getPageById($parentPageId);
        if($parPage['status']=='active'){
            //есть ли у этой родительской стр дочерние с таким же именем
            $children = $pageModel->getChildren($parentPageId);
            foreach ($children as $child){
                if($child['address'] == $address){
                    //такая страница уже существует
                }else{
                    $level = $parPage['level']+1;
                    //создать стр, внести запись в таблицу бд
                    $newId = $pageModel->setNewPage($address, $parentPageId, $level, $status);
                    //прочитать все группы пользователей в массив
                    $usersModel = new Users($this->dbObject);
                    $groups = $usersModel->getAllUserGroups();
                    //перебрать массив, созлать записи в router_contents
                    foreach($groups as $group){
                        $content = '';//&&&&&&&&&&&&&%%%%%%%%%%%%%%%%%###############
                        $pageModel->setContent($newId, $group['gid'], $content);
                    }
                }
            }
        }
    }
    public function dellPage($pageId){
        //удалить из таблиц router_contents router_pages
        $pageModel = new Pages($this->dbObject);
        $pageModel->delContent($pageId);
        $pageModel->delPage($pageId);
    }
}