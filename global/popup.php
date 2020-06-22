
<!-- Announcement Modal -->
<div class="modal animated jackInTheBox fadeOut" id="announcementPopup" name="announcementPopup" tabindex="-1" role="dialog"
    aria-labelledby="announcementTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="annoucementTitle">ข่าวประชาสัมพันธ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="https://repository-images.githubusercontent.com/216790969/da52a000-7792-11ea-997b-7503371435f0"
                    class="img-fluid w-100 d-flex justify-content-center mb-3 z-depth-2">
                <div class="modal-text">
                    <p class="text-center">ทางผู้พัฒนาขอความร่วมมือจากผู้เข้าชมเว็บไซต์ทุก ๆ ท่าน ร่วมตอบแบบสอบถามความพึงพอใจในการใช้งานเว็บไซต์ <a href="https://smd.pondja.com">smd.pondja.com</a> / <a href="https://smd.p0nd.ga">smd.p0nd.ga</a></p>
                    <a href="https://forms.gle/HfxaWmjVGKjARUR18" target="_blank" class="text-center text-smd"><h1 class="animated infinite pulse">ตอบแบบสอบถาม</h1></a>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-md btn-warning" data-dismiss="modal">ปิดหน้าต่าง</a>
            </div>
        </div>
    </div>
</div>
<!-- Announcement Modal -->

