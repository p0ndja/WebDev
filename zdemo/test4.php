<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal scrolling-navbar admin" id="nav" role="navigation">
        <?php require '../global/admin_navbar.php'; ?>
    </nav>
    <?php require '../global/admin_sideNav.php'; ?>
    <div class="container-fluid" id="main" style="padding-top: 19px">
        
                    <?php require ('../admin/post.php'); ?>
        </div>
</div>
    </div>

    <?php require '../global/popup.php'; ?>
    <footer class="d-none">
        <?php require '../global/footer.php' ?>
    </footer>
</body>
<script>
    $(window).on('load', function () {
        if (screen.width >= 992) openNav();
    });

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        if (screen.width >= 992) document.body.style.marginLeft = "250px";
        //PC USER will have 'push in' animation
        //Mobile USER will only have a overlay-slide in animation
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        if (screen.width >= 992) document.body.style.marginLeft = "0";
        //PC USER will have 'push out' animation
        //Mobile USER will only have a overlay-slide back animation
    }
</script>

</html>