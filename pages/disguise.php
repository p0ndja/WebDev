<?php include '../global/connect.php'; ?>
<head><?php include '../global/head.php'; ?></head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
        needLogin(); needPermission('isAdmin', $conn);
        $_SESSION['id'] = $_GET['id'];
        $_SESSION['fn'] = "โหมดปลอมตัว";
        $_SESSION['ln'] = "Disguise Mode";
    }
    header("Location: ../home");
?>
</body>
<footer class="d-none">
<?php include '../global/footer.php'; ?>
</footer>
<?php include '../global/popup.php'; ?>