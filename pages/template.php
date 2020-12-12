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
        <?php echo $loginResult; ?>
        <?php $s = $_SESSION['userData']; echo $s->getID(); ?>
        <a onclick="javascript:void window.open('../pages/flipbook_loader.php?file=<?php echo $_GET['file']?>','1606564880393','width=800,height=600,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=0,left=0,top=0');return false;">test</a>
    </div>
<?php require '../global/popup.php'; ?>
<?php require '../global/footer.php'; ?>
</body>

</html>