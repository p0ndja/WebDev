<?php
    require '../../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $q = "SELECT * FROM `std_2563`";
    $r = mysqli_query($conn, $q);

    $arr = array();
    $arr["std"] = array();

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        $arr["std"][$row['id']] = array();

        $item=array(
            "id" => $row['id'],
            "prefix" => $row['prefix'],
            "firstname" => $row['firstname'],
            "lastname" => $row['lastname'],
            "grade" => $row['grade'],
            "class" => $row['class']
        );

        array_push($arr["std"][$row['id']], $item);
    }

    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>