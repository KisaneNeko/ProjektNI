<?php
require_once('includes/DataBase.php');
class Model{


    public function validateReservation(){

        $PDO = MyDataBase::openConnectionToDataBase();
        if(!empty($_REQUEST['reserveFrom']) && !empty($_REQUEST['reserveTo']) && !empty($_REQUEST['clientInfo']) && strlen($_REQUEST['clientInfo']) && !empty($_REQUEST['companyInfo']) && strlen($_REQUEST['companyInfo'])
            && !empty($_REQUEST['tableScheme']) && !empty($_REQUEST['catering'])){
             if($this->_checkDate($PDO)){
                $PDO=Null;
                return true;
            }
            $PDO=NULL;
            return false;
        }$PDO=NULL;
        return false;
}

    public static function validateLogIn(){
        $PDO = MyDataBase::openConnectionToDataBase();

        $username = isset($_REQUEST['username']) ? htmlspecialchars($_REQUEST['username']): '';
        $password = isset($_REQUEST['password']) ? md5(htmlspecialchars($_REQUEST['password'])): '';
        $result = $PDO->query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
        if($result->fetch(PDO::FETCH_NUM > 0)){
            $PDO = NULL;
            return true;
        }
        $PDO = NULL;
        return false;
     }

    public function addReservation(){
        $PDO = MyDataBase::openConnectionToDataBase();
        $stmt = $PDO->prepare("INSERT INTO rezerwacje (conference_hall_number, reserved_from, reserved_to, table_scheme,
        client_info, client_company_info, catering, notes) VALUES (:hallNumber,:reserveFrom,:reserveTo,:tableScheme,:clientInfo,
        :companyInfo,:catering,:notes)");

        $stmt->execute([
             ':hallNumber' => $_REQUEST['hallNumber'],
             ':reserveFrom' => $_REQUEST['reserveFrom'],
             ':reserveTo' => $_REQUEST['reserveTo'],
             ':tableScheme' => $_REQUEST['tableScheme'],
             ':clientInfo' => $_REQUEST['clientInfo'],
             ':companyInfo' => $_REQUEST['companyInfo'],
             ':catering' => $_REQUEST['catering'],
             ':notes' => $_REQUEST['notes'],
        ]);
        $PDO = null;
        return 'Dodano wierszy: '.$stmt->rowCount();
    }

    public function validateEdit(){
        if($_REQUEST['reserveTo'] > $_REQUEST['reserveFrom']){
            return true;
        } return false;
    }

    private function _checkDate($PDO){
        $hallNumber = isset($_REQUEST['hallNumber']) ? $_REQUEST['hallNumber']: '';
        $dateFrom = isset($_REQUEST['reserveFrom']) ? $_REQUEST['reserveFrom']: '';
        $dateTo = isset($_REQUEST['reserveTo']) ? $_REQUEST['reserveTo']: '';
        echo 'poczatek _checkdate';
        if($_REQUEST['reserveTo'] > $_REQUEST['reserveFrom']){
            echo 'reserveTo > reserveFrom';
            $result= $PDO->query("SELECT COUNT(*) as count FROM rezerwacje WHERE conference_hall_number='{$hallNumber}' AND ((reserved_from >= '{$dateFrom}' AND reserved_to >= '{$dateTo}') OR (reserved_from <= '{$dateFrom}' AND reserved_to >= '{$dateFrom}'))");
                 $obj=$result->fetch();
                    if($obj['count']>0){
                     return false;
                 } echo 'wszystko smiga'; return true;
        }echo 'nie sprawdzilo'; return false;
    }

    public static function createModel(){
        return $model=new Model();
    }

}
