<?php
    require '../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $q = "SELECT * FROM `user`";
    $r = mysqli_query($conn, $q);

    $arr = array();
    $arr["user"] = array();

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        $item=array(
            "id" => $row['id'],
            "user" => $row['username'],
            "grade" => $row['grade'],
            "class" => $row['class']
        );

        array_push($arr["user"], $item);
    }

    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>