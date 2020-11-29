<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="_df_book" height="800" webgl="true" backgroundcolor="transparent" source="KEPT.pdf" id="df_manual_book"></div>
    </div>
<?php require '../global/popup.php'; ?>
<?php require '../global/footer.php'; ?>
</body>

</html>