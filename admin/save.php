<?php
    require '../global/connect.php';
    if (isset($_POST['name']) && isset($_POST['col']) && isset($_POST['val'])) {
        return saveConfig($_POST['name'], $_POST['col'], '"'.$_POST['val'].'"', $conn);
    }
    if (isset($_POST['name']) && isset($_POST['col']) && isset($_POST['bool'])) {
        return saveConfig($_POST['name'], $_POST['col'], $_POST['bool'], $conn);
    }
?>