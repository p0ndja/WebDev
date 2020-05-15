<?php 
    require '../global/connect.php';
?>

<!DOCTYPE html>
<html lang="th">

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
            opacity: 0.5;
            z-index: 1;
        }

        @media (pointer: coarse) and (hover: none) {
            header {
                background: url('../static/images/element/thumbnail-min.mp4') black no-repeat center center scroll;
            }

            header video {
                display: url('../static/images/element/thumbnail-min.mp4');
            }
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
    </style>

    <?php require '../global/head.php'; ?>

</head>

<body>
    <header id="header">
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" style="filter: blur(3px);
  -webkit-filter: blur(4px);">
            <source src="../static/images/element/thumbnail-min.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <div class="d-none d-md-block">
                        <img src="../static/images/logo/logokku_t_w_b.png" class="img-fluid" style="width: 10%">
                    </div>
                    <div class="d-block d-md-none">
                        <img src="../static/images/logo/logokku_t_w_b.png" class="img-fluid" style="width: 25%">
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
    <?php if (getConfig('indexpg_showCarousel', 'bool', $conn)) { ?>
    <div class="container-fluid course-bg">
        <div class="container mb-3" id="container">
            <div id="carousel" class="carousel slide carousel-fade z-depth-1" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                    <li data-target="#carousel" data-slide-to="5"></li>
                    <li data-target="#carousel" data-slide-to="7"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cdn.discordapp.com/attachments/700717666540978266/701164374064365638/SMD_OLS_1.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>SMD Online School</h5>
                            <p>สามารถเข้าร่วมได้ที่ Discord : <a href="https://smd.pondja.com/discord"
                                    style="color:yellow;" class="font-weight-bold">SMD Online School</a></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/601788363313512480/642620653115277322/slider_1.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>พิธีไหว้ครู</h5>
                            <p>ณ โรงเรียนสาธิตฯ (มอดินแดง) วันที่ 28 มิถุนายน 2561</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/601788363313512480/642621390935293952/slider_2.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>
                                <p class="text-dark">กิจกรรมพาน้องไปวัด</p>
                            </h5>
                            <p class="text-dark">ณ ศูนย์ปฏิบัติธรรมสวนเวฬุวัน จ.ขอนแก่น วันที่ 1-5 พฤษภาคม 2561</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/601788363313512480/642626173565927425/slider_4.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>กิจกรรมพาน้องไปวัด</h5>
                            <p>ณ โรงเรียนสาธิตฯ (มอดินแดง) วันที่ 29 เมษายน 2561</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/601788363313512480/642622165350481930/slider_3.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>กิจกรรมวันสงกรานต์</h5>
                            <p>ณ โรงเรียนสาธิตฯ (มอดินแดง) วันที่ 10 เมษายน 2561</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.discordapp.com/attachments/601788363313512480/642628541145546762/slider_5.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>กิจกรรมสัมมนาและส่งเสริมศักยภาพความเป็นผู้นำของคณะกรรมการนักเรียนประจำปีการศึกษา
                                2562</h5>
                            <p>ณ เขื่อนจุฬาภรณ์ ต.ทุ่งลุยลาย จ.ชัยภูมิ วันที่ 25-27 พฤษภาคม 2562</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../static/images/default/default_carousel.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block animated fadeInDown">
                            <h5>Carousel Guide</h5>
                            <p>ขนาดรูปที่แนะนำ: 1400(W) x 600(H)</p>
                        </div>
                    </div>
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
    <div class="container mb-5 mt-5">
        <div class="row mb-4">
            <div class="col-4">
                <div class="view overlay zoom z-depth-1">
                    <a href="../file/post/attachment/41/_20200117160236_S__1310728.jpg">
                        <img src="../static/images/course/2_p_normal<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="view overlay zoom z-depth-1">
                    <a href="../file/post/attachment/41/_20200117160236_S__1310728.jpg">
                        <img src="../static/images/course/2_p_jems<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="view overlay zoom z-depth-1">
                    <a href="http://www.smd.kku.ac.th/">
                        <img src="../static/images/course/2_reg<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="view overlay zoom z-depth-1">
                    <a href="https://www.facebook.com/SMD.KKU">
                        <img src="../static/images/course/2_contact<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="view overlay zoom z-depth-1">
                    <a href="../file/post/attachment/41/_20200117160335_S__1310732.jpg">
                        <img src="../static/images/course/2_s_normal<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="view overlay zoom z-depth-1">
                    <a href="../file/post/attachment/41/_20200117160335_S__1310732.jpg">
                        <img src="../static/images/course/2_s_sems<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="view overlay zoom z-depth-1">
                    <a href="../file/post/attachment/41/_20200117160335_S__1310732.jpg">
                        <img src="../static/images/course/2_s_scius<?php if(isDarkMode()) echo "_d";?>.jpg" class="img-fluid">
                        <div class="mask flex-center rgba-orange-light">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if (getConfig('indexpg_showLatestNews', 'bool', $conn)) { ?>
    <div class="indexNews">
        <div class="container">
            <h1 id="news" name="news" class="font-weight-bold"><a href="../category/news-1"><img
                        src="../static/images/element/news_header.png" class="img-fluid"></a>
                <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a href="../post/create"
                    class="btn btn-sm btn-info"><i class="fas fa-plus"></i> เขียนข่าวใหม่</a><?php } ?>
            </h1>
            <div class="row">
                <div class="col-12 col-md-8">
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
                                    <a href="../post/?tags=<?php echo $s; ?>"><span
                                            class="badge badge-smd z-depth-0"><?php echo $s; ?></span></a>
                                    <?php } ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <?php } else { // Case post is a hotlink ?>
                    <a href="<?php echo $row['hotlink']; ?>" target="_blank">
                        <div class="card hoverable">
                            <?php if ($row['cover'] != null) { ?><img class="card-img-top"
                                src="<?php echo $row['cover']; ?>"><?php } ?>
                                <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><div class="card-body text-white p-2"><a
                            href="<?php echo $row['hotlink']; ?>" target="_blank"><?php echo $row['title']; ?></a>
                            <a href="../post/edit-<?php echo $row['id']; ?>"><i class="fas fa-edit text-success"></i></a> <a
                            onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                            <i class="fas fa-trash-alt text-danger"></i></a></div><?php } ?>
                        </div>
                    </a>
                    <p class="mb-3">
                    </p>
                    <?php } ?>
                    <?php } ?>
                    <a href="../category/news-1" class="btn btn-md mb-3 float-right">
                        <div class="font-weight-bold">อ่านเพิ่มเติม <i class="fas fa-location-arrow"></i></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="d-none d-xl-block fb-page mb-3" data-href="https://www.facebook.com/SMD.KKU"
                        data-tabs="timeline" data-width="500" data-height="850" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/SMD.KKU" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/SMD.KKU">สาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา
                                (มอดินแดง)</a></blockquote>
                    </div>
                    <div class="mb-3">
                        <iframe src="https://ptb.discordapp.com/widget?id=700717529068470353&theme=dark" width="100%"
                            height="500" allowtransparency="true" frameborder="0" class="z-depth-3"></iframe>
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
                                        class="img-fluid" src="../static/images/element/edmenu-min.png" alt="ED"></a></div>
                            <div class="col-6 col-md-12"><a href="//kkumail.com" target="_blank"><img class="img-fluid"
                                        src="../static/images/element/mailmenu-min.png" alt="KKU Mail"></a></div>
                            <div class="col-6 col-md-12"><a href="//home.kku.ac.th/account/satit" target="_blank"><img
                                        class="img-fluid" src="../static/images/element/netmenu-min.png" alt="KKU Net"></a>
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
                version: 'v6.0'
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

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="908697645917311" theme_color="#0473ff"
        logged_in_greeting="ติดต่อสอบถามข้อมูลเพิ่มเติม" logged_out_greeting="ติดต่อสอบถามข้อมูลเพิ่มเติม">
    </div>
    <script>
        $(window).on('resize', function () {
            setTimeout(function () {
                CMSSpace.changeFBPagePlugin()
            }, 500);
        });

        $(window).on('load', function () {
            setTimeout(function () {
                CMSSpace.changeFBPagePlugin()
            }, 1500);
        });
        CMSSpace.changeFBPagePlugin = function () {
            //getting parent box width
            var container_width = (Number($('.fb-column').width()) - Number($('.fb-column').css('padding-left')
                .replace("px", ""))).toFixed(0);
            //getting parent box height
            var container_height = (Number($('.fb-column').height()) - (Number($('.fb-column-header').height()) +
                Number($('.fb-column-   header').css('margin-bottom').replace("px", "")) + Number(($(
                    '.fb-column').css('padding-top').replace("px", "") * 2)))).toFixed(0);
            if (!isNaN(container_width) && !isNaN(container_height)) {
                $(".fb-page").attr("data-width", container_width).attr("data-height", container_height);
            }
            if (typeof FB !== 'undefined') {
                FB.XFBML.parse();
            }
        }
    </script>
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