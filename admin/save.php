<?php
    include '../global/connect.php';
    if (isset($_POST['name']) && isset($_POST['col']) && isset($_POST['val'])) {
        $q = "UPDATE `config` SET " . $_POST['col'] . " = ". $_POST['val'] . " WHERE name = '" . $_POST['name'] . "'";
        echo $q;
        $r = mysqli_query($conn, $q);
        if (!$r)
            die('Could not get data: '.mysqli_error($conn));
        else echo "S";
    }
?>