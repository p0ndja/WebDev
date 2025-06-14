<?php 
    require '../global/connect.php';
?>

<!DOCTYPE html>
<html lang="th" prefix="og:http://ogp.me/ns#">

<head>
    <style>
        header {
            position: relative;
            background-color: black;
            height: 75vh;
            min-height: 25rem;
            width: 100%;
            overflow: hidden;
        }

        header video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            -ms-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        header .container {
            position: relative;
            z-index: 2;
        }

        header .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: black;
            opacity: 0.36;
            z-index: 1;
        }

        html,
        body,
        header,
        .view {
            height: 100% !important;
        }

        #countdown {
            text-align: center;
        }

        .countdown-box {
            display: inline-block;
        }

        .countdown-box p {
            font-size: 6vw;
            line-height: 6vw;
            padding: 5px;
            font-weight: bold;
            margin: 0;
            background: #be0071;
            color: #fff;
        }

        .countdown-box span {
            display: block;
            font-size: 1vw;
            line-height: 1vw;
            background: #dedede;
            padding: 5px;
        }

        @media (pointer: coarse) and (hover: none) {
            header {
                background: url('../static/images/element/thumbnail2020.mp4') black no-repeat center center scroll;
            }

            header video {
                display: url('../static/images/element/thumbnail2020.mp4');
            }
        }

    </style>

    <?php require '../global/head.php'; ?>

</head>

<body>
    <header id="header">
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" style="filter: blur(4px);
  -webkit-filter: blur(4px);">
            <source src="../static/images/element/thumbnail2020.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <div class="d-none d-md-block">
                        <img src="../static/images/logo/logokku_t_w_b.png" class="img-fluid" style="width: 10%" alt="KKU Logo">
                    </div>
                    <div class="d-block d-md-none">
                        <img src="../static/images/logo/logokku_t_w_b.png" class="img-fluid" style="width: 25%" alt="KKU Logo">
                    </div>
                    <h2 class="display-4 d-none d-md-block">โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น</h2>
                    <h1 class="d-block d-md-none">โรงเรียนสาธิต<br>มหาวิทยาลัยขอนแก่น</h1>
                    <h2 class="display-5 d-none d-md-block">ฝ่ายมัธยมศึกษา (มอดินแดง)</h2>
                    <h4 class="d-block d-md-none">ฝ่ายมัธยมศึกษา (มอดินแดง)</h4>
                    <hr>
                    <h3>ประพฤติดี มีพลานามัย <div class="d-block d-lg-none mb-1"></div>ใฝ่หาความรู้ เชิดชูคุณธรรม</h3>
                    <div class="mb-5"></div>
                    <a class="scroll-btn" href="#nav"><img alt="Arrow Down Icon"
                            class="animated infinite pulse delay-3s" src="../static/images/arrow-down.png"></a>
                </div>
            </div>
        </div>

    </header>
</body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-normal" id="nav" role="navigation">
    <?php require '../global/navbar.php'; ?>
</nav>

