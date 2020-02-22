<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
    <?php if (isset($_POST['submit'])) {
        
    } ?>
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
        <div class="fixed-action-btn" style="bottom: 40px; right: 30px;">
            <input type="submit" class="btn btn-success" align="left" name="submit"
                                value="บันทึก"></input>
                <!--ul class="list-unstyled">
                    <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
                    <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
                    <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
                    <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
                </ul-->
        </div>
        <div class="col-12 col-md-6">
            <div class="card card-body card-text mb-3">
            <form method="POST" action="../admin/">
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
                        <input type="checkbox" name="<?php echo $get_config['name'];?>" <?php echo $b; ?>>
                        <span class="lever"></span>
                        <a style="color: black;" class="material-tooltip-main" data-toggle="tooltip" title="<?php echo $get_config['description'] . ' (' . $get_config['name'] . ')';?>">
                        <?php echo $get_config['title'];?>
                        </a>
                    </label>
                </div>
                <?php } ?>
            </div>
            </form>
        </div>
    </div>
<script>
$('.switch input[type="checkbox"]').on('change', function(e) {
    console.log(e.target.checked);
    console.log(e.target.name);

    $.ajax({
        url: "save.php",  
        type: "POST",
          //pass data like this 
          data: {name: e.target.name, col: "bool", val: e.target.checked},
        cache: false,
        success: function(data) {  
            if (data=="S")
                $('#message').html("<h2>Current balance has been updated!</h2>") 
        } 

    });

});
</script>
</body>

<?php include '../global/footer.php' ?>
<?php include '../global/popup.php' ?>

</html>