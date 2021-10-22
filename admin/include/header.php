<?php ob_start();
session_start(); ?>


<?php
include "../Database_Classes/dbconfig.php";

$db = new DbConfig();
$connection = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Custom CSS -->
    <link href="css/mycss.css" rel="stylesheet">

    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.1/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
 
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>

<body style=" min-width: 80%;">
    <?php include "include/topnav.php" ?>