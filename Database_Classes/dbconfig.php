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


    public function getConnection()
    {
        return $this->connection;
    }
    
}

?>
