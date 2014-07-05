<?php
class MyDataBase extends PDO{

    public static function openConnectionToDataBase(){
       $PDO = new PDO('mysql:host=localhost;dbname=konferencje;', 'root', '');
       return $PDO;
    }




}