<?php

class DbConfig{
    private  $host= "localhost";
    private  $user = "root";
    private  $password = "";
    private  $db = "cms";
    private $connection; 
    
    function __construct(){
       $this->connection = mysqli_connect($this->host,$this->user,$this->password,$this->db);
    }

    // $connection = mysqli_connect(host,user,password,db);
    // if(!$connection){
    //     die('Database Connection failed');

    public function getConnection()
    {
        return $this->connection;
    }
    
}

?>
