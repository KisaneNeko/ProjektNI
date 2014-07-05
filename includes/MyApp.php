<?php
require_once("Controller/Controller.php");
require_once("Model/Model.php");
require_once("Model/Admin.php");

class MyApp {

    public static function execute(){
        $action = isset($_REQUEST['action']) ? $_REQUEST['action']: '';
        $logout = isset($_REQUEST['option']) ? $_REQUEST['option']: '';
        $Controller = Controller::createController();
        session_start();
        if(!isset($_SESSION['logged'])) $_SESSION['logged']=0;
        if ($logout == 'logout'){
            Admin::logout();
        }
        if ($action == 'gallery' || $action == 'rules' || $action == 'halls'){ $action = 'static';}
        switch($action){
            case '':
                $Controller->mainPage();
                break;
            case 'static':
                $Controller->staticPage($_REQUEST['action']);
                break;
            case 'adminPanel':
                $Controller=new $Controller(Admin::createAdmin());
                $Controller->adminPanel();
                break;
            case 'reservation':
                $Controller= new Controller(Model::createModel());
                $Controller->newReservation();
                break;
            case 'logging':
                $Controller = new Controller(Model::createModel());
                $Controller->loggingIn();
                break;
            default:
                $Controller->wrongPath();
                break;
        }
    }
}