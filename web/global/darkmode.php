<?php require '../global/connect.php'; ?>
<?php 
    if ($_SESSION['dark_mode'] == true) $_SESSION['dark_mode'] = false;
    else $_SESSION['dark_mode'] = true;
    back();
?>