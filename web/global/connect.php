<?php
    ob_start();
    require_once 'conf.php';

    $dbhost = $db["hostname"];
    $dbuser = $db["username"];
    $dbpass = $db["password"];
    $dbdatabase = $db["database"];
    $dbdatabaseForum = $db["databaseForum"];
    //$dbdatabaseOther = "smdkku_smdkku_smdkkuother";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase); 
    $connForum = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabaseForum); 
    // $connForum = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabaseOther); 
    mysqli_set_charset($conn, 'utf8');
    mysqli_set_charset($connForum, 'utf8');

    if(!$conn)  die('Could not connect: ' . mysqli_error($conn));
    if(!$connForum)  die('Could not connect: ' . mysqli_error($connForum));
    
    require 'function.php';

    if (isset($_SESSION['id']) && !isValidUserID($_SESSION['id'], $conn)) header("Location: ../logout/");

    @ini_set('upload_max_size','64M');
    @ini_set('post_max_size','64M');
    @ini_set('max_execution_time','300');

    date_default_timezone_set('Asia/Bangkok');
    session_start(); if (!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false;
?>
