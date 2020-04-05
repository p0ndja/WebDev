<?php

    //Don't forget to change file name to connect.php
    //and edit the information below to your.

    ob_start();
    session_start();
    $dbhost = "<<HOST IP>>";
    $dbuser = "<<USERNAME>>";
    $dbpass = "<<PASSWORD>>";
    $dbdatabase = "<<DATABASE>>";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);
    mysqli_set_charset($conn, 'utf8');

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    include('function.php');

    @ini_set( 'upload_max_size' , '64M' );
    @ini_set( 'post_max_size', '64M');
    @ini_set( 'max_execution_time', '300' );

?>