<!-- Mobile Cpanel Modal -->
<?php if (isLogin()) { ?>
<div class="modal fade right" id="futureCpanel" tabindex="-1" role="dialog" aria-labelledby="cpanelTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-full-width modal-right modal-sm" role="document">
        <div class="modal-content-full-width modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cpanelTitle">สวัสดี!
                    <?php echo $_SESSION['name'] . ' (' . $_SESSION['username'] . ')'; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a class="dropdown-item" href="../profile"> ข้อมูลส่วนตัว <i class="fas fa-user"></i></a>
                <a class="dropdown-item" href="#"> ลงทะเบียนวิชาเลือก <i class="fas fa-tasks"></i></a>
                <a class="dropdown-item" href="#"> การเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <a class="dropdown-item" href="../s/grade_lookup"> ผลการเรียน (SGS) <i class="fas fa-graduation-cap"></i></a>

                <?php if (isPermission('isTeacher', $conn)) { ?>
                <hr>
                    <a class="dropdown-item" href="../a/stdCheck"> ระบบเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } else { ?>
                    <a class="dropdown-item" href="#"> ผลการเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } ?>

                <?php if (isPermission('isAdmin', $conn)) { ?>
                <hr>
                <a class="dropdown-item text-secondary" href="../admin/"> ส่วนของแอดมิน <i
                        class="fas fa-user-tie"></i></a>
                <?php } ?>
                <hr>

                <?php if(!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false; ?>
                <?php if ($_SESSION['dark_mode'] == true) { ?><a class="dropdown-item" href="../global/darkmode.php"> เปลี่ยนเป็นโหมดสว่าง <i class="far fa-lightbulb"></i></a>
                <?php } else { ?><a class="dropdown-item" href="../global/darkmode.php"> เปลี่ยนเป็นโหมดมืด <i class="fas fa-lightbulb"></i></a><?php } ?>
                
                <hr>
                <a class="dropdown-item text-danger" href="../global/logout.php">ออกจากระบบ <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Cpanel Modal -->


<!-- Login Modal -->
<?php } else {?>
<div class="modal fade right" name="login" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <!--div class="modal-dialog cascading-modal" role="document"-->
    <div class="modal-dialog modal-full-height modal-right" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <div class="mb-3"></div>
                <!--ul class="nav nav-tabs md-tabs tabs-2 grey lighten-2" role="tablist"-->
                <ul class="nav md-tabs nav-justified md-tabs tabs-2 peach-gradient darken-5" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active black-text" data-toggle="tab" href="#panel7" role="tab">
                            <i class="fas fa-user mr-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link black-text" data-toggle="tab" href="#panel8" role="tab">
                            <i class="fas fa-user-plus mr-1"></i> Register</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <form method="post" action="../global/login.php" enctype="multipart/form-data">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="alert alert-warning" role="alert"><u>ตอนนี้ไม่สามารถ Register เพิ่มนะครับ
                                        (ปิดระบบแล้ว)</u><br>*ผู้ใช้เก่าสามารถ Login ได้ตามปกติ*</div><br>
                                <?php if (isset($_SESSION['error'])) echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>'; ?>
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
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <input class="btn btn-success" type="submit" name="login_submit" value="Login"></input>
                                <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <form method="post" action="../global/login.php" enctype="multipart/form-data">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>';
                                }
                                ?>
                                <div class="form-inline">
                                    <div class="form-row">
                                        <label for="register_prefix" class="col-form-label col-md-auto">คำนำหน้า </label>
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
                                            <input type="text" id="register_firstname" name="register_firstname"
                                                class="form-control form-control-sm validate" required>
                                            <label for="register_firstname">ชื่อ</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="register_lastname" name="register_lastname"
                                                class="form-control form-control-sm validate" required>
                                            <label for="register_lastname">นามสกุล</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" id="register_firstname_en" name="register_firstname_en"
                                                class="form-control form-control-sm validate" required>
                                            <label for="register_firstname_en">Firstname</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="register_lastname_en" name="register_lastname_en"
                                                class="form-control form-control-sm validate" required>
                                            <label for="register_lastname_en">Lastname</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-form form-sm mb-1">
                                    <i class="fas fa-id-badge prefix"></i>
                                    <input type="text" name="register_username" id="register_username"
                                        class="form-control form-control-sm validate" required>
                                    <label for="register_username">ชื่อผู้ใช้งาน</label>
                                </div>
                                <div class="md-form form-sm mb-1">
                                    <i class="fas fa-key prefix"></i>
                                    <input type="password" name="register_password" id="register_password"
                                        class="form-control form-control-sm validate" required>
                                    <label for="register_password">รหัสผ่าน</label>
                                </div>
                                <div class="md-form form-sm mb-1">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" name="register_id" id="register_id"
                                        class="form-control form-control-sm validate" required>
                                    <label for="register_id">เลขประจำตัวนักเรียน</label>
                                </div>
                                <div class="md-form form-sm">
                                    <i class="fas fa-id-card prefix"></i>
                                    <input type="text" name="register_citizen_id" id="register_citizen_id"
                                        class="form-control form-control-sm validate" required>
                                    <label for="register_citizen_id">เลขประจำตัวประชาชน</label>
                                </div>
                                <div class="md-form form-sm mb-1">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" name="register_email" id="register_email"
                                        class="form-control form-control-sm validate" required>
                                    <label for="register_email">อีเมล</label>
                                </div>
                                <div class="form-inline">
                                    <div class="form-row">
                                        <label for="register_grade" class="col-form-label col-md-auto">ระดับชั้น
                                        </label>
                                        <div class="align-items-center col-md-auto d-flex">
                                            <select class="form-control" id="register_grade" name="register_grade"
                                                required>
                                                <option value="1">ม.1</option>
                                                <option value="2">ม.2</option>
                                                <option value="3">ม.3</option>
                                                <option value="4">ม.4</option>
                                                <option value="5">ม.5</option>
                                                <option value="6">ม.6</option>
                                            </select>
                                        </div>
                                        <label for="register_class" class="col-form-label col-md-auto"> ห้อง </label>
                                        <div class=" align-items-center col-md-auto d-flex">
                                            <select class="form-control" id="register_class" name="register_class"
                                                required>
                                                <option value="1">1 (IEC/EMSP)</option>
                                                <option value="2">2 (ปกติ)</option>
                                                <option value="3">3 (ปกติ)</option>
                                                <option value="4">4 (ปกติ)</option>
                                                <option value="5">5 (วมว.)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-form file-field mb-5">
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
                            <div class="modal-footer">
                                <input class="btn btn-success" type="submit" name="register_submit"
                                    value="Sign Up"></input>
                                <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Login Modal -->

<?php } ?>
<?php 
    if (isset($_SESSION['success'])) { 
        signinSuccess($_SESSION['name']);
        $_SESSION['success'] = null;
    }
?>
<?php if (isset($_SESSION['error'])) { ?>
    <script>
        $('#login').modal('show');
    </script>
<?php $_SESSION['error'] = null;
} ?>
<script>
    $("#logoutBtn").click(function () {
        swal({
            title: "ออกจากระบบ ?",
            text: "คุณต้องการออกจากระบบหรือไม่?",
            icon: "warning",
            buttons: true,
            dangerMode: true}).then((willDelete) => { 
                if (willDelete) { 
                    window.location = "../global/logout.php";
                }
            });
    });
</script>