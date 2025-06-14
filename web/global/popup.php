
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
                <img src="https://cdn.discordapp.com/attachments/601788363313512480/815977561179815936/da52a000-7792-11ea-997b-7503371435f0.jpg"
                    class="img-fluid w-100 d-flex justify-content-center mb-3 z-depth-2">
                <div class="modal-text">
                    <p>ทางผู้พัฒนาขอขอบคุณทุกท่านที่ให้ความสนใจกับเว็บไซต์ใหม่ของเรา <a href="https://smd.pondja.com">smd.pondja.com</a> ที่พัฒนาโดย <a href="https://smd.pondja.com/about/">ศิษย์เก่า SMD รุ่น 36 และทีมงาน</a> อย่างไรก็ตาม เว็บไซต์นี้จะไม่ถูกนำไปใช้จริง โดยทางโรงเรียนเลือกที่จะใช้ <a href="https://smd.satit.kku.ac.th">smd.satit.kku.ac.th</a> เป็นเว็บไซต์ใหม่ของโรงเรียน
                     แม้ว่าเว็บไซต์นี้จะไม่ได้ไปต่อก็ตาม แต่ก็เป็นหนึ่งในแรงบันดาลใจและแรงผลักดันในการพัฒนางานให้แก่ผู้พัฒนาต่อไป<hr>ขอบคุณครับ<br>PondJa<sup>TH</sup>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="https://github.com/p0ndja/WebDev/" class="btn btn-md btn-black">View on GitHub <i class="fab fa-github"></i></a>
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
                    <a class="dropdown-item" href="../s/check"> ระบบเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } else { ?>
                    <a class="dropdown-item" href="#"> ผลการเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } ?>
                <?php if (isPermission('isAdmin', $conn)) { ?>
                    <hr>
                    <a class="dropdown-item text-secondary" href="../a/config"> Server Settings <i class="fas fa-user-tie"></i></a>
                    <a class="dropdown-item text-secondary" href="../a/user"> User Management <i class="fas fa-user-tie"></i></a>
                    <a class="dropdown-item text-secondary" href="../a/#" disabled> Forum Administrator <i class="fas fa-user-tie"></i></a>
                    <a class="dropdown-item text-secondary" href="../a/#" disabled> News Editorial <i class="fas fa-user-tie"></i></a>
                <?php } ?>
                <hr>

                <?php if(!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false; ?>
                <?php if ($_SESSION['dark_mode'] == true) { ?><a class="dropdown-item" href="../global/darkmode.php"> เปลี่ยนเป็นโหมดสว่าง <i class="far fa-lightbulb"></i></a>
                <?php } else { ?><a class="dropdown-item" href="../global/darkmode.php"> เปลี่ยนเป็นโหมดมืด <i class="fas fa-lightbulb"></i></a><?php } ?>
                
                <hr>
                <a class="dropdown-item text-danger" href="../logout/">ออกจากระบบ <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- Mobile Cpanel Modal -->
<?php 
    if (isset($_SESSION['swal_error']) && isset($_SESSION['swal_error_msg'])) { 
        errorSwal($_SESSION['swal_error'],$_SESSION['swal_error_msg']);
        $_SESSION['swal_error'] = null;
        $_SESSION['swal_error_msg'] = null;
    }
?>
<?php 
    if (isset($_SESSION['swal_warning']) && isset($_SESSION['swal_warning_msg'])) { 
        warningSwal($_SESSION['swal_warning'],$_SESSION['swal_warning_msg']);
        $_SESSION['swal_warning'] = null;
        $_SESSION['swal_warning_msg'] = null;
    }
?>
<?php 
    if (isset($_SESSION['swal_success'])) { 
        successSwal($_SESSION['swal_success'],$_SESSION['swal_success_msg']);
        $_SESSION['swal_success'] = null;
        $_SESSION['swal_success_msg'] = null;
    }
?>
<script>
    $("#logoutBtn").click(function () {
        swal({
            title: "ออกจากระบบ ?",
            text: "คุณต้องการออกจากระบบหรือไม่?",
            icon: "warning",
            buttons: true,
            dangerMode: true}).then((willDelete) => { 
                if (willDelete) { 
                    window.location = "../logout/";
                }
            });
    });
</script>