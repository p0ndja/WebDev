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
        <!--<div class="card-group">
                <div class="card">
                    <div class="card-img-top">
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="3000">
                                    <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/52263876_1930475510415525_1493587263869681664_o.jpg?_nc_cat=110&_nc_eui2=AeF9IMoYGp1n7UZMgYVXs5csU8wVHFeIWpZsp8p7fBRS_gjuD83jSdp5dK8JFFIxy0kjNqqRQqUotBeDnLVb3d-BIS7eX8Y0ghYoCkJtDyOnbw&_nc_oc=AQmPb5gatfNlwnuzhO_zz_Tx4zIyntwU1Dhpry02a9qAFd0jREYXkTfKeBZwfq7WixI&_nc_ht=scontent.fkkc3-1.fna&oh=52cfc9c4fef4fcb5fd4dba481ee0f67a&oe=5E2BB15D"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-interval="3000">
                                    <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/52344325_1930510757078667_559080252312125440_o.jpg?_nc_cat=106&_nc_eui2=AeHK8jDoJpxGCE1oaXhIz1uiBx53pYNnMlFBHOb-xe5OyBY-6MZUcLISEieWl_EMPdLLzs6Ect-94F9MhZV2mA3Ysgcf1zZ5cyZHzCV-hmPcFg&_nc_oc=AQmWT53alpFhiY_kksA17RA9vJCGFJvRTwERnbQd3JJ-Pn5rNhe48XL-fjsU1hc2tJA&_nc_ht=scontent.fkkc3-1.fna&oh=e84be33afae6307747912835c119fdd5&oe=5E229350"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-interval="3000">
                                    <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/52165070_1930510157078727_8274839715102851072_o.jpg?_nc_cat=100&_nc_eui2=AeHFQhmr-4oeplhKHOaWNcsDaw1ySdpyvVUrOuZ-XoWy9TUPcWE9Nct-S793tYUJ1aySyUuWpQkwIDlttWOfUhXiUvXmcxpc-ra6Yzab1oBHxg&_nc_oc=AQkSz_jG1_S-s01v8_2MFnlyhbRdvt5PEC6jj_0OM5p-m-u1zavOAdMMukj7nDzBc4Y&_nc_ht=scontent.fkkc3-1.fna&oh=27d2474962dffb53800e5438e10b7a3e&oe=5E23F581"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">EMSP</h5>
                        <p class="card-text">Some text to build on the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">อ่านเพิ่มเติม..</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img-top">
                        <div id="carouselExampleInterval2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="3000">
                                    <img src="images/card-img.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-interval="3000">
                                    <img src="images/card-img.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-interval="3000">
                                    <img src="images/card-img.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleInterval2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">วมว</h5>
                        <p class="card-text">Some text to build on the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">อ่านเพิ่มเติม..</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img-top">
                        <div id="carouselExampleInterval3" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="3000">
                                    <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/65747130_2134465173349890_8868195305380642816_o.jpg?_nc_cat=100&_nc_eui2=AeGKxqiitj7RGHBApy8otNR-ulzq-C3kqHHHnVNrpJ1rU_wkIaxe_1UJ-9MKJ6xOJiUGXjNAmyFx0G2NSnUMHkESa-z7q7WrFiqdl1VooojzmA&_nc_oc=AQmzOCWSZsDq1gVTIhIZQyTl_4pdy2UeYgkyYv5KiBtWffVYyFE7kUI0Q4yh7GAb77c&_nc_ht=scontent.fkkc3-1.fna&oh=a6447d29e222b7f4b5e748e2d0206e3d&oe=5E24D061"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-interval="3000">
                                    <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/66280850_2134467136683027_1096266135738777600_o.jpg?_nc_cat=109&_nc_eui2=AeFVsWshfjFQLU4ES4-Xo0xDWDao4HdZptG2XRgNZJq6LIiw8WzLY9EP0zOHSVMeBKqDUCz_D_i0QIJblPxy1tuS85EmEts-eswJN0os_-6TeA&_nc_oc=AQlAeIXB1JJVBFLN-lsIlPORCMWowP8k5Atync4DfHXxRmFR81GpSKJ4uw9MSibrD9I&_nc_ht=scontent.fkkc3-1.fna&oh=9871a6ec71ff19f75236f0509821ba43&oe=5E2BF601"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-interval="3000">
                                    <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/65819323_2134465746683166_4917275093316403200_o.jpg?_nc_cat=109&_nc_eui2=AeFDm6x5CiYbB89s0_zLEg5sxlvsIii202pfzCf3hdotnvo8iP61QlFIyrWt9kWqqmaS3r0aeo2vC2rEBJzEaAdyAFSdg1TEIXd4KTW_NoZCJg&_nc_oc=AQkmQfhNbyv_QfsVyfn7S4N-ty0U4xYzVKI1I2bvhc1Tsqad_BXDvoVs6K2BDOgp-XQ&_nc_ht=scontent.fkkc3-1.fna&oh=66b59b42f9d74feaf8bf8124b0052f60&oe=5E57233E"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleInterval3" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval3" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">ปกติ</h5>
                        <p class="card-text">Some text to build on the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">อ่านเพิ่มเติม..</a>
                    </div>
                </div>
            </div>
        </div>-->
        <hr>
    </div>
    <div class="container-fluid fluid-backgroundd"
        style="background-image: url(http://www.outcomesstar.org.uk/wp-content/uploads/work-star-banner.jpg);">
        <hr>
        <div class="container">
            <h1>Gallery</h1>
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