<!DOCTYPE html>
<html lang="th">

<head>
    <style>
        .fluid-background {
            background: url(http://www.outcomesstar.org.uk/wp-content/uploads/work-star-banner.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            width: 100%;
            height: 100%;
        }

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
                background: url('https://storage.pondja.com/Untitled%20Project.mp4') black no-repeat center center scroll;
            }

            header video {
                display: url('https://storage.pondja.com/Untitled%20Project.mp4');
            }
        }

        .navbar-transparent {
            background-color: transparent;
        }

        html,
        body,
        header,
        .view {
            height: 100%;
        }

        .wrapper {
            width: 100%;
            position: relative;
            background-color: #fff;
        }

        .wrapper:after {
            padding-top: 42.85714285714287%;
            display: block;
            content: '';
        }

        .wrapper .column {
            position: absolute;
            left: 0;
            top: 0;
            width: 14.2857142857142857%;
            float: left;
            padding: 6px;
            box-sizing: border-box;
        }

        .wrapper .column .inner {
            width: 100%;
            position: relative;
        }

        .wrapper .column .inner:after {
            padding-top: 100%;
            /* ratio 1:1 */
            display: block;
            content: '';
        }

        .wrapper .column .inner:before {
            content: ' ';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-transition: 300ms ease-in-out;
            transition: 300ms ease-in-out;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .wrapper .column .inner:hover:before {
            background-color: rgba(0, 0, 0, 0);
        }

        .wrapper .column:nth-child(1) {
            width: 28.5714285714285714%;
        }

        .wrapper .column:nth-child(2) {
            left: 28.5714285714285714%;
        }

        .wrapper .column:nth-child(3) {
            left: 28.5714285714285714%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .wrapper .column:nth-child(4) {
            width: 28.5714285714285714%;
            left: 42.85714285714286%;
            top: 0;
        }

        .wrapper .column:nth-child(4) .inner:after {
            padding-top: 48.7%;
        }

        .wrapper .column:nth-child(5) {
            left: 71.42857142857143%;
            top: 0;
        }

        .wrapper .column:nth-child(6) {
            left: auto;
            right: 0;
            top: 0;
        }

        .wrapper .column:nth-child(7) {
            left: 71.42857142857143%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .wrapper .column:nth-child(8) {
            left: auto;
            right: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .wrapper .column:nth-child(9) {
            width: 28.5714285714285714%;
            top: auto;
            left: 0;
            bottom: 0;
        }

        .wrapper .column:nth-child(9) .inner:after {
            padding-top: 48.7%;
        }

        .wrapper .column:nth-child(10) {
            left: 28.5714285714285714%;
            top: auto;
            bottom: 0;
        }

        .wrapper .column:nth-child(11) {
            left: 42.85714285714286%;
            top: auto;
            bottom: 0;
            width: 28.5714285714285714%;
        }

        .wrapper .column:nth-child(12) {
            left: auto;
            top: auto;
            bottom: 0;
            right: 0;
            width: 28.5714285714285714%;
        }

        .wrapper .column:nth-child(12) .inner:after {
            padding-top: 48.7%;
        }

        /* BEAUTY */

        body,
        html {
            background-color: #ededed;
            padding: 0;
        }

        .wrapper .column .inner {
            background-size: cover;
            background-position: center;
        }

        .wrapper .column:nth-child(1) .inner {
            background-image: url('https://risaka.pondja.com/IMG_1069%20(1).JPG');
        }

        .wrapper .column:nth-child(2) .inner {
            background-image: url('https://risaka.pondja.com/IMG_7315%20(1).JPG');
        }

        .wrapper .column:nth-child(3) .inner {
            background-image: url('https://risaka.pondja.com/IMG_8295.jpg');
        }

        .wrapper .column:nth-child(4) .inner {
            background-image: url('https://risaka.pondja.com/DSC_0158.JPG');
        }

        .wrapper .column:nth-child(5) .inner {
            background-image: url('https://risaka.pondja.com/IMG_8717.jpg');
        }

        .wrapper .column:nth-child(6) .inner {
            background-image: url('https://risaka.pondja.com/IMG_1652.JPG');
        }

        .wrapper .column:nth-child(7) .inner {
            background-image: url('https://risaka.pondja.com/IMG_8167.JPG');
        }

        .wrapper .column:nth-child(8) .inner {
            background-image: url('https://risaka.pondja.com/IMG_1652.JPG');
        }

        .wrapper .column:nth-child(9) .inner {
            background-image: url('https://risaka.pondja.com/IMG_3574.JPG');
        }

        .wrapper .column:nth-child(10) .inner {
            background-image: url('https://risaka.pondja.com/IMG_8288.jpg');
        }

        .wrapper .column:nth-child(11) .inner {
            background-image: url('https://risaka.pondja.com/IMG_1266.JPG');
        }

        .wrapper .column:nth-child(12) .inner {
            background-image: url('https://risaka.pondja.com/DSCN0825_resize%20(1).JPG');
        }

        .wrapper .column:nth-child(13) .inner {
            background-image: url('https://risaka.pondja.com/FB_IMG_1536311202928%20(1).jpg');
        }
    </style>

    <?php include '../global/head.php'; ?>

</head>

<body style="">

    <?php include '../global/login.php'; ?>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark scrolling-navbar navbar-transparent">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="https://storage.pondja.com/Untitled%20Project.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <h1 class="display-4">โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น</h1>
                    <h1 class="display-4">ฝ่ายมัธยมศึกษา (มอดินแดง)</h1>
                    <hr>
                    <h3>ประพฤติดี มีพลานามัย ใฝ่หาความรู้ เชิดชูคุณธรรม</h3>
                </div>
            </div>
        </div>

    </header>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/1300x400.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>
                                    <p class="text-dark">First slide label</p>
                                </h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/1300x400.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/1300x400.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <h1>หลักสูตรการเรียน</h1>
        <hr>
    </div>
    <div class="container-fluid fluid-backgroundd"
        style="background-image: url(http://www.outcomesstar.org.uk/wp-content/uploads/work-star-banner.jpg);">
        <hr>
        <div class="container">
        </div>

        <div class=" container">
            <div class="wrapper">
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
                <div class="column">
                    <div class="inner"></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <h1>NEWS</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card z-depth-0">
                            <div class="hoverable view overlay zoom">
                                <img class="card-img-top"
                                    src="https://www.uppic.org/images/2019/10/24/CAA05982-C213-4BA1-8218-D8F2DFB54C72.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"><span class="oi" data-glyph="calendar"></span> 24/10/2562
                                    </p>
                                    <h5 class="card-title">รางวัล GISTDA TOP VOTE</h5>
                                    <p class="card-text">เด็กสาธิตฯ เจ๋ง! คว้ารางวัล GISTDA TOP VOTE
                                        จากโครงการประกวดสื่อภูมิสารสนเทศ ครั้งที่ 8 ประจำปี 2562
                                        ที่จัดขึ้นระหว่างวันที่ 28 สิงหาคม 2562 ณ อิมแพ็คฯ เมืองทองธานี
                                        ด้านอาจารย์ให้สัมภาษณ์ ปีนี้คือที่สุด
                                        <b><u>ย้ำ ปีหน้าไม่ส่งแล้ว</u></b><br>
                                        <span
                                            class="badge badge-secondary z-depth-0">การแข่งขันการประกวดสื่อภูมิสารสนเทศ</span>
                                    </p>
                                </div>
                                <div class="card-footer text-right"><a href="#fuq" class="card-link">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card z-depth-0">
                            <img class="card-img-top" src="https://media1.giphy.com/media/9PwWklO9tSELtIhBka/source.gif"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Web Developer Require! <span
                                        class="badge badge-danger blink2">HELP WANTED</span></h5>
                                <p class="card-text">We need your help~.
                                    <br><b>Requirement: </b>
                                    <br>- Full-stack programming skill
                                    <br>- Able to create websites with Bootstrap, HTML, PHP
                                    <br>- Able to read/write database with MySQL
                                    <br>- Sleep more than 8 hours per night
                                </p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="https://m.me/p0ndja" class="btn btn-primary card-link">Register Your
                                    Soul</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">

            </div>
            <br>
            <br />
        </div>
    </div>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v4.0'
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
    <div class="fb-customerchat" attribution=setup_tool page_id="224318804364546" theme_color="#006AFF"
        logged_in_greeting="ติดต่อสอบถามข้อมูลเพิ่มเติม" logged_out_greeting="ติดต่อสอบถามข้อมูลเพิ่มเติม"></div>

    <?php include '../global/footer.php';?>
</body>

</html>