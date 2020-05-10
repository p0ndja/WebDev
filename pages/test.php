<?php
    require '../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $q = "SELECT * FROM `config` WHERE name = 'global_categoryListThing'";
    $r = mysqli_query($conn, $q);

    $arr = array();
    array_push($arr, "news");
    array_push($arr, "order");
    array_push($arr, "qa");

    saveConfig('global_categoryListThing', 'val', serialize($arr), $conn);

    print_r(getConfig('global_categoryListThing', 'val', $conn));
?>
