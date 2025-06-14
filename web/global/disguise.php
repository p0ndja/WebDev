<?php require '../global/connect.php'; ?>
<head><?php require '../global/head.php'; ?></head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
        needLogin();
        if ($_GET['id'] == $_SESSION['real_id']) {
            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $_SESSION['username'] = getUserdata($id, 'username', $conn);
            $_SESSION['name'] = getUserdata($id, 'firstname', $conn) . ' ' . getUserdata($id, 'lastname', $conn);
            $_SESSION['shortname'] = getUserdata($id, 'firstname', $conn);
        } else {
            if (checkPermission('isAdmin', $_SESSION['real_id'], $conn)) {
                $id = $_GET['id'];
                $_SESSION['id'] = $id;
                $_SESSION['username'] = getUserdata($id, 'username', $conn);
                $_SESSION['name'] = '<i>' . getUserdata($id, 'firstname', $conn) . ' ' . getUserdata($id, 'lastname', $conn) . '</i>';
                $_SESSION['shortname'] = '<i>' . getUserdata($id, 'firstname', $conn) . '</i>';
            } else {
                needPermission('isAdmin', $conn);
            }
        }
        
        
    }
    home();
?>
<footer class="d-none">
<?php require '../global/footer.php'; ?>
</footer>
<?php require '../global/popup.php'; ?>
</body>
