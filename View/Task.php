<?php
class Task{
    private $_name;

    public function __construct($name){
        $this->_name=$name;
    }

    public function display($data=[]){
        $path = 'Templates/'.$this->_name.'template.php';
        if(file_exists($path)){
            include $path;
        }
    }


}