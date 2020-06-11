<?php require '../global/connect.php'; ?>
<?php if (!getConfig('global_userProfile', 'bool', $conn)) { back(); } ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
    <?php
        $id;
        if (isset($_GET['id'])) $id = $_GET['id'];
        else if (isset($_SESSION['id'])) $id = $_SESSION['id'];
        else needLogin();

        if (!isValidUserID($id, $conn)) back();

        $profile_background = getProfileData($id, 'background', $conn);
        
        if (getProfileData($id, 'background', $conn) == null) {
            if (!$_SESSION['dark_mode']) $profile_background = "../static/images/background/bg_light_pastel.jpg";
            else $profile_background = "../static/images/background/bg_dark_resize.jpg";
        }

        $profile_image = getProfilePicture($id, $conn);
        $profile_greets = getProfileData($id, 'greetings', $conn);
    
    ?>
    <style>
        body {
            background: url(<?php echo $profile_background ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        
        @media (min-width: 960px) {
            .card-columns {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 960px) {
            .card-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
    <?php if(isThisMyID($id, $conn)) { ?>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-lg btn-warning" href="./edit"><i class="fas fa-pencil-alt"></i></a>
        </div>
    <?php } ?>
        <div class="row">
            <div class="col mb-3">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="<?php echo $profile_image; ?>" class="thumb-post img-fluid" alt="Profile">
                    </div>
                    <div class="col-12 col-md-9">
                        <?php echo generateInfoCard($id, $conn); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card-columns">
                <?php if ($profile_greets != null) { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p><?php echo $profile_greets ?></p>
                    </div>
                </div>
                <?php echo generateAchievementCard($id, $conn); ?>
                <?php } ?>
                <?php if ($id == 604019) { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>ประวัติการศึกษา</h2>
                        <!-- 1 -->
                        <div class="d-flex flex-nowrap">
                            <div class="flex-grow-1"><h5>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)</h5></div>
                            <div class="text-nowrap">2008 - 2014</div>
                        </div>
                        <h6><span class="badge badge-primary">ระดับประถมศึกษา</span></h6>
                        <!-- 2 -->
                        <div class="d-flex flex-nowrap">
                            <div class="flex-grow-1"><h5>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)</h5></div>
                            <div class="text-nowrap">2014 - 2017</div>
                        </div>
                        <h6><span class="badge badge-primary">ระดับมัธยศึกษาตอนต้น</span></h6>
                        <!-- 3 -->
                        <div class="d-flex flex-nowrap">
                            <div class="flex-grow-1"><h5>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)</h5></div>
                            <div class="text-nowrap">2017 - 2020</div>
                        </div>
                        <h6><span class="badge badge-primary">ระดับมัธยมศึกษาตอนปลาย</span></h6>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>ประสบการณ์</h2>
                        <div class="mb-3"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-3">
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
                            </div>
                            <div class="col-md-12 col-sm-12 mb-3">
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
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>