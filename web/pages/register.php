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
    <?php if (isLogin() || !getConfig('user_allowRegister', 'bool', $conn)) home(); ?>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="card mb-3">
            <form method="post" action="../global/auth/login.php" enctype="multipart/form-data">
                <!--Body-->
                <div class="card-body mb-1">
                    <h1 class="display-5 text-center">REGISTER <i class="far fa-edit"></i></h1>
                    <?php
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>';
                                    $_SESSION['error'] = null;
                                }
                                ?>
                    <div class="alert alert-info" role="alert"><b>ช่องที่มี *
                            คือจำเป็นต้องกรอก</b><br>กรุณาอ่านรายละเอียดให้ครบถ้วนและกรอกข้อมูลให้ถูกต้องตามความเป็นจริงเพื่อประโยชน์ต่อการใช้งาน
                    </div>
                    <div class="form-inline">
                        <div class="form-row">
                            <label for="register_prefix" class="col-form-label col-md-auto">คำนำหน้า* </label>
                            <div class="align-items-center col-md-auto d-flex">
                                <select class="form-control" id="register_prefix" name="register_prefix" required>
                                    <option value="เด็กชาย">เด็กชาย</option>
                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md-form form-sm mb-1">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" id="register_firstname_en" name="register_firstname_en"
                                    class="form-control form-control-sm validate">
                                <label for="register_firstname_en">Firstname (ENG)</label>
                            </div>
                            <div class="col">
                                <input type="text" id="register_lastname_en" name="register_lastname_en"
                                    class="form-control form-control-sm validate">
                                <label for="register_lastname_en">Lastname (ENG)</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" id="register_firstname" name="register_firstname"
                                    class="form-control form-control-sm validate" required>
                                <label for="register_firstname">ชื่อ (ภาษาไทย)*</label>
                            </div>
                            <div class="col">
                                <input type="text" id="register_lastname" name="register_lastname"
                                    class="form-control form-control-sm validate" required>
                                <label for="register_lastname">นามสกุล (ภาษาไทย)*</label>
                            </div>
                        </div>
                    </div>
                    <div class="md-form form-sm mb-1">
                        <i class="fas fa-id-badge prefix"></i>
                        <input type="text" name="register_username" id="register_username"
                            class="form-control form-control-sm validate" required>
                        <label for="register_username">ชื่อผู้ใช้งาน*</label>
                    </div>
                    <div class="md-form form-sm mb-1">
                        <i class="fas fa-key prefix"></i>
                        <input type="password" name="register_password" id="register_password"
                            class="form-control form-control-sm validate" required>
                        <label for="register_password">รหัสผ่าน*</label>
                    </div>
                    <div class="md-form form-sm mb-1">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" name="register_email" id="register_email"
                            class="form-control form-control-sm validate" required>
                        <label for="register_email">อีเมล*</label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fas fa-id-card prefix"></i>
                        <input type="text" name="register_citizen_id" id="register_citizen_id"
                            class="form-control form-control-sm validate" required>
                        <label for="register_citizen_id">เลขประจำตัวประชาชน*</label>
                    </div>
                    <hr>
                    <div class="form-inline">
                        <div class="form-row">
                            <label for="register_type" class="col-form-label col-md-auto">คุณเป็น?*</label>
                            <div class="align-items-center col-md-auto d-flex">
                                <select class="form-control" id="register_type" name="register_type" required>
                                    <option value="" disabled selected>กรุณาเลือก</option>
                                    <option value="student">นักเรียน</option>
                                    <option value="alumni">ศิษย์เก่า</option>
                                    <option value="teacher">อาจารย์</option>
                                    <option value="parent">ผู้ปกครอง</option>
                                    <option value="user">บุคคลทั่วไป</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="parentZone" style="display: none;">
                        <div class="md-form form-sm">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" name="register_childID" id="register_childID"
                                class="form-control form-control-sm validate">
                            <label for="register_childID">คุณเป็นผู้ปกครองของ... (กรุณากรอกรหัสนักเรียน)*</label>
                        </div>
                    </div>
                    <div id="alumniZone" style="display: none;">
                        <div class="md-form form-sm mb-1">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" name="register_id" id="register_id"
                                class="form-control form-control-sm validate">
                            <label for="register_id">เลขประจำตัวนักเรียน*</label>
                        </div>
                    </div>
                    <div id="studentZone" style="display: none;">
                        <div class="form-inline">
                            <div class="form-row">
                                <label for="register_grade" class="col-form-label col-md-auto">ระดับชั้น*</label>
                                <div class="align-items-center col-md-auto d-flex">
                                    <select class="form-control" id="register_grade" name="register_grade">
                                        <option value="1">มัธยมศึกษาปีที่ 1</option>
                                        <option value="2">มัธยมศึกษาปีที่ 2</option>
                                        <option value="3">มัธยมศึกษาปีที่ 3</option>
                                        <option value="4">มัธยมศึกษาปีที่ 4</option>
                                        <option value="5">มัธยมศึกษาปีที่ 5</option>
                                        <option value="6">มัธยมศึกษาปีที่ 6</option>
                                    </select>
                                </div>
                                <label for="register_class" class="col-form-label col-md-auto"> ห้อง* </label>
                                <div class=" align-items-center col-md-auto d-flex">
                                    <select class="form-control" id="register_class" name="register_class">
                                        <option value="1">ห้อง 1 (JEMS/SEMS)</option>
                                        <option value="2">ห้อง 2 (ปกติ)</option>
                                        <option value="3">ห้อง 3 (ปกติ)</option>
                                        <option value="4">ห้อง 4 (ปกติ)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="md-form file-field mb-5" style="display: none;">
                        <div class="btn btn-primary btn-sm float-left">
                            <span><i class="fas fa-file-upload"></i> Browse</span>
                            <input type="file" name="upload" id="upload" class="validate" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate disabled" type="text"
                                placeholder="รูปโปรไฟล์ / Profile Image">
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            เคยสมัครสมาชิกไปแล้วหรอ? <a href="../login/" class="text-smd">ล็อกอินที่นี่!</a>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" name="register_submit" value="สมัคร !"></input>
                            <a class="btn btn-danger" href="../home/">ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $("#register_grade").change(function () {
            if ($(this).val() <= 3) {
                $('#register_class option[value="5"]').remove();
            } else {
                $('#register_class').append('<option value="5">ห้อง 5 (วมว.)</option>');
            }
        });

        $("#register_type").change(function () {
            if ($(this).val() == "student") {
                $('#studentZone').css('display', 'block');
                $('#alumniZone').css('display', 'block');
                $('#parentZone').css('display', 'none');
            } else if ($(this).val() == "alumni") {
                $('#alumniZone').css('display', 'block');
                $('#studentZone').css('display', 'none');
                $('#parentZone').css('display', 'none');
            } else if ($(this).val() == "parent") {
                $('#alumniZone').css('display', 'none');
                $('#parentZone').css('display', 'block');
                $('#studentZone').css('display', 'none');
            } else {
                $('#alumniZone').css('display', 'none');
                $('#studentZone').css('display', 'none');
                $('#parentZone').css('display', 'none');
            }
        });
    </script>
    <?php require '../global/popup.php'; ?>
    <div class="d-none">
    <?php require '../global/footer.php'; ?>
    </div>
</body>

</html>