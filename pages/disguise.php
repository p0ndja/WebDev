<?php include '../global/connect.php'; ?>
<head><?php include '../global/head.php'; ?></head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
        needLogin(); 
        if ($_GET['id'] == $_SESSION['real_id']) {
            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $_SESSION['pi'] = getProfilePicture($id, $conn);
            $_SESSION['user'] = getUserdata($id, 'username', $conn);
            $_SESSION['fn'] = getUserdata($id, 'firstname', $conn);
            $_SESSION['ln'] = getUserdata($id, 'lastname', $conn);
        } else {
            needPermission('isAdmin', $conn);
            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $_SESSION['pi'] = getProfilePicture($id, $conn);
            $_SESSION['user'] = getUserdata($id, 'username', $conn);
            $_SESSION['fn'] = '<i>' . getUserdata($id, 'firstname', $conn);
            $_SESSION['ln'] = getUserdata($id, 'lastname', $conn). '</i>';
        }
        
        
    }
    header("Location: ../home");
?>
</body>
<footer class="d-none">
<?php include '../global/footer.php'; ?>
</footer>
<?php include '../global/popup.php'; ?>