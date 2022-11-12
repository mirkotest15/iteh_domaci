<?php

class User{
    public $id;
    public $username;
    public $password;


    public function __construct($id = null, $username=null, $password = null){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public static function logIn($name, $password, mysqli $conn){
        $q = "select * from users where username= '".$name."' and password ='".$password."' limit 1;";
        
        return $conn->query($q);
    }

    public static function register($name, $password, $email, mysqli $conn)
    {
        $q = "insert into users value('".$name."', '".$name."', '".$name."')";

        return $conn->query($q);
    }
}
?>