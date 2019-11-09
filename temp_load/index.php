<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php' ?>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark navbar-normal">
        <?php include '../global/navbar.php';?>
    </nav>
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