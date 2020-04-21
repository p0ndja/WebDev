<?php
    include '../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $q = "SELECT * FROM `std`";
    $r = mysqli_query($conn, $q);

    $arr = array();
    $arr["std"] = array();

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        $item=array(
            "id" => $row['id'],
            "firstname" => $row['firstname'],
            "lastname" => $row['lastname'],
            "grade" => $row['grade'],
            "class" => $row['class']
        );

        array_push($arr["std"], $item);
    }

    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>