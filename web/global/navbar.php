<?php   if ((isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'])) { ?>
            <script>document.body.setAttribute("data-theme", "dark")</script>
<?php   } else { ?>
            <script>document.body.removeAttribute("data-theme")</script>
<?php   } ?>
<?php   $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
        if ((strpos($current_url, "/profile") !== false) || (strpos($current_url, "/id") !== false)) {
            if ((isset($_SESSION['isDarkProfile']) && $_SESSION['isDarkProfile'])) { ?>
            <script>document.body.setAttribute("data-theme", "dark")</script>
        <?php } else { ?>
            <script>document.body.removeAttribute("data-theme")</script>
<?php   }} ?>

<a class="navbar-brand" href="../home"><img src="../static/images/logo/logokku_t_w_32px.png" width="20" alt="SMD" align="center"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="../home">หน้าหลัก <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> เกี่ยวกับ </a>
            <div class="dropdown-menu dropdown-smd" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../post/20">ประวัติโรงเรียน</a>
                <a class="dropdown-item" href="../post/22">เกี่ยวกับโรงเรียน</a>
                <a class="dropdown-item" href="../post/25">คณะกรรมการประจำโรงเรียน</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../post/26">โครงสร้างการบริหาร</a>
                <a class="dropdown-item" href="../post/29">ทำเนียบผู้บริหาร</a>
                <a class="dropdown-item" href="../post/32">คณะผู้บริหาร</a>
                <a class="dropdown-item" href="../post/37">บุคลากร</a>
            </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                หน่วยงาน </a>
            <div class="dropdown-menu dropdown-smd" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../category/qa-1"> งานแผนและประกันคุณภาพ </a>
                <a class="dropdown-item" href="../category/advice-1"> งานแนะแนว </a>
                <a class="dropdown-item" href="../category/reg-1"> งานทะเบียน </a>
                <a class="dropdown-item" href="../category/person-1"> งานพัฒนาบุคลิกภาพ </a>
                <a class="dropdown-item" href="../category/lib-1"> งานห้องสมุด </a>
                <a class="dropdown-item" href="../category/pta-1"> ชมรมผู้ปกครองและครู </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../category/subject-1"> เอกสารประกอบการสอน </a>
            </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ปฏิทิน </a>
            <div class="dropdown-menu dropdown-smd" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"> ปฏิทินโรงเรียน </a>
                <a class="dropdown-item" href="../timetable/"> ตารางเรียน </a>
                <a class="dropdown-item" href="https://www.facebook.com/SMD.KKU/posts/2526062130856857"> ตารางสอบ </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../category/news-1">ข่าวสาร </a>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> อื่น ๆ </a>
            <div class="dropdown-menu dropdown-smd" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../forum">SMD Forum</a>
                <a class="dropdown-item disabled" href="#">SMD Shop</a>
                <a class="dropdown-item <?php $b = getConfig('global_Livestream', 'bool', $conn); if (!$b) echo "disabled"; ?>" href="<?php $c = getConfig('global_Livestream', 'val', $conn); if ($b) echo $c; else echo "#"; ?>">ถ่ายทอดสด 
                    <?php if ($b) { ?><sup class="notifi"><span class="badge badge-danger badge-pill d-none d-lg-inline-block blink">LIVE</span></sup><?php } ?></a>
            </div>
        </li>
    </ul>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item">
            <?php if(!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false; ?>
            <?php if ($_SESSION['dark_mode'] == true) { ?><a href="../global/darkmode.php" class="nav-link"><i class="fas fa-sun"></i></a></a>
            <?php } else { ?><a href="../global/darkmode.php" class="nav-link"><i class="far fa-moon"></i></a><?php } ?>
        </li>
        <li class="nav-item">
            <form action="../search/" method="POST" class="form-inline">
                <div class="md-form my-0">
                    <input method="POST" class="form-control" type="text" placeholder="Search ID (Ex. 604019)"
                        aria-label="Search ID (Ex. 604019)" id="search" name="search"
                        value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>">
                </div>
            </form>
        </li>
        <?php if (isLogin()) { ?>
        <div class="d-lg-block d-none">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo getProfilePicture($_SESSION['id'], $conn); ?>" class="rounded-circle" width="20" alt="Profile">
                <?php echo $_SESSION['name']; ?></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-smd" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../profile"> ข้อมูลส่วนตัว <i class="fas fa-user"></i></a>
                
                <!-- Secret Reg-SMD Post Value -->
                <a class="dropdown-item" href="../s/regsmd"> ลงทะเบียนวิชาเลือก <i class="fas fa-tasks"></i></a>

                <a class="dropdown-item" href="../s/grade_lookup"> ผลการเรียน (SGS) <i class="fas fa-graduation-cap"></i></a>
                
                <?php if (isPermission('isTeacher', $conn)) { ?>
                    <a class="dropdown-item" href="../s/check"> ระบบเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } else { ?>
                    <a class="dropdown-item" href="#"> ผลการเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <?php } ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../profile/edit"> แก้ไขข้อมูลส่วนตัว <i class="fas fa-user-tie"></i></a>

                <?php if (isPermission('isAdmin', $conn)) { ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-secondary" href="../a/config"> Server Settings <i class="fas fa-user-tie"></i></a>
                    <a class="dropdown-item text-secondary" href="../a/user"> User Management <i class="fas fa-user-tie"></i></a>
                    <a class="dropdown-item text-secondary disabled" href="../a/#"> Forum Administrator <i class="fas fa-user-tie"></i></a>
                    <a class="dropdown-item text-secondary disabled" href="../a/#"> News Editorial <i class="fas fa-user-tie"></i></a>
                <?php } ?>

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
            <a class="btn btn-md btn-rounded peach-gradient text-dark font-weight-bold d-block d-lg-none" href="../login/">Login</a>
            <li class="nav-item dropdown position-static d-none d-lg-block">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                <div class="dropdown-menu dropdown-menu-left dropdown-menu-md-right">
                    <form method="post" action="../global/auth/login.php" enctype="multipart/form-data">
                        <div class="md-form form-sm mb-5">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" name="login_username" id="login_username"
                                class="form-control form-control-sm validate" required style="color: black !important;">
                            <label for="login_username">Username</label>
                        </div>
                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" name="login_password" id="login_password"
                                class="form-control form-control-sm validate" required style="color: black !important;">
                            <label for="login_password">Password</label>
                        </div>
                        <input type="hidden" name="method" value="loginNav">
                        <button class="btn btn-block bg-smd" type="submit" name="login_submit">Login</button>
                        <div class="text-center"><a class="text-danger" href="../forgetpw/">ลืมรหัสผ่านหรอ?</a> <a href="../register/" class="text-smd">หรือสมัครเข้าใช้งาน!</a></div>
                    </form>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>