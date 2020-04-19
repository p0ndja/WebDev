<?php
include '../global/connect.php';

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$q = "SELECT * FROM `user`";
$r = mysqli_query($conn, $q);

    $products_arr = array();
    $products_arr["user"] = array();

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $product_item=array(
        "id" => $row['id'],
        "user" => $row['username'],
        "grade" => $row['grade'],
        "class" => $row['class']
    );

    array_push($products_arr["user"], $product_item);
}
echo json_encode($products_arr);

  
// database connection will be here
?>