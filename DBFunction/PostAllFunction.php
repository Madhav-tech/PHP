<?php
function insertIntoPost($post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags)
{
    global $connection;
    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags) ";
    $query .= "VALUES ($post_category_id, '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags')";

    $insert_result = mysqli_query($connection, $query);
    return $insert_result;
}
function deletePost($id)
{
    global $connection;
    $query = "DELETE from posts where post_id = $id";
    $res = mysqli_query($connection, $query);

    if (!$res) {
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}

function getPostsFromId($post_id)
{
    global $connection;
    $query = "Select * from posts Where post_id = '$post_id'";
    $post_data = mysqli_query($connection, $query);
    if (!$post_data) {
        die(mysqli_errno($connection));
    }
    return $post_data;
}

function updatePost($post_id, $post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags)
{
    global $connection;


    $query  = "UPDATE posts SET post_category_id = $post_category_id, post_title = '$post_title' , ";
    $query .= "post_author = '$post_author', post_date = '$post_date', ";
    $query .= "post_image = '$post_image', post_content = '$post_content', ";
    $query .= "post_tags = '$post_tags' where post_id = '$post_id'";
    $res = mysqli_query($connection, $query);

    if (!$res) {
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}

function approvePost($status, $post_id)
{
    global $connection;
    $query  = "UPDATE posts SET post_status = '$status'  where post_id = '$post_id'";
    $res = mysqli_query($connection, $query);

    if (!$res) {
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}



