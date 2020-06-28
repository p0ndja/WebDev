<?php
    ob_start();
    session_start(); if (!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false;
    $dbhost = "p0nd.ga";
    $dbuser = "pondjaco";
    $dbpass = "11032545";
    $dbdatabase = "pondjaco_smdkkucheck";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);
    mysqli_set_charset($conn, 'utf8');

    if(!$conn)  die('Could not connect: ' . mysqli_error($conn));
    
    require '../global/function.php';

    @ini_set('upload_max_size','64M');
    @ini_set('post_max_size','64M');
    @ini_set('max_execution_time','300');
    

    date_default_timezone_set('Asia/Bangkok');

?>
<?php

	$r = mysqli_query($conn, "ALTER TABLE `2563` ADD COLUMN IF NOT EXISTS `d28062020` LONGTEXT DEFAULT NULL");
	if (!$r) {
		die();
	}

	$i = array();
	

?>