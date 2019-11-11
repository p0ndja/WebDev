<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php' ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top sticky" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="content"></div>
    <div class="container">
        <div class="row text-center">
            <?php
                    echo '<img src="' . $_GET['img'] . '" width="100%" height="100%">';
                ?>
        </div>
    </div>
    <?php include '../global/footer.php' ?>
</body>

</html>