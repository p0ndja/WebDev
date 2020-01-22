<?php
    include '../global/head.php';
    if (isset($_POST['value'])) {
        $q = "UPDATE config SET " . $_POST['value'] . "=". $_POST['status'] . " WHERE name = " . $_POST['value'];
        $r = mysqli_query($conn, $q);
    if (!$r)
        die('Could not get data: '.mysqli_error($conn));

    }
?>