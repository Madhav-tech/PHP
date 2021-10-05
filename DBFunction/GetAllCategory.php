<?php 
    
function getAllCategories(){
    global $connection;
    $query = "Select * from categories";
    $categories_data = mysqli_query($connection, $query);
    if(!$categories_data){
        die(mysqli_errno($connection));
    }
    return $categories_data;
}
function getCategoryFromId($cat_id){
    global $connection;
    $query = "Select * from categories Where cat_id = '$cat_id'";
    $category_data = mysqli_query($connection, $query);  
    if(!$category_data){
        die(mysqli_errno($connection));
    }
    return $category_data;
}

function getAllCategoriesFromTitle($cat_title){
    global $connection;
    $query = "Select * from categories Where cat_title = '$cat_title'";
    $categories_data = mysqli_query($connection, $query);
    if(!$categories_data){
        die(mysqli_errno($connection));
    }
    return $categories_data;

}
function insertIntoCategoryTable($cat_title){
    global $connection;
    $query = "Insert Into categories(cat_title) value('$cat_title')";
    $query_result = mysqli_query($connection,$query);
    return $query_result;
}

function delete($id){
    global $connection;
    $query = "DELETE from categories where cat_id = $id";
    $res = mysqli_query($connection,$query);

    if(!$res){
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}

function update($id,$title){
    global $connection;
    $query  = "UPDATE categories SET  cat_title ='$title' ";
    $query .= " where cat_id = $id";
    $res = mysqli_query($connection,$query);
    
    if(!$res){
        die("Query Faild<br>" . mysqli_error($connection));
    }
    return true;
}
?>