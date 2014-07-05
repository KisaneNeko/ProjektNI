<?php
require_once('includes/DataBase.php');
class Admin extends Model{


    public function returnReservations($id = ''){
        $PDO = MyDataBase::openConnectionToDataBase();
        $selectSQL = "SELECT * FROM rezerwacje";
        if( !empty($id) ){
            $selectSQL .= " WHERE id='{$id}' ";
            if ($result = $PDO->query($selectSQL)){
                $obj = $result->fetch(PDO::FETCH_ASSOC);
                return $obj;
            }
        }
        if ($result = $PDO->query($selectSQL)){
            $reservations = array();
            while($obj = $result->fetch(PDO::FETCH_ASSOC)){
                $reservations[] = $obj;
            }
            return $reservations;
        } return false;
    }

    public static function createAdmin(){
        return $admin = new Admin;
    }

    public function returnShortReservations(){
        $PDO = MyDataBase::openConnectionToDataBase();
        if ($result = $PDO->query("SELECT id, created_at, conference_hall_number, reserved_from, reserved_to, paid FROM rezerwacje ORDER BY rezerwacje.created_at DESC")){
            $reservations = array();
            while($obj = $result->fetch(PDO::FETCH_ASSOC)){
                $reservations[] = $obj;
            }
            //echo '<pre>'.var_dump($reservations);
            return $reservations;
        } return false;
    }

    public static function logout(){
        $_SESSION['logged']=0;
        $_REQUEST['username']='';
        $_REQUEST['password']='';
    }


    public function updateReservation($id){
        $PDO = MyDataBase::openConnectionToDataBase();
        $stmt = $PDO->prepare("UPDATE rezerwacje SET conference_hall_number='{$_REQUEST['hallNumber']}', reserved_from='{$_REQUEST['reserveFrom']}', reserved_to='{$_REQUEST['reserveTo']}', table_scheme='{$_REQUEST['tableScheme']}',
        client_info='{$_REQUEST['clientInfo']}', client_company_info='{$_REQUEST['companyInfo']}', catering='{$_REQUEST['catering']}', notes='{$_REQUEST['notes']}', paid='{$_REQUEST['paid']}' WHERE id='{$id}'");
        $stmt->execute();
        $PDO=null;
    }

    public function deleteReservation($id){
        $PDO = MyDataBase::openConnectionToDataBase();
        $stmt = $PDO->prepare("DELETE FROM rezerwacje WHERE id='{$id}'");
        $stmt->execute();
        $PDO=null;
    }



}