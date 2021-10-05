<?php

function insertIntoPost($post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags){
    global $connection;
    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags) ";
    $query .= "VALUES ($post_category_id, '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags')";

    $insert_result = mysqli_query($connection, $query);
    return $insert_result;
}
function delete($id){
    global $connection;
    $query = "DELETE from posts where post_id = $id";
    $res = mysqli_query($connection,$query);

    if(!$res){
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}

?>