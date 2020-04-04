<?php if (isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'] == true) { ?>
    <script>document.body.setAttribute("data-theme", "dark")</script>
<?php } else { ?>
    <script>document.body.removeAttribute("data-theme")</script>
<?php } ?>
<a class="navbar-brand" href="../home"><span class="badge badge-light"><img src="../assets/images/logo/logokku_32px.png"
            width="20" alt="SMD"></span></a>
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
            <div class="dropdown-menu dropdown-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../news/?id=20">ประวัติโรงเรียน</a>
                <a class="dropdown-item" href="../news/?id=21">ปรัชญา</a>
                <a class="dropdown-item" href="../news/?id=22">วิสัยทัศน์ พันธกิจ</a>
                <a class="dropdown-item" href="../news/?id=23">เป้าหมายเชิงกลยุทธ์</a>
                <a class="dropdown-item" href="../news/?id=24">คุณลักษณะอันพึงประสงค์</a>
                <a class="dropdown-item" href="../news/?id=25">คณะกรรมการประจำโรงเรียน</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../news/?id=26">โครงสร้างการบริหาร</a>
                <a class="dropdown-item" href="../news/?id=29">ทำเนียบผู้บริหาร</a>
                <a class="dropdown-item" href="../news/?id=32">คณะผู้บริหาร</a>
                <a class="dropdown-item" href="../news/?id=37">บุคลากร</a>
            </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                หน่วยงาน </a>
            <div class="dropdown-menu dropdown-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item disabled" href="#"> งานแผนและประกันคุณภาพ </a>
                <a class="dropdown-item" href="https://www.admissionpremium.com/gis/KKU/login"> งานแนะแนว </a>
                <a class="dropdown-item disabled" href="#"> งานทะเบียน </a>
                <a class="dropdown-item disabled" href="#"> งานพัฒนาบุคลิกภาพ </a>
                <a class="dropdown-item disabled" href="#"> งานห้องสมุด </a>
                <a class="dropdown-item disabled" href="#"> ชมรมผู้ปกครองและครู </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../pages/subject.php"> เอกสารประกอบการสอน </a>
            </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ปฏิทิน </a>
            <div class="dropdown-menu dropdown-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"> ปฏิทินโรงเรียน </a>
                <a class="dropdown-item" href="../calendar"> ตารางเรียน </a>
                <a class="dropdown-item" href="https://www.facebook.com/SMD.KKU/posts/2526062130856857"> ตารางสอบ </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../news">ข่าวสาร </a>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> อื่น ๆ </a>
            <div class="dropdown-menu dropdown-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../forum">SMD Forum</a>
                <a class="dropdown-item disabled" href="#">SMD Shop</a>
                <?php if ( getConfig('global_Livestream', 'bool', $conn) ) { ?>
                <a class="dropdown-item" href=<?php echo getConfig('global_Livestream', 'val', $conn); ?>>ถ่ายทอดสด <sup
                        class="notifi"><span class="badge badge-danger badge-pill d-none d-lg-inline-block blink">LIVE
                            <span class="oi" data-glyph="video"></span></span></sup></a>
                <?php } ?>
            </div>
        </li>
    </ul>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">
<form action="../pages/search.php" method="GET" class="form-inline">
            <div class="md-form my-0">
                <input method="GET" class="form-control" type="text" placeholder="Search ID (Ex. 604019)"
                    aria-label="Search ID (Ex. 604019)" id="search" name="search"
                    value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
            </div>
        </form>
        <?php if (isLogin()) { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo getProfilePicture($_SESSION['id'], $conn); ?>" width="20" alt="Profile">
                <?php echo $_SESSION['name']; ?></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../profile"> ข้อมูลส่วนตัว <i class="fas fa-user"></i></a>
                <a class="dropdown-item" href="#"> ลงทะเบียนวิชาเลือก <i class="fas fa-tasks"></i></a>
                <a class="dropdown-item" href="#"> การเช็คชื่อ <i class="fas fa-calendar-check"></i></a>
                <a class="dropdown-item" href="#"> ผลการเรียน (SGS) <i class="fas fa-graduation-cap"></i></a>
                <?php if (isPermission('isAdmin', $conn)) { ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-secondary" href="../admin/"> ส่วนของแอดมิน <i
                        class="fas fa-user-tie"></i></a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <?php if(!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false; ?>
                <?php if ($_SESSION['dark_mode'] == true) { ?>
                <a class="dropdown-item" href="../pages/darkmode.php"> เปลี่ยนเป็นโหมดสว่าง <i class="far fa-lightbulb"></i></a>
                <?php } else { ?>
                    <a class="dropdown-item" href="../pages/darkmode.php"> เปลี่ยนเป็นโหมดมืด <i class="fas fa-lightbulb"></i></a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="../global/logout.php">ออกจากระบบ <i
                        class="fas fa-sign-out-alt"></i></a>
            </div>
        </li>
        <?php } else { ?>
            <button class="btn btn-rounded peach-gradient text-dark font-weight-bold" data-toggle="modal" data-target="#login">Login</button>
        <?php } ?>
    </ul>
</div>