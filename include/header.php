<?php include_once "Database_classes/dbconfig.php";
include "DBFunction/UsersDb.php";
session_start();
$db = new DbConfig();
$connection = $db->getConnection();
$_SESSION['connection'] = $connection;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    <title>Blog Home - Start Bootstrap Template</title>

    <link href="css/mycss.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body style="height: 100%; margin:0 auto; background-repeat: no-repeat; background-attachment: fixed;">
    <!-- Navigation -->
    <?php include "include/navigation.php" ?>
    <div id="page-container">
        <div id="content-wrap">