<?php require '../global/connect.php'; ?>
<head><?php require '../global/head.php'; ?></head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
        needLogin(); needPermission('isAdmin', $conn);
        $id = $_GET['id'];
        $q = "DELETE FROM `user` WHERE id = $id"; $r = mysqli_query($conn, $q); if (!$r) die('Could not delete data: '.mysqli_error($conn)); 
        $q = "DELETE FROM `achievement` WHERE id = $id"; $r = mysqli_query($conn, $q); if (!$r) die('Could not delete data: '.mysqli_error($conn)); 
        $q = "DELETE FROM `profile` WHERE id = $id"; $r = mysqli_query($conn, $q); if (!$r) die('Could not delete data: '.mysqli_error($conn)); 
        if (is_dir('../file/profile/'.$id)) rmdir('../file/profile/' . $id);
        ?>
        <script>swal("ลบผู้ใช้งาน ID : <?php echo $id; ?> เรียบร้อยแล้ว!", {icon: "success",}).then(setTimeout(function (){window.history.back()}, 1800)); </script>
    <?php }
?>
<footer class="d-none">
<?php require '../global/footer.php'; ?>
</footer>
<?php require '../global/popup.php'; ?>
</body>