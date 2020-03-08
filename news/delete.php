<?php include '../global/connect.php'; ?>
<head><?php include '../global/head.php'; ?></head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
        needLogin(); needPermission('isNewsReporter', $conn);
        $id = $_GET['id'];
        $q = "DELETE FROM `post` WHERE id = $id";
        $r = mysqli_query($conn, $q);
        if (!$r) die('Could not get data: '.mysqli_error($conn)); ?>
        <script>swal("ลบโพสต์ข่าว ID : <?php echo $id; ?> เรียบร้อยแล้ว!", {icon: "success",}).then(setTimeout(function (){window.history.back()}, 1800)); </script>
    <?php }
?>
</body>
<footer class="d-none">
<?php include '../global/footer.php'; ?>
</footer>
<?php include '../global/popup.php'; ?>