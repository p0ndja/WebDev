<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="card">
            <div class="card-body">
                <?php if (isset($_SESSION['forum_error']) && $_SESSION['forum_error'] != null) {echo $_SESSION["forum_error"]; $_SESSION['forum_error'] = null;} else header("Location: ../forum/"); ?>
            </div>
            <div class="card-footer">
                <a href="../forum/">กลับ</a>
            </div>
        </div>
    </div>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>