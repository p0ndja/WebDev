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
    <div class="container" id="container" style="padding-top: 88px">
        <div class="card mb-3">
                <div class="card-body mb-1">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="https://img.p0nd.ga/2020/07/25/3275434.jpg" class="img-fluid w-100">
                    </div>
                <div class="col-12 col-md-6">
                    <div class="modal-text">
                        <p class="text-center display-5">System is not ready.</p>
                        <p class="text-center">กรณีที่คุณลืมรหัสผ่าน / ลืมชื่อผู้ใช้งาน<br>ให้ใช้ข้อมูลดังต่อไปนี้ในการเข้าสู่ระบบชั่วคราว<hr><b>ชื่อผู้เข้าใช้งาน / Username </b>คือ <b>รหัสนักเรียน / รหัสประจำตัวผู้ใช้งาน</b> <i>(กรณีอาจารย์ให้ติดต่อรับรหัสประจำตัวที่แอดมิน)</i><br><b>รหัสผ่าน / Password </b>คือ <b>เลขบัตรประชาชน</b><hr>ขออภัยในความไม่สะดวก</p>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <?php require '../global/popup.php'; ?>
    <div class="d-none">
    <?php require '../global/footer.php'; ?>
    </div>
</body>

</html>