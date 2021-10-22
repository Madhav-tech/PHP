<?php

function deletePostImpl($post_id)
{
    $msg = "";
    //deletePost()---> PostAllFunction
    if (deletePost($post_id)) {
        $msg = "Post deleted";
    }
    return $msg;
}

//update a post
function UpdatePostImpl()
{
    global $connection;
    $msg = "";
    $post_id = mysqli_real_escape_string($connection, $_POST["post_id"]);
    $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
    $post_category_id = mysqli_real_escape_string($connection, $_POST['post_category_id']);
    $post_author = mysqli_real_escape_string($connection, $_POST['post_author']);
    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_tags = mysqli_real_escape_string($connection, $_POST['post_tags']);
    $post_date =  date("Y-m-d");
    $post_image = "";

    //if image change goto if otherwise else
    if (!empty($_FILES['image']['name'])) {
        $post_image = $_FILES['image']['name'];
        $post_image_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_path, "../image/$post_image");
    } else {

        //if no want to update image search existing image name
        $query = "Select post_image from posts where post_id = $post_id ";
        $res = mysqli_query($connection, $query);
        if (!$res) {
            die(mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($res);
        $post_image = $row['post_image'];
    }

    //UpdatePost()---> PostAllFunction
    $update_result = UpdatePost($post_id, $post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags);
    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "Post Updated";
    }
    return $msg;
}


//APPROVE A COMMENT
function approvePostImpl($status, $post_id)
{
    $msg = "";
    global $connection;
    $update_result = approvePost($status, $post_id);
    if (!$update_result) {
        die(mysqli_error($connection));
    } else {
        $msg = "Post Status Change";
    }
    return $msg;
}
