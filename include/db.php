<?php

    const host= "localhost";
    const user = "root";
    const password = "";
    const db = "cms";
 
    $connection = mysqli_connect(host,user,password,db);
    if(!$connection){
        die('Database Connection failed');
    }

?>

