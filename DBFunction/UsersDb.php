<?php

function deleteUser($id)
{
    global $connection;
    $query = "DELETE from users where user_id = $id";
    $res = mysqli_query($connection, $query);

    if (!$res) {
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}



class Users
{
    private $queryResult;
    private $query;

    // function insertIntoUsers($username, $password, $userId)
    // {

    //     //insert into users table
    //     global $connection;
    //     $this->query = "INSERT INTO users ( username, password, user_details_id) VALUES ('{$username}', '{$password}', '{$userId}')";
    //     $this->queryResult = mysqli_query($connection, $this->query);
    //     return $this->queryResult;
    // }

    function getUser($username,$password){
        global $connection;
        $this->query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        $this->queryResult = mysqli_query($connection, $this->query);
        return $this->queryResult;
    }
    function getUserFromId($userId){
        global $connection;
        $this->query = "SELECT * FROM users WHERE user_id = '{$userId}'";
        $this->queryResult = mysqli_query($connection, $this->query);
        return $this->queryResult;
    }
}

