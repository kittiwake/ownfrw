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
            case 'Invalid login or password' :
            case 'You are denied access' :
                ;
                break;
            case 'You need to log in' :
                ;
                break;
            case 'session started' :
            case 'session ok' :
                $content = $this->buildLoggedInPage($routerError);
                include(SITE_PATH.'/views/main.php');
            break;
        }
    }

    private function buildLoggedInPage($pageId){
        $modelContent = new Pages($this->dbObject);
        $cont = $modelContent->getContent($pageId);
        if($cont['permission'] == 'open'){
            return $cont['content'];
        }

    }
} 