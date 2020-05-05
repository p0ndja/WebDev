<?php
    include '../global/connect.php';
    if (isset($_POST['name']) && isset($_POST['col']) && isset($_POST['bool'])) {
        return saveStdCheckdata($_POST['name'], $_POST['col'], $_POST['bool'], $conn);
    }
?>