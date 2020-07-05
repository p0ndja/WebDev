<?php
    require '../connect.php';
    $key = $_GET['key'];
    $email = $_GET['email'];

    $query1 = "SELECT * FROM `user` WHERE email = '$email' AND password = '$key'";
    $result1 = mysqli_query($conn, $query1);
    if (! $result1) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    if (mysqli_num_rows($result1) == 0) {
        die("ERR");
    } else {
        $query1 = "UPDATE `user` SET isEmailVerify = true WHERE email = '$email'";
        $result1 = mysqli_query($conn, $query1);
        if (! $result1) {
            die('Could not get data: ' . mysqli_error($conn));
        }
        die("YES");   
    }
?>