<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>

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

     $query = "SELECT * FROM `userdatabase` WHERE id = '$id'";
     $result = mysqli_query($conn, $query);

     if (! $result) {
         die('Could not get data: ' . mysqli_error());
     }
     $profile_background = "https://storage.pondja.com/bg%20pastel%20mode.jpg";

     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     if ($row['profile_background'] != null) $profile_background = $row['profile_background'];
     }
    ?>
    <style>
        body {
            font-family: 'Kanit', sans-serif !important;
            background: url(<?php echo $profile_background ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php'; ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top sticky" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="content"></div>
    <?php if (isset($_GET['search']) || (isset($_SESSION['id']))) {

        $id;
        if (isset($_GET['search'])) {
            $id = $_GET['search'];
        } else {
            $id = $_SESSION['id'];
        }

        $query = "SELECT * FROM `userdatabase` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if (! $result) {
            die('Could not get data: ' . mysqli_error());
        }

        if (mysqli_num_rows($result) == 0) {
            die('<center><h1>Profile Not Found</h1></center>');
        }

        $undefined = "<i>Undefined</i>";
        $profile_name = "<i>Undefined Thai Name</i>";
        $profile_name_en = "<i>Undefined English Name</i>";
        $profile_id = $undefined;
        $profile_grade = $undefined;
        $profile_class = $undefined;
        $profile_room = $undefined;
        $profile_phone = $undefined;
        $profile_email = $undefined;
        $profile_displayText = $undefined;
        $profile_image = "https://d3ipks40p8ekbx.cloudfront.net/dam/jcr:3a4e5787-d665-4331-bfa2-76dd0c006c1b/user_icon.png";
        $profile_background = "";
       
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $profile_name = $row['firstname'] . ' ' . $row['lastname'];
            $profile_id = $row['id'];
            $profile_email = $row['email'];
            if ($row['profile'] != null) $profile_image = $row['profile'];
            if ($row['profile_background'] != null) $profile_background = $row['profile_background']; 
        }        
        ?>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-11">
                <h1> <?php echo $profile_name; ?></h1>
                <h5> <?php echo $profile_name_en; ?></h5>
            </div>
            <div class="col-1">
                <a class="btn btn-warning float-right" href="edit.php"><span class="oi" data-glyph="pencil"></span></a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="media">
                    <img src="<?php echo $profile_image ?>" class="img-fluid rounded-circle" alt="Profile">
                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                        <hr>
                        <div class="card">
                            <div class="card-body">

                                <strong>รหัสนักเรียน</strong> <?php echo $profile_id ?><br>
                                <strong>ระดับชั้น</strong> <?php echo $profile_grade ?><br>
                                <strong>ห้อง</strong> <?php echo $profile_room ?> (<?php echo $profile_class ?>)<br>
                                <strong>เบอร์โทรศัพท์</strong> <?php echo $profile_phone ?><br>
                                <strong>อีเมล</strong>
                                <a href="<?php echo $profile_email ?>"><?php echo $profile_email ?></a>

                            </div>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <h2>Skill Set</h2>
                                <hr>
                                <div class="progress mt-4">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="85"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 85%"> Java</div>
                                </div>
                                <div class="progress mt-4">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%"> HTML</div>
                                </div>
                                <div class="progress mt-4">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 70%"> PHP</div>
                                </div>
                                <div class="progress mt-4">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 60%"> Photoshop</div>
                                </div>
                                <div class="progress mt-4">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 55%"> Bootstrap</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2><?php echo $profile_displayText ?></h2>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h2>ประวัติการศึกษา</h2>
                        <hr>
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
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h2>ประสบการณ์</h2>
                        <hr>
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
                                    target="_blank"><span class="oi" data-glyph="external-link"></span></a>
                                <a href="https://www.facebook.com/SMD.KKU/posts/2215982308531509" target="_blank"><span
                                        class="oi" data-glyph="external-link"></span></a>
                                <hr>
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
                                <a href="https://www.facebook.com/SMD.KKU/photos/?tab=album&album_id=1936354579827618"><span
                                        class="oi" data-glyph="external-link"></span></a>
                                <a
                                    href="http://smd-s.kku.ac.th/home/index.php/component/content/article/80-2012-09-14-02-08-54/421-computer-education-open-house-2018"><span
                                        class="oi" data-glyph="external-link"></span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

            </div>
        </div>
    </div>
    <?php } else {
        header("Location: ../");
    }
        ?>

    <?php include '../global/footer.php' ?>
</body>

</html>