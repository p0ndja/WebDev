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
    <div class="center container" id="container" style="padding-top: 88px">
        <form method="post" action="../global/resetpassword/passwordlookup.php" enctype="multipart/form-data">
            <div class="card mb-3">
                <!--Body-->
                <div class="card-body mb-1">
                    <h1 class="display-5 text-center">Forget Password <i class="fas fa-question"></i></h1>
                    <h6 class="text-center">ส่งคำร้องรีเซ็ตรหัสผ่าน</h6>
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-users prefix"></i>
                        <input type="email" name="reset" id="reset" class="form-control form-control-sm validate" required="" placeholder="กรุณาใส่ E-Mail ใช้ในการสมัครเพื่อรีเซ็ตรหัสผ่าน">
                        <label for="reset" class="active">รีเซ็ตรหัสผ่าน</label>
                    </div>
                                    </div>
                <!--Footer-->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <a href="../login/" class="text-danger">เข้าสู่ระบบหรอ?</a> หรือ <a href="../register/" class="text-smd">สมัครเข้าใช้งานที่นี่!</a>
                        </div>
                        <div>
                            <span class="waves-input-wrapper waves-effect waves-light"><input class="btn btn-success" type="submit" name="resetPassword" value="ดำเนินการต่อ"></span>
                            <a class="btn btn-danger waves-effect waves-light" href="../home/">ยกเลิก</a>
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