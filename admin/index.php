<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
    <style>
    @media (min-width: 960px)
        {
        .card-columns {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
        }
    }

    @media (max-width: 960px)
        {
        .card-columns {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;
        }
    }
    </style>
</head>

<body class="admin">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar admin" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>

    <?php needLogin(); ?>

    <div class="container-fluid" id="container" style="padding-top: 88px">
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-lg green waves-effect waves-light" onclick="toastr.success('บันทึกค่าทั้งหมดเรียบร้อยแล้ว')"><i class="fas fa-save"></i></a>
    </div>
    <?php if(getConfig('global_override_checking_admin', 'bool', $conn)) { ?>
    <div class="alert alert-warning" role="alert"><p>GLOBAL_OVERRIDE_CHECKING_ADMIN</p></div>
    <?php } else needPermission('isAdmin', $conn);?>
        <div class="card-columns">
            <div class="card mb-3">
                <div class="card-body card-text mb-3">
                <div class="card-title card-text"><h1>Global Variable</h1></div>
                <hr>
                <?php
                    $cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[Global]%'");
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
                <?php if ($get_config['msg'] != null) { ?>
                    <input type="text" id="<?php echo $get_config['name']; ?>" name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate" <?php if (!$get_config['bool']) echo 'style="display: none"'; ?> value="<?php echo $get_config['msg'];?>" placeholder="<?php echo $get_config['msg_tooltip'];?>">
                <?php } ?>
                <hr>
                <?php } ?>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body card-text mb-3">
                <div class="card-title card-text"><h1>Achievement Variable</h1></div>
                <hr>
                <?php
                    $cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[Achievement]%'");
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
                <?php if ($get_config['msg'] != null) { ?>
                    <input type="text" id="<?php echo $get_config['name']; ?>" name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate" <?php if (!$get_config['bool']) echo 'style="display: none"'; ?> value="<?php echo $get_config['msg'];?>" placeholder="<?php echo $get_config['msg_tooltip'];?>">
                <?php } ?>
                <hr>
                <?php } ?>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body card-text mb-3">
                <div class="card-title card-text"><h1>Home Variable</h1></div>
                <hr>
                <?php
                    $cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[Home]%'");
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
                <?php if ($get_config['msg'] != null) { ?>
                    <input type="text" id="<?php echo $get_config['name']; ?>" name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate" <?php if (!$get_config['bool']) echo 'style="display: none"'; ?> value="<?php echo $get_config['msg'];?>" placeholder="<?php echo $get_config['msg_tooltip'];?>">
                <?php } ?>
                <hr>
                <?php } ?>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body card-text mb-3">
                <div class="card-title card-text"><h1>User Variable</h1></div>
                <hr>
                <?php
                    $cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[User]%'");
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
                <?php if ($get_config['msg'] != null) { ?>
                    <input type="text" id="<?php echo $get_config['name']; ?>" name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate" <?php if (!$get_config['bool']) echo 'style="display: none"'; ?> value="<?php echo $get_config['msg'];?>" placeholder="<?php echo $get_config['msg_tooltip'];?>">
                <?php } ?>
                <hr>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
<script>
    $('.form-control').on('change', function(e) {
    var x = document.getElementById(e.target.name).value;
    console.log("ID: " + e.target.name + " -> " + x);
    $.ajax({
        url: "save.php",  
        type: "POST",
        //pass data like this 
        data: {name: e.target.name, col: "msg", val: x},
        cache: false,
        success: function(data) {  
        if (data=="S")
            $('#message').html("<h2>Current balance has been updated!</h2>") 
        } 
    });
    toastr.success("อัพเดทค่า '" + e.target.name + "' เป็น " + x);
    });

    $('.switch input[type="checkbox"]').on('change', function(e) {
    var x = document.getElementById(e.target.name);
    if (x != null) {
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

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

    toastr.success("อัพเดทค่า '" + e.target.name + "' เป็น " + e.target.checked);
    });
</script>
</body>

<?php include '../global/footer.php' ?>
<?php include '../global/popup.php' ?>

</html>