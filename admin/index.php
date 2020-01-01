<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body class="admin">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar admin" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <?php
        $get_override_admin = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `config` WHERE name = 'global_override_checking_admin'"), MYSQLI_ASSOC);
        $conf_override_admin = $get_override_admin['bool'];
        if ($conf_override_admin) { ?>
        <div class="alert alert-warning" role="alert">
            <p>GLOBAL_OVERRIDE_CHECKING_ADMIN</p>
        </div>
        <?php } ?>
        <div class="col-12 col-md-5">
            <div class="card card-body card-text mb-3">
                <?php
                    $cor = mysqli_query($conn, "SELECT * FROM `config`");
                    while($get_config = mysqli_fetch_array($cor, MYSQLI_ASSOC)) {
                        $b = $get_config['bool'];
                        if ($b == true) $b = ' checked';
                        else $b = ' ';
                ?>
                <!-- Material checked -->
                <div class="switch switch-warning mb-1">
                    <label>
                        <input type="checkbox" id="<?php echo $get_config['name'];?>" <?php echo $b; ?>>
                        <span class="lever"></span>
                        <a style="color: black;" class="material-tooltip-main" data-toggle="tooltip" title="<?php echo $get_config['description'] . ' (' . $get_config['name'] . ')';?>">
                        <?php echo $get_config['title'];?>
                        </a>
                    </label>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

<?php include '../global/footer.php' ?>
<?php include '../global/popup.php' ?>

</html>