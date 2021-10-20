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


// function approveComment($status, $comment_id)
// {
//     global $connection;
//     $query  = "UPDATE comments SET comment_status = '$status'  where comment_id = '$comment_id'";
//     $res = mysqli_query($connection, $query);

//     if (!$res) {
//         die("Query Faild<br>" . mysqli_error($connection));
//     }
//     return true;
// }
