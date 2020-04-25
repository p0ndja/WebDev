<?php include '../global/connect.php'; ?>
<?php if (!getConfig('global_userProfile', 'bool', $conn)) { back(); } ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <?php
        if (isset($_GET['id'])) $id = $_GET['id'];
        else if (isset($_SESSION['id'])) $id = $_SESSION['id'];
        else back();

        if (!isValidUserID($id, $conn)) back();

        $profile_background = getProfileData($id, 'background', $conn);
        
        if (getProfileData($id, 'background', $conn) == null) {
            if (!$_SESSION['dark_mode']) $profile_background = "../assets/images/background/bg_light_pastel.jpg";
            else $profile_background = "../assets/images/background/bg_dark_resize.jpg";
        }
    
    ?>
    <style>
        body {
            background: url(<?php echo $profile_background ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <?php if (isset($_GET['id']) || (isset($_SESSION['id']))) {
        $id;
        if (isset($_GET['id']))
            $id = $_GET['id'];
        else
            $id = $_SESSION['id'];
        
            $profile_achi = "";
                    
            $profile_image = getProfilePicture($id, $conn);

            $profile_greets = getProfileData($id, 'greetings', $conn);

            if (getAchievementdata($id, 'betaTester', $conn))
                $profile_achi .= '<div class="col-3 col-sm-3 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="Beta Tester (LEGENDARY)"><img src="../assets/images/achievement/beta-tester-icon_resize.gif" alt="Beta Tester (LEGENDARY)" class="img-fluid w-100 justify-content-center"></a></div>';
            if (getAchievementdata($id, 'WebDevTycoon', $conn))
                $profile_achi .= '<div class="col-3 col-sm-3 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="Web Dev Tycoon (UNOBTAINABLE)"><img src="../assets/images/achievement/Web_dev_tycoon_icon_resize.gif" alt="Web Dev Tycoon (UNOBTAINABLE)" class="img-fluid w-100 justify-content-center"></a></div>';
            if (getAchievementdata($id, 'the4thFloor', $conn))
                $profile_achi .= '<div class="col-3 col-sm-3 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="The 4th Floor (RARE)"><img src="../assets/images/achievement/stair.png" alt="The 4th Floor (RARE)" class="img-fluid w-100 justify-content-center"></a></div>';
            if (getAchievementdata($id, 'Xmas', $conn))
                $profile_achi .= '<div class="col-3 col-sm-3 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="Merry Christmas~ (UNCOMMON)"><img src="../assets/images/achievement/xmas_resize.png" alt="Merry Christmas~ (UNCOMMON)" class="img-fluid w-100 justify-content-center"></a></div>';
            
            if(!isset($_GET['id'])) { ?>
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-lg btn-warning" href="./edit"><i class="fas fa-pencil-alt"></i></a>
    </div>
    <?php } 
    ?>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="sticky-content mb-3">
                    <img src="<?php echo $profile_image; ?>" class="thumb-post w-100 mb-3" alt="Profile">
                    <?php echo generateInfoCard($id, $conn); ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="text-smd mb-3">Achievement</h2>
                            <div class="row">
                                <?php echo $profile_achi; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php if ($profile_greets != null) { ?>
                <div class="card">
                    <div class="card-body">
                        <p><?php echo $profile_greets ?></p>
                    </div>
                </div>
                <div class="mb-3"></div>
                <?php } ?>
                <?php if ($id == 604019) { ?>
                <div class="card">
                    <div class="card-body">
                        <h2>ประวัติการศึกษา</h2>
                        <div class="mb-3"></div>
                        <div class="row">
                            <div class="col-9">
                                <h4>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)</h4>
                            </div>
                            <div class="col-3">
                                <h5 class="text-right">2008 - 2014</h5>
                            </div>
                        </div>
                        <h5><span class="badge badge-secondary">ระดับประถมศึกษา</span></h5>

                        <div class="row">
                            <div class="col-9">
                                <h4>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)</h4>
                            </div>
                            <div class="col-3">
                                <h5 class="text-right">2014 - 2017</h5>
                            </div>
                        </div>
                        <h5><span class="badge badge-secondary">ระดับมัธยมศึกษาตอนต้น</span></h5>
                        <div class="row">
                            <div class="col-9">
                                <h4>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)</h4>
                            </div>
                            <div class="col-3">
                                <h5 class="text-right">2017 - ปัจจุบัน</h5>
                            </div>
                        </div>
                        <h5><span class="badge badge-secondary">ระดับมัธยมศึกษาตอนปลาย</span></h5>
                    </div>
                </div>
                <div class="mb-3"></div>
                <div class="card">
                    <div class="card-body">
                        <h2>ประสบการณ์</h2>
                        <div class="mb-3"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-9">
                                        <h4>รางวัลรองชนะเลิศอันดับ 1 การแข่งขัน Web Programming Competition
                                            ระดับมัธยมศึกษาตอนปลาย</h4>
                                    </div>
                                    <div class="col-3">
                                        <h5 class="text-right"><span aria-hidden="true"></span>19/08/2562</h5>
                                    </div>
                                </div>
                                <h5><span class="badge badge-secondary">การแข่งขันในงานสัปดาห์วิทยาศาสตร์</span></h5>
                                <p>ขอแสดงความยินดีกับนายพลภณ สุนทรภาส ชั้นมัธยมศึกษาปีที่ 6 อาจารย์ที่ปรึกษา
                                    อาจารย์จุฬารัตน์ สียา ได้รับรางวัลที่ 2 จากการแข่งขัน Web Programming Competition
                                    ระดับมัธยมศึกษาตอนปลาย ในกิจกรรมสัปดาห์วันวิทยาศาสตร์แห่งชาติ ประจำปี
                                    พ.ศ. 2562 วันที่ 18-20 สิงหาคม 2562 ณ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น
                                </p>
                                <img src="https://webcontest.cs.kku.ac.th/2562/photo/award.jpg" width=100%>
                                <br><a href="https://webcontest.cs.kku.ac.th/index.php?page=result&y=2562"
                                    target="_blank"><i class="fas fa-external-link-alt"></i></a>
                                <a href="https://www.facebook.com/SMD.KKU/posts/2215982308531509" target="_blank"><i
                                        class="fas fa-external-link-alt"></i></a>
                                <div class="mb-3"></div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-9">
                                        <h4>รางวัลชนะเลิศการแข่งขันสร้างเว็บเพจ (Web editor) ระดับมัธยมศึกษาตอนปลาย</h4>
                                    </div>
                                    <div class="col-3">
                                        <h5 class="text-right"><span aria-hidden="true"></span>14/02/2562</h5>
                                    </div>
                                </div>
                                <h5><span class="badge badge-secondary">Computer Education Open House 2018</span></h5>
                                <p>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)
                                    ขอแสดงความยินดีกับนักเรียนที่ได้รับรางวัลจากการเข้าร่วมกิจกรรม Computer Education
                                    Open House 2018 สาขาคอมพิวเตอร์ศึกษา คณะศึกษาศาสตร์ มหาวิทยาลัยขอนแก่น เมื่อวันที่
                                    14 กุมภาพันธ์ 2562 ที่ผ่านมา ซึ่งนักเรียนที่ได้รับรางวัลมีดังต่อไปนี้ นายวิชยุตม์
                                    สุรินทร์ชมพู และนายธนภัทร เครือน้ำคำ ได้รับรางวัลชนะเลิศการแข่งขันสร้าง Infographics
                                    ระดับมัธยมศึกษาตอนต้น นายรณกร ศรีพอ นายพลภณ สุนทรภาส
                                    และนายสหัสวัต สุดาพรรัตน์ ได้รับรางวัลชนะเลิศการแข่งขันสร้างเว็บเพจ (Web editor)
                                    ระดับมัธยมศึกษาตอนปลาย โดยมี นางสาวจุฬารัตน์ สียา เป็นอาจารย์ที่ปรึกษา
                                </p>
                                <img src="http://smd-s.kku.ac.th/home/images/smd-62/Computer_Education_Open_House_2018.jpg"
                                    width=100%>
                                <a href="https://www.facebook.com/SMD.KKU/photos/?tab=album&album_id=1936354579827618"><i
                                        class="fas fa-external-link-alt"></i></a>
                                <a
                                    href="http://smd-s.kku.ac.th/home/index.php/component/content/article/80-2012-09-14-02-08-54/421-computer-education-open-house-2018"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3"></div>
                <?php } ?>

            </div>
        </div>
    </div>
    <?php } else {
        needLogin();
    } ?>

    <?php include '../global/popup.php'; ?>
    <?php include '../global/footer.php'; ?>
</body>

</html>