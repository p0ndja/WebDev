<?php
    $dbhost = "remotemysql.com:3306";
    $dbuser = "9SksUB0FHK";
    $dbpass = "DnvUqpwKb0";
    $dbdatabase = '9SksUB0FHK';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error());
    }

?>