<?php
    require '../../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $q = "SELECT * FROM `admissions`";
    $r = mysqli_query($conn, $q);

    $arr = array();
    $arr["std"] = array();

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        $arr["std"][$row['id']] = array();

        $item=array(
            "prefix" => $row['prefix'],
            "name" => $row['name'],
            "class" => $row['class'],
            "round" => $row['round'],
            "university" => $row['university'],
            "faculty" => $row['faculty'],
            "subject" => $row['subject'],
            "addon" => $row['addon']
        );

        array_push($arr["std"][$row['id']], $item);
    }

    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>