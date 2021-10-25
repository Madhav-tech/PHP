<?php
include_once "../Database_classes/dbconfig.php";
$db = new DbConfig();
$connection = $db->getConnection();

$text = $_GET['text'];
$res = '<strong>Suggestion:</strong><br>';
if (strlen($text) !== 0) {
    $query = "SELECT * from categories where cat_title LIKE '%$text%'";
    $queryResult = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($queryResult)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        $res .= "<a href = 'search.php?cat_id=$cat_id'>$cat_title</a>" . "<br>";
    }
}
echo $res;
