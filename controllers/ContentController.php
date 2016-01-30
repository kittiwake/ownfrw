<?php
/**
 * User: kittiwake
 * Date: 21.01.2016
 */

class ContentController {

    private $dbObject;

    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
    }

    public function display($sessError, $routerError){
        $tpl = new Smarty();
        $tpl->template_dir = 'templates';
        $tpl->compile_dir =  "lib/Smarty/templates_c/";
        $tpl->config_dir =   "lib/Smarty/configs/";
        $tpl->cache_dir =    "lib/Smarty/cache/";

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
                $smarty_auth = new Smarty();
                $smarty_auth->template_dir = 'templates';
                $smarty_auth->compile_dir =  "lib/Smarty/templates_c/";
                $smarty_auth->config_dir =   "lib/Smarty/configs/";
                $smarty_auth->cache_dir =    "lib/Smarty/cache/";
                //в буфер auth.tpl и присв переменной $content
                $content = $smarty_auth->fetch('auth.tpl');
                break;
        }

        $tpl->assign('content', $content);
        $tpl->assign('menu', 'меню');
        $tpl->assign('session', $this->getSessionContent());
        $tpl->display('layout.tpl');

    }

    private function buildLoggedInPage($pageId){
     //   $gid = $_SESSION['gid'];
        $gid = 'admin';
        $modelContent = new Pages($this->dbObject);
        $cont = $modelContent->getContent($pageId, $gid);
        if($cont['permission'] == 'open'){
            return $cont['content'];
        }
    }

    private function getSessionContent(){
        if(isset($_SESSION['user']))
            return "логин: ".$_SESSION['user'].' | <form action="" method="post">
    <input type="submit" name="out" value="exit">
</form> ';
        else
            return 'нужна авторизация';
    }
}
?>
