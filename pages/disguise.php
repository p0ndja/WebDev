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
            $_SESSION['username'] = getUserdata($id, 'username', $conn);
            $_SESSION['name'] = getUserdata($id, 'firstname', $conn); . ' ' . getUserdata($id, 'lastname', $conn);
            $_SESSION['shortname'] = getUserdata($id, 'firstname', $conn);
        } else {
            needPermission('isAdmin', $conn);
            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $_SESSION['username'] = getUserdata($id, 'username', $conn);
            $_SESSION['name'] = '<i>' . getUserdata($id, 'firstname', $conn); . ' ' . getUserdata($id, 'lastname', $conn) . '</i>';
            $_SESSION['shortname'] = '<i>' . getUserdata($id, 'firstname', $conn) . '</i>';
        }
        
        
    }
    home();
?>
<footer class="d-none">
<?php include '../global/footer.php'; ?>
</footer>
<?php include '../global/popup.php'; ?>
</body>
