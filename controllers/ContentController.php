<?php
/**
 * User: kittiwake
 * Date: 21.01.2016
 */

class ContentController {

    private $dbObject;
    private $smartyObj;

    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
        $this->smartyObj = new Smarty();
        $this->smartyObj->template_dir = 'templates';
        $this->smartyObj->compile_dir =  "lib/Smarty/templates_c/";
        $this->smartyObj->config_dir =   "lib/Smarty/configs/";
        $this->smartyObj->cache_dir =    "lib/Smarty/cache/";
    }

    public function display($sessError, $routerError){

        switch ($sessError){
            case 'You are denied access' :
                $content = 'Вам сюда нельзя';
                break;
            case 'session started' :
            case 'session ok' :
                $content = $this->buildLoggedInPage($routerError);
                break;
            case 'Invalid login or password' :
            case 'You need to log in' :
            default:
                //созд объект смарти
                //в буфер auth.tpl и присв переменной $content
                $content = $this->smartyObj->fetch('auth.tpl');
                break;
        }
        $this->smartyObj->assign('content', $content);
        $this->smartyObj->assign('menu', $this->getMenu());
        $this->smartyObj->assign('session', $this->getSessionContent());
        $this->smartyObj->display('layout.tpl');

    }

    private function buildLoggedInPage($pageId){
        $gid = $_SESSION['gid'];
        $modelContent = new Pages($this->dbObject);
        $cont = $modelContent->getContent($pageId, $gid);
        if($cont['permission'] == 'open'){
            //условие если похоже на ____module(orders: addnew)
            $content = $cont['content'];
            if (preg_match('~^____module\(([a-z]+): ([a-z_]+)\)$~', $content, $parts)){
                $modelName = $parts[1];
                $modelArg = $parts[2];
                switch ($modelName){
                    case 'orders':
                        $model = new Orders($this->dbObject);
                        break;
                }
                return $model->getContent($modelArg);
            }else{
                return $content;
            }

        }
    }

    private function getSessionContent(){
        if(isset($_SESSION['user']))
            return "логин: ".$_SESSION['user'].' | <a href="?out=1">Выход</a>';
        else
            return 'нужна авторизация';
    }

    private function getMenu(){

        $menu = $this->smartyObj->fetch('menu.tpl');
        return $menu;
    }
}
?>
