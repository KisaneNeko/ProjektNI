<?php
require_once('View/Task.php');
require_once('Model/Model.php');
class Controller{

    private $_model;

    public function __construct($model=''){
        $this->_model= $model;
    }

    public static function createController($model=''){
        return $controller = new Controller($model);
    }

    public function mainPage(){
        $view = new Task('mainPage');
        $view->display();
    }

    public function staticPage($name){
        $view = new Task($name);
        $view->display();
    }

    public function wrongPath(){
        $view = new Task("wrongPath");
        $view->display();
    }

    public function newReservation(){

        if($this->_model->validateReservation()){
            $this->_model->addReservation();
            $view = new Task('reservationAdded');
            $view->display();
        } else {
            $view = new Task('reservation');
            $view->display();
        }
    }

    public function loggingIn(){
        if($this->_model->validateLogIn()){
            $_SESSION['logged'] = 1;
            $view = new Task('successfullyLogged');
            $view->display();
        } else {
            $view = new Task('logIn');
            $view->display();
        }
    }

    public function showReservations(){
        $view = new Task('showReservations');
        $model = new Admin();
        $view->display($model->returnReservations());
    }

    public function adminPanel(){
        $rights = $_SESSION['logged'];
        $_SESSION['delete']=false;
        $_SESSION['update']=false;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id']: '';
        $subaction = isset($_REQUEST['subaction']) ? $_REQUEST['subaction']: '';
        //echo $subaction;
        //echo '<pre>'.var_dump($this->_model->returnReservations($id));
        if($rights==1){

            switch($subaction){
                case '':
                    $view = new Task('adminPanel');
                    $view->display();
                    break;
                case 'show':
                    $view = new Task('showReservations');
                    $view->display($this->_model->returnShortReservations());
                    break;
                case 'details':
                    $view = new Task('detailedReservations');
                    $view->display($this->_model->returnReservations($id));
                    break;
                case 'edit':
                    $view = new Task('editReservations');
                    $view->display($this->_model->returnReservations($id));
                    break;
                case 'delete':
                    $_SESSION['delete']=true;
                    $this->_model->deleteReservation($id);
                    $view = new Task('showReservations');
                    $view->display($this->_model->returnShortReservations());
                    break;
                case 'edited':
                    if($this->_model->validateEdit()){
                        $_SESSION['update']=true;
                        $this->_model->updateReservation($id);
                        $view = new Task('showReservations');
                        $view->display($this->_model->returnShortReservations());
                    }else{
                        $_SESSION['validate'] = false;
                        $view = new Task('editReservations');
                        $view->display($this->_model->returnReservations($id));
                    }
                    break;
                default:
                    self::wrongPath();
                    break;
            }
        }else{
            $view = new Task('noPermission');
            $view->display();
        }
    }

}