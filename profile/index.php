<?php include '../global/connect.php'; ?>
<?php if (!getConfig('global_userProfile', 'bool', $conn)) { back(); } ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <?php
     $id;
     if (isset($_GET['search'])) {
         $id = $_GET['search'];
     } else {
         $id = $_SESSION['id'];
     }

     $query = "SELECT * FROM `user` WHERE id = '$id'";
     $result = mysqli_query($conn, $query);
     
     if (!$result) {
        die('Could not get data: ' . mysqli_error($conn));
    }
     $profile_background = "../assets/images/background/bg_light_pastel.jpg";

     $query_profile = "SELECT * FROM `profile` WHERE id = '$id'";
     $result_profile = mysqli_query($conn, $query_profile);


     while ($row = mysqli_fetch_array($result_profile, MYSQLI_ASSOC)) {
     if ($row['background'] != null) $profile_background = $row['background'];
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
    <?php if (isset($_GET['search']) || (isset($_SESSION['id']))) {
        $id;
        if (isset($_GET['search']))
            $id = $_GET['search'];
        else
            $id = $_SESSION['id'];

        $query = "SELECT * FROM `user` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $query_profile = "SELECT * FROM `profile` WHERE id = '$id'";
        $result_profile = mysqli_query($conn, $query_profile);
        $query_achi = "SELECT * FROM `achievement` WHERE id = '$id'";
        $result_achi = mysqli_query($conn, $query_achi);

        $not_found = false;
        if (mysqli_num_rows($result) == 0)
            $not_found = true;
        

        $undefined = "<i>Undefined</i>";
        $profile_name = "<i>Undefined Thai Name</i>";
        $profile_name_en = "<i>Undefined English Name</i>";
        $profile_id = $undefined;
        $profile_grade = $undefined;
        $profile_class = $undefined;
        $profile_room = $undefined;
        $profile_email = $undefined;
        $profile_displayText = $undefined;
        $profile_achi = "";
        
        $bool_rendergreetings = false;

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $profile_prefix = $row['prefix'];

            if ($profile_prefix == 'นาย')
                $profile_prefix_en = 'Mr. ';
            else if ($profile_prefix == 'นาง')
                $profile_prefix_en = 'Mrs. ';
            else if ($profile_prefix == 'เด็กชาย')
                $profile_prefix_en = 'Master ';
            else if ($profile_prefix == 'เด็กหญิง' || $profile_prefix == 'นางสาว')
                $profile_prefix_en = 'Miss ';
            else
                $profile_prefix_en = "";


            $profile_name = $profile_prefix . $row['firstname'] . ' ' . $row['lastname'];
            $profile_name_en = $profile_prefix_en . $row['firstname_en'] . ' ' . $row['lastname_en'];
            $profile_id = $row['id'];
            $profile_email = $row['email'];
            $profile_grade = $row['grade'];
            $profile_room = $row['class'];
            if ($profile_room == 1) {
                $profile_class = "EMSP";
            } else if ($profile_room == 5) {
                $profile_class = "วมว.";
            } else {
                $profile_class = "ปกติ";
            }
            
            if ($profile_grade < 1)
            $profile_class_detail = "";
            else if ($profile_grade > 6)
            $profile_class_detail = "<strong>ศิษย์เก่า</strong><br>";
            else
            $profile_class_detail = "<strong>ระดับชั้น</strong> " . $profile_grade . "/" . $profile_room . " (" . $profile_class . ")<br>";
        }
        
        while ($row = mysqli_fetch_array($result_profile, MYSQLI_ASSOC)) {
            if ($row['profile'] != null)
                $profile_image = $row['profile'];
            else $profile_image = '../assets/images/default.png';
            
            if ($row['greetings'] != null) {
                $profile_displayText = $row['greetings'];
                $bool_rendergreetings = true;
            }
        }

        while ($row = mysqli_fetch_array($result_achi, MYSQLI_ASSOC)) {
            if ($row['betaTester'])
                $profile_achi .= '<div class="col-4 col-sm-4 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="Beta Tester (LEGENDARY)"><img src="../assets/images/achievement/beta-tester-icon_resize.gif" alt="Beta Tester (LEGENDARY)" class="img-fluid w-100 justify-content-center"></a></div>';
            if ($row['WebDevTycoon'])
                $profile_achi .= '<div class="col-4 col-sm-4 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="Web Dev Tycoon (UNOBTAINABLE)"><img src="../assets/images/achievement/Web_dev_tycoon_icon_resize.gif" alt="Web Dev Tycoon (UNOBTAINABLE)" class="img-fluid w-100 justify-content-center"></a></div>';
            if ($row['the4thFloor'])
                $profile_achi .= '<div class="col-4 col-sm-4 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="The 4th Floor (RARE)"><img src="../assets/images/achievement/stair.png" alt="The 4th Floor (RARE)" class="img-fluid w-100 justify-content-center"></a></div>';
            if ($row['Xmas'])
                $profile_achi .= '<div class="col-4 col-sm-4 mb-3"><a class="material-tooltip-main" data-toggle="tooltip" title="Merry Christmas~ (UNCOMMON)"><img src="../assets/images/achievement/xmas_resize.png" alt="Merry Christmas~ (UNCOMMON)" class="img-fluid w-100 justify-content-center"></a></div>';
        }
    ?>
    <div class="container" id="container" style="padding-top: 88px">
        <?php if(!$not_found) {?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h1> <?php echo $profile_name; ?></h1>
                        <h5> <?php echo $profile_name_en; ?></h5>
                    </div>
                    <?php if(!isset($_GET['search'])) { ?>
                        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                            <a class="btn-floating btn-lg btn-warning" href="edit.php"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="mb-3"></div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="media">
                    <img src="<?php echo $profile_image; ?>" class="img-fluid w-100" alt="Profile">
                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                        <div class="mb-3"></div>
                        <div class="card">
                            <div class="card-body">
                                <strong>รหัสนักเรียน</strong> <?php echo $profile_id ?><br>
                                <?php echo $profile_class_detail; ?>
                                <strong>อีเมล</strong>
                                <a href="mailto:<?php echo $profile_email ?>"><?php echo $profile_email ?></a>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div class="card">
                            <div class="card-body">
                                <h2>Achievement</h2>
                                <div class="mb-3"></div>
                                <div class="row">
                                    <?php echo $profile_achi; ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <?php if ($bool_rendergreetings) { ?>
                <div class="card">
                    <div class="card-body">
                        <p><?php echo $profile_displayText ?></p>
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
        <?php } else { ?>
            <center><h3>ไม่พบโปรไฟล์สำหรับ</h3>
            <h1>'<?php echo $_GET['search']; ?>'</h1>
                <img src="https://images.pondja.com/capoo_sad.gif" class="img-fluid mb-5">
                </center>
        <?php } ?>
    </div>
    <?php } else {
        needLogin();
    } ?>

</body>

<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>