<?php if (isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'] == true) { ?>
    <script>document.body.setAttribute("data-theme", "dark")</script>
<?php } else { ?>
    <script>document.body.removeAttribute("data-theme")</script>
<?php } ?>
<a class="navbar-brand" href="../home"><img src="../static/images/logo/logokku_t_w_32px.png" width="20" alt="SMD" align="center"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
    </ul>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <?php if (isLogin()) { ?>
        <div class="d-lg-block d-none">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo getProfilePicture($_SESSION['id'], $conn); ?>" class="rounded-circle" width="20" alt="Profile">
                <?php echo $_SESSION['name']; ?></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-smd" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../profile"> ข้อมูลส่วนตัว <i class="fas fa-user"></i></a>
                <a class="dropdown-item" href="#"> ลงทะเบียนวิชาเลือก <i class="fas fa-tasks"></i></a>
                <a class="dropdown-item" href="../profile/grade_lookup.php"> ผลการเรียน (SGS) <i class="fas fa-graduation-cap"></i></a>
                
                <?php if (isPermission('isTeacher', $conn)) { ?>
                    <a class="dropdown-item" href="../s/stdCheck"> ระบบเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } else { ?>
                    <a class="dropdown-item" href="#"> ผลการเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } ?>

                <?php if (isPermission('isAdmin', $conn)) { ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-secondary" href="../admin/"> ส่วนของแอดมิน <i class="fas fa-user-tie"></i></a>
                <?php } ?>

                <div class="dropdown-divider"></div>
                    <?php if(!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false; ?>
                    <?php if ($_SESSION['dark_mode'] == true) { ?><a class="dropdown-item" href="../global/darkmode.php"> เปลี่ยนเป็นโหมดสว่าง <i class="far fa-lightbulb"></i></a>
                    <?php } else { ?><a class="dropdown-item" href="../global/darkmode.php"> เปลี่ยนเป็นโหมดมืด <i class="fas fa-lightbulb"></i></a><?php } ?>
                
                <div class="dropdown-divider"></div>
                <button class="dropdown-item text-danger" id="logoutBtn">ออกจากระบบ <i class="fas fa-sign-out-alt"></i></button>
            </div>
        </li>
                    </div>
                    <div class="d-block d-lg-none">
                    <a class="btn btn-md peach-gradient btn-rounded font-weight-bold" data-toggle="modal" data-target="#futureCpanel">
                <img src="<?php echo getProfilePicture($_SESSION['id'], $conn); ?>" class="rounded-circle" width="20" alt="Profile">
                <?php echo $_SESSION['name']; ?></a>
                    </div>
        <?php } else { ?>
            <button class="btn btn-md btn-rounded peach-gradient text-dark font-weight-bold" data-toggle="modal" data-target="#login">Login</button>
        <?php } ?>
    </ul>
</div>