<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <?php if (isLogin()) home(); ?>
    <div class="center container" id="container" style="padding-top: 88px">
        <form method="post" action="../global/auth/login.php" enctype="multipart/form-data">
            <div class="card">
                <!--Body-->
                <div class="card-body mb-1">
                    <h1 class="display-5 text-center">LOGIN <i class="fas fa-sign-in-alt"></i></h1>
                    <?php if (isset($_SESSION['error'])) {echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>'; $_SESSION['error'] = null;} ?>
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-user prefix"></i>
                        <input type="text" name="login_username" id="login_username"
                            class="form-control form-control-sm validate" required>
                        <label for="login_username">Username</label>
                    </div>
                    <div class="md-form form-sm mb-4">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" name="login_password" id="login_password"
                            class="form-control form-control-sm validate" required>
                        <label for="login_password">Password</label>
                    </div>
                    <input type="hidden" name="method" value="loginPage">
                </div>
                <!--Footer-->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <a href="../forgetpw/" class="text-danger">ลืมรหัสผ่านหรอ?</a> หรือ <a href="../register/" class="text-smd">สมัครเข้าใช้งานที่นี่!</a>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" name="login_submit" value="ล็อกอิน"></input>
                            <a class="btn btn-danger" href="../home/">ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php require '../global/popup.php'; ?>
    <div class="d-none">
    <?php require '../global/footer.php'; ?>
    </div>
</body>

</html>