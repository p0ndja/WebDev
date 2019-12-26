<?php include '../global/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php'; ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="row text-center">
            <?php echo '<img src="' . $_GET['img'] . '" width="100%" height="100%">'; ?>
        </div>
    </div>
</body>

<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>