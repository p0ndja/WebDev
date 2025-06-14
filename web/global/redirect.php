<?php
    if(isset($_GET['url'])) {
        header("Location: " . $_GET['url']);
    } else {
        header("Location: ../home");
    }
?>