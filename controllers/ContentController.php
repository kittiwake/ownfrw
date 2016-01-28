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

        switch ($sessError){
            case 'You are denied access' :
                $content = 'Вам нельзя';
                break;
            case 'You need to log in' :
            case 'Invalid login or password' :
            default:
                $contentf = 'auth.tpl';
                break;
            case 'session started' :
            case 'session ok' :
                $content = $this->buildLoggedInPage($routerError);
                break;
        }
        return $content;
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
} 