<body>
    <?php 
        $path = "../static/images/carousel/";
        if (!file_exists($path))
            mkdir($path);
        
        $count = 0;
        $files = glob($path . "*.{jpg,png,gif}", GLOB_BRACE);
        if ($files)
            $count = count($files);
    ?>
    <?php if (getConfig('indexpg_showCarousel', 'bool', $conn) && $count > 0) { ?>
    <div class="container-fluid carousel-bg">
        <div class="container mb-3" id="container">
            <div id="carousel" class="carousel carouselsmoothanimated carouselEventPreview slide carousel-fade z-depth-1" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    <?php 
                    for ($i = 0; $i < $count; $i++) {
                        echo "<li data-target='#carousel' data-slide-to='$i'";
                        if ($i == 0) echo " class='active'></li>";
                        else echo "></li>";
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php for ($i = 0; $i < $count; $i++) { 
                        $picPath = $files[$i];
                        $picName = explode(".", str_replace("../static/images/carousel/", "", $picPath));

                        $line = array();
                        $txtFile = "../static/images/carousel/$picName[0].txt";
                        
                        if (file_exists($txtFile)) {
                            $file = fopen("../static/images/carousel/$picName[0].txt", "r");
                            while(!feof($file)) {
                                array_push($line, fgets($file));
                                # do same stuff with the $line
                            }
                            fclose($file);
                        }
                    ?>
                        <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                            <img src="<?php echo $picPath; ?>" class="d-block w-100" <?php if ($line != null) { echo "alt='$line[0]'"; }?>>
                            <!-- style="-webkit-mask-image: -webkit-gradient(linear, left 50%, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)))" -->
                            <?php if ($line != null) { ?>
                            <div class="carousel-caption d-none d-md-block animated fadeInDown">
                                <div class="carousel-caption-text">
                                    <h5><?php echo $line[0]; ?></h5>
                                    <p>
                                    <?php for($o = 1; $o < count($line); $o++) {
                                        echo $line[$o] . "<br>";
                                    } ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    <?php } ?>
                    
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <hr>
    </div>
    <?php } ?>
    <?php if (getConfig('indexpg_showCourse', 'bool', $conn)) { ?>
    <div class="d-block d-md-none container mt-5 mb-5">
        <div class="alert alert-dark">/* ปิดไม่ให้เห็น Course Carousel ชั่วคราวบนมือถือ */</div>
    </div>
    <div class="d-none d-md-block container-fluid course-bg">
        <div class="container">
            <!-- New Course Style -->
            <!-- TODO: Make CourseCarousel Friendly Support on Mobile -->
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel carouselCourse slide carousel-multi-item" data-ride="carousel">

                <div class="d-none">
                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i
                                class="fas fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->
                </div>

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"
                        style="background-color: #fc6504"></li>
                    <li data-target="#multi-item-example" data-slide-to="1" style="background-color: #fc6504"></li>

                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <div class="col-md-4" style="float:left">
                            <div class="card card-cascade wider mb-2">
                                <div class="view view-cascade">
                                    <img class="card-img-top" src="../static/images/course/temp/32372968_1702243213177844_8687341048659181568_o.jpg"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body card-body-cascade">
                                    <div class="card-text">
                                        <a class="btn-floating blue" href="https://www.facebook.com/SMD.KKU" target="_blank"><i class="fab fa-facebook"></i></a><a href="https://www.facebook.com/SMD.KKU" target="_blank">SMD.KKU</a><br>
                                        <a class="btn-floating green" href="tel:043202044"><i class="fas fa-phone"></i></a><a href="tel:043202044">(+66) 043202044</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="float:left">
                            <div class="card card-cascade wider mb-2">
                                <div class="view view-cascade">
                                    <img class="card-img-top"
                                        src="../static/images/course/temp/32262798_1702255009843331_7907980895921897472_o.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                
                                <div class="card-body card-body-cascade">
                                    <h4 class="card-title">หลักสูตรปกติ</h4>
                                    <h5><span class="badge badge-smd z-depth-0">มัธยมศึกษาตอนต้น</span></h5>
                                    <div class="collapse-content">
                                        <p class="card-text collapse" id="pNormalCollapse">
                                            มีเป้าหมายเพื่อให้นักเรียนมีความรู้พื้นฐานและทักษะการคิดที่จำเป็นในการดำเนินชีวิต
                                            ใช้เทคโนโลยีเพื่อการสื่อสาร รู้และเข้าใจตนเองตลอดจนสังคมตระหนักถึงความเป็นพลโลก
                                        </p>
                                        <a class="btn btn-flat text-smd p-1 my-1 mr-0 mml-1 collapsed"
                                            data-toggle="collapse" href="#pNormalCollapse" aria-expanded="false"
                                            aria-controls="collapseContent"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="float:left">
                            <div class="card card-cascade wider mb-2">
                                <div class="view view-cascade">
                                    <img class="card-img-top"
                                        src="../static/images/course/temp/32266858_1702256239843208_898557860412129280_o.jpg"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body card-body-cascade">
                                    <h4 class="card-title">หลักสูตร JEMS</h4>
                                    <h5><span class="badge badge-smd z-depth-0">มัธยมศึกษาตอนต้น</span></h5>
                                    <div class="collapse-content">
                                        <p class="card-text collapse" id="pJEMSCollapse">
                                            มีเป้าหมายเพื่อให้ผู้เรียนมีความรู้และทักษะการคิดที่จำเป็นในการดำเนินชีวิต
                                            มีทักษะกระบวนการทางวิทยาศาสตร์ - คณิตศาสตร์ เชื่อมโยงและบูรณาการณศาสตร์
                                            เพื่อสร้างชิ้นงาน / โครงงาน ใช้เทคโนโลยีและภาษาอังกฤษในการสื่อสารและสืบค้น
                                            รู้และเข้าใจตนเองตลอดจนสังคม ตระหนักถึงความเป็นพลโลก</p>
                                        <a class="btn btn-flat text-smd p-1 my-1 mr-0 mml-1 collapsed"
                                            data-toggle="collapse" href="#pJEMSCollapse" aria-expanded="false"
                                            aria-controls="collapseContent"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">

                        <div class="col-md-4" style="float:left">
                            <div class="card card-cascade wider mb-2">
                                <div class="view view-cascade">
                                    <img class="card-img-top"
                                        src="../static/images/course/temp/32463135_1702250333177132_5636889996108496896_o.jpg"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body card-body-cascade">
                                    <h4 class="card-title">หลักสูตรปกติ</h4>
                                    <h5><span class="badge red z-depth-0">มัธยมศึกษาตอนปลาย</span></h5>
                                    <div class="collapse-content">
                                        <p class="card-text collapse" id="sNormalCollapse">
                                            มีเป้าหมายเพื่อให้นักเรียนมีความรู้พื้นฐานและทักษะการคิด
                                            มีทักษะกระบวนการทางวิทยาศาสตร์ - คณิตศาสตร์ ใช้เทคโนโลยีเพื่อการสื่อสาร
                                            นักเรียนมีเป้าหมายในการศึกษาต่อและประกอบอาชีพตามความถนัดและความสนใจ
                                            รู้และเข้าใจตนเอง ตลอดจนสังคม ตระหนักถึงความเป็นพลโลก</p>
                                        <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed"
                                            data-toggle="collapse" href="#sNormalCollapse" aria-expanded="false"
                                            aria-controls="collapseContent"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="float:left">
                            <div class="card card-cascade wider mb-2">
                                <div class="view view-cascade">
                                    <img class="card-img-top"
                                        src="../static/images/course/temp/32377662_1702248076510691_8551041704629633024_o.jpg"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body card-body-cascade">
                                    <h4 class="card-title">หลักสูตร SEMS</h4>
                                    <h5><span class="badge red z-depth-0">มัธยมศึกษาตอนปลาย</span></h5>
                                    <div class="collapse-content">
                                        <p class="card-text collapse" id="sSEMSCollapse">
                                            มีเป้าหมายเพื่อให้นักเรียนมีความรู้พื้นฐาน มีทักษะการคิด
                                            มุ่งเน้นทักษะปฏิบัติการทางวิทยาศาสตร์ขั้นสูง ใช้ทักษะกระบวนการทางวิทยาศาสตร์ -
                                            คณิตศาสตร์ เชื่อมโยงและบูรณาการณศาสตร์ เพื่อสร้างชิ้นงาน / โครงงาน
                                            ใช้เทคโนโลยีและภาษาอังกฤษในการสื่อสารและสืบค้น มุ่งเน้นการพัฒนาทักษะภาษาอังกฤษ
                                            เพื่อรองรับการเข้าสู่มาตรฐานระดับนานาชาติ รู้และเข้าใจตนเองตลอดจนสังคม
                                            ตระหนักถึงความเป็นพลโลก</p>
                                        <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed"
                                            data-toggle="collapse" href="#sSEMSCollapse" aria-expanded="false"
                                            aria-controls="collapseContent"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="float:left">
                            <div class="card card-cascade wider mb-2">
                                <div class="view view-cascade">
                                    <img class="card-img-top"
                                        src="../static/images/course/temp/32414071_1702251376510361_873323149431668736_o.jpg"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body card-body-cascade">
                                    <h4 class="card-title">หลักสูตร วมว.</h4>
                                    <h5><span class="badge red z-depth-0">มัธยมศึกษาตอนปลาย</span></h5>
                                    <div class="collapse-content">
                                        <p class="card-text collapse" id="sSCiUSCollapse">
                                            เพื่อสนับสนุนการขยายฐานกำลังคนนักวิจัยด้านวิทยาศาสตร์และเทคโนโลยีที่มีศักยภาพตั้งแต่ระดับมัธยมศึกษาตอนปลาย
                                            โดยมีจุดเน้นด้านวิทยาศาสตร์ธรรมชาติ วิทยาศาสตร์ประยุกต์
                                            เทคโนโลยีชีวภาพและเทคโนโลยีการเกษตร
                                            โดยการจัดการเรียนการสอนที่มุ่งเน้นทักษะกระบวนการทางวิทยาศาสตร์
                                            ผ่านโครงงานและงานวิจัยทางวิทยาศาสตร์และเน้นกระบวนการคิดตามแนวทางการศึกษาชั้นเรียน
                                            (Lesson Study) และวิธีการแบบเปิด (Open Approach)</p>
                                        <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed"
                                            data-toggle="collapse" href="#sSCiUSCollapse" aria-expanded="false"
                                            aria-controls="collapseContent"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Second slide-->
                </div>
                <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
            <!-- New Course Style -->
        </div>
    </div>
    </div>
    <?php } ?>
    <?php if (getConfig('indexpg_showLatestNews', 'bool', $conn)) { ?>
    <div class="indexNews">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9">
                    <h1 id="news" name="news" class="font-weight-bold"><a href="../category/news-1"><img
                                src="../static/images/element/header/news.png" class="img-fluid"></a>
                        <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a href="../post/create"
                            class="btn btn-sm bg-smd"><i class="fas fa-plus"></i> เขียนข่าวใหม่</a><?php } ?>
                    </h1>

                    <?php   $query = "SELECT * FROM `post` WHERE hide = 0 AND type = 'news' ORDER by pin DESC, time DESC limit 6";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                    <?php if (getPostdata($row['id'], 'hotlink', $conn) == null) { ?>
                    <div class="card hoverable mb-3">
                        <?php if ($row['cover'] != null) { ?><img class="card-img-top"
                            src="<?php echo $row['cover']; ?>"><?php } ?>
                        <div class="card-body">
                            <p class="card-text"><i class="far fa-clock"></i>
                                <?php
                                    $writer_id = $row['writer'];
                                    $writer_name = getUserdata($writer_id, 'firstname', $conn) . ' ' . getUserdata($writer_id, 'lastname', $conn) . ' (' . getUserdata($writer_id, 'username', $conn) . ')';
                                    echo $row['time'] . ' โดย ' . '<a href="../profile/' . $writer_id . '">' . $writer_name . '</a>'; 
                                ?>
                            </p>
                            <div class="card-title">
                                <h5 class="font-weight-bold"><a
                                        href="../post/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                                    <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a
                                        href="../post/edit-<?php echo $row['id']; ?>"><i
                                            class="fas fa-edit text-success"></i></a> <a
                                        onclick='
                                swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                                        <i class="fas fa-trash-alt text-danger"></i></a><?php } ?>
                                </h5>
                                <h6>
                                    <?php foreach (explode(",", $row['tags']) as $s) { ?>
                                    <a href="../category/news-1-<?php echo $s; ?>"><span
                                            class="badge badge-smd z-depth-0"><?php echo $s; ?></span></a>
                                    <?php } ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <?php } else { // Case post is a hotlink ?>
                        <?php if ($row['hotlink'] != '#') { ?><a href="<?php echo $row['hotlink']; ?>" target="_blank"><?php } ?>
                        <div class="card hoverable">
                            <?php if ($row['cover'] != null) { ?><img class="card-img-top"
                                src="<?php echo $row['cover']; ?>"><?php } ?>
                            <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><div
                                class="card-body text-white p-2"><a href="<?php echo $row['hotlink']; ?>"
                                    target="_blank"><?php echo $row['title']; ?></a>
                                <a href="../post/edit-<?php echo $row['id']; ?>"><i
                                        class="fas fa-edit text-success"></i></a> <a
                                    onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                                    <i class="fas fa-trash-alt text-danger"></i></a></div><?php } ?>
                        </div>
                        <?php if ($row['hotlink'] != '#') { ?></a`><?php } ?>
                    <p class="mb-3">
                    </p>
                    <?php } ?>
                    <?php } ?>
                    <a href="../category/news-1" class="btn btn-md mb-3 float-right">
                        <div class="font-weight-bold">อ่านเพิ่มเติม <i class="fas fa-location-arrow"></i></div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="d-none d-md-block card mt-3 mb-3 float-center">
                        <img class="card-img-top"
                            src="../static/images/management/Secondary-Hotline<?php if(isDarkMode()) echo "_d";?>.jpg" />
                    </div>
                    <div class="d-none d-xl-block fb-page mb-3" data-href="https://www.facebook.com/SMD.KKU"
                        data-tabs="timeline" data-width="300" data-height="550" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/SMD.KKU" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/SMD.KKU">สาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา
                                (มอดินแดง)</a></blockquote>
                    </div>
                    <div class="card mb-3">
                        <div class="hoverable view">
                            <div class="card-body">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1422.7832711614212!2d102.83013724920174!3d16.480603791462354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228aed02885aa5%3A0x107dbd3c7fe46020!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Liq4Liy4LiY4Li04LiV4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LiC4Lit4LiZ4LmB4LiB4LmI4LiZICjguKHguK3guJTguLTguJnguYHguJTguIcp!5e0!3m2!1sth!2sth!4v1577883715935!5m2!1sth!2sth"
                                    width="98%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                <p class="card-text"><u>ที่อยู่</u> 123 มหาวิทยาลัยขอนแก่น
                                    โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น
                                    ฝ่ายมัธยมศึกษา (มอดินแดง) ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002</p>
                                <p class="card-text"><u>โทรศัพท์</u> <a href="tel:043202044">043202044</a> /
                                    <u>โทรสาร</u>
                                    043364504</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="d-none d-md-block">
                                    <a data-toggle="collapse" href="#satitCollapse" aria-expanded="false"
                                        aria-controls="satitCollapse"><img class="img-fluid"
                                            src="../static/images/element/satitmenu-min.png" alt="SATIT"></a>
                                    <div class="collapse" id="satitCollapse">
                                        <div class="mb-1">
                                            <div class="row">
                                                <ul>
                                                    <li><a href="//satit.kku.ac.th"
                                                            target="_blank">สาธิตมหาวิทยาลัยขอนแก่น
                                                            (ส่วนกลาง)</a></li>
                                                    <li><a href="//anuban.satit.kku.ac.th" target="_blank">สาธิตฯ
                                                            ฝ่ายอนุบาล</a></li>
                                                    <li><a href="//primary.satit.kku.ac.th" target="_blank">สาธิตฯ
                                                            ฝ่ายประถมศึกษา (ศึกษาศาสตร์)</a></li>
                                                    <li><a href="//satitmo.kku.ac.th" target="_blank">สาธิตฯ
                                                            ฝ่ายประถมศึกษา
                                                            (มอดินแดง)</a></li>
                                                    <li><a href="//sec.satit.kku.ac.th" target="_blank">สาธิตฯ
                                                            ฝ่ายมัธยมศึกษา (ศึกษาศาสตร์)</a></li>
                                                    <li><a href="//www.smd.kku.ac.th" target="_blank">สาธิตฯ
                                                            ฝ่ายมัธยมศึกษา
                                                            (มอดินแดง)</a></li>
                                                    <li><a href="//autistickku.com" target="_blank">สาธิตฯ
                                                            ฝ่ายการศึกษาพิเศษ
                                                            (ศูนย์วิจัยออทิสติก)</a></li>
                                                    <ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block d-md-none">
                                    <a href="//satit.kku.ac.th" target="_blank"><img class="img-fluid"
                                            src="../static/images/element/satitmenu-min.png" alt="SATIT"></a>
                                </div>
                            </div>
                            <div class="col-6 col-md-12"><a href="//th.kku.ac.th" target="_blank"><img class="img-fluid"
                                        src="../static/images/element/kkumenu-min.png" alt="KKU"></a></div>
                            <div class="col-6 col-md-12"><a href="//ednet.kku.ac.th" target="_blank"><img
                                        class="img-fluid" src="../static/images/element/edmenu-min.png" alt="ED"></a>
                            </div>
                            <div class="col-6 col-md-12"><a href="//kkumail.com" target="_blank"><img class="img-fluid"
                                        src="../static/images/element/mailmenu-min.png" alt="KKU Mail"></a></div>
                            <div class="col-6 col-md-12"><a href="//home.kku.ac.th/account/satit" target="_blank"><img
                                        class="img-fluid" src="../static/images/element/netmenu-min.png"
                                        alt="KKU Net"></a>
                            </div>
                            <div class="col-6 col-md-12"><a href="//edoffice.kku.ac.th" target="_blank"><img
                                        class="img-fluid" src="../static/images/element/edofficemenu-min.png"
                                        alt="ED-OFFICE"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v7.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="908697645917311"
        logged_in_greeting="ติดต่อสอบถามข้อมูลเพิ่มเติม" logged_out_greeting="ติดต่อสอบถามข้อมูลเพิ่มเติม">
    </div>

    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>

    <script>
        $(window).bind('scroll', function () {
            var stick = false;
            if ($(window).scrollTop() > $(window).height()) {
                $('#nav').removeClass('navbar-top');
                $('#nav').addClass('fixed-top');
                $('#nav').addClass('scrolling-navbar');
                document.getElementById("container").style.paddingTop = "88px";

                stick = true;

            } else {
                $('#nav').removeClass('fixed-top');
                $('#nav').removeClass('scrolling-navbar');
                $('#nav').addClass('navbar-top');
                document.getElementById("container").style.paddingTop = "19px";

                stick = false;
            }
        });
    </script>

    <?php if (!isset($_SESSION['isAnnouncementPopedUp'])) { ?>
    <script>
        $(window).on('load', function () {
            $('#announcementPopup').modal('show');
        });
    </script>
    <?php } ?>
    <?php $_SESSION['isAnnouncementPopedUp'] = true; ?>
</body>

</html>