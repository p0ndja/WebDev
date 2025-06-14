<?php 
    require '../static/functions/connect.php';
?>

<!DOCTYPE html>
<html lang="th" prefix="og:http://ogp.me/ns#">

<head>
    <?php require '../static/functions/head.php'; ?>
</head>
<nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
    <?php require '../static/functions/navbar.php'; ?>
</nav>

<body>
    <div class="center container" id="container" style="padding-top: 88px">
        <form method="post" action="../global/resetpassword/password_resetpass.php" enctype="multipart/form-data">
            <div class="card">
                <!--Body-->
                <div class="card-body mb-1">
                    <h1 class="display-5 text-center">Setting New Password <i class="fas fa-lock"></i></h1>
                    <h6 class="text-center">ตั้งค่ารหัสผ่านใหม่</h6>
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-key prefix"></i>
                        <input type="password" name="setNewPassword" id="setNewPassword"
                            class="form-control form-control-sm validate" required>
                        <label for="setNewPassword">รหัสผ่านใหม่</label>
                    </div>
                </div>
                <!--Footer-->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <a href="../login/" class="text-danger">เข้าสู่ระบบหรอ?</a> หรือ <a href="../register/">สมัครเข้าใช้งานที่นี่!</a>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" name="resetPassword" value="รีเซ็ตรหัสผ่าน"></input>
                            <a class="btn btn-danger" href="../home/">ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <?php require '../static/functions/popup.php'; ?>
    <div class="d-none">
    <?php require '../static/functions/footer.php'; ?>
    </div>
</body>

</html>