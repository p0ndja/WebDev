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
            padding: 0;
        }

        .wrapper .column .inner {
            background-size: cover;
            background-position: center;
        }

        .wrapper .column:nth-child(1) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/75474135_980070635669586_1403665681076977664_o.jpg?_nc_cat=109&_nc_oc=AQmI57slAejSEfqhFzKI-bp35m6TGKCS8TRqcOLKQLoFT5fEksZJ4VciM3HSkl8tlDI&_nc_ht=scontent.fkkc2-1.fna&oh=df2198ae3d2b9b029540958ce30a0177&oe=5E4FDC42');
        }

        .wrapper .column:nth-child(2) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/75204386_980045625672087_3843565490161057792_o.jpg?_nc_cat=107&_nc_oc=AQnY5B8QF-er5laFNoX4qp930uxWGdTQmDpfxx9SsEhCvbgaOjoNhGkg6RoqSJMpyio&_nc_ht=scontent.fkkc2-1.fna&oh=7e9d938c0e7fd963d7837f9c964979c1&oe=5E4B4525');
        }

        .wrapper .column:nth-child(3) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/74234644_980045689005414_1081478683597733888_o.jpg?_nc_cat=106&_nc_oc=AQmsx_rmsTXQ9Nj4QkHjHxQ_pXj7z1savGoPoybzXtZQ9qYKfLNIbfZt9dcnoudOytM&_nc_ht=scontent.fkkc2-1.fna&oh=80958959628b0572874b108386bcd65b&oe=5E4822AA');
        }

        .wrapper .column:nth-child(4) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/73097183_980051145671535_4160425963689082880_o.jpg?_nc_cat=108&_nc_oc=AQkvCIP4mmxoJTROupSVDC4pyrqbwY1iGBPW8QU9ONadZnhPBsJKQI-IIwKLIMSfYRE&_nc_ht=scontent.fkkc2-1.fna&oh=f82f3f02a6e132f87fea1f91ed5f84bc&oe=5E44F9E6');
        }

        .wrapper .column:nth-child(5) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/73482696_980045815672068_835440468434092032_o.jpg?_nc_cat=102&_nc_oc=AQnEdBnpgTxU7Vpk3dA0rxEIzRyHwTVIlgaLsoIqpWEWIPx3JNYAyYeY8CZt4jdP49g&_nc_ht=scontent.fkkc2-1.fna&oh=437ff38fd5cd163d9978cdf207b7afde&oe=5E518345');
        }

        .wrapper .column:nth-child(6) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/73425135_980186435658006_1319608210407030784_o.jpg?_nc_cat=106&_nc_oc=AQmldPOa-zfsGVJN6G55ePfsKVpKp6NU72x0fI5zKTGgnFwk30R5i239elSezHz9KaE&_nc_ht=scontent.fkkc2-1.fna&oh=7ae06d540620ce0cb40948cb0674ef33&oe=5E652B3F');
        }

        .wrapper .column:nth-child(7) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/74419887_980182215658428_7737382548656881664_o.jpg?_nc_cat=110&_nc_oc=AQl0oEvDoiVy-MJbITqrWZiIktwv3QARipamIGY322Xe9kqNEDMhCGuHVIHwKLmYR8A&_nc_ht=scontent.fkkc2-1.fna&oh=a638647700572d512b1b364c81173eb1&oe=5E4DB3E0');
        }

        .wrapper .column:nth-child(8) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/75246813_980170685659581_2695018577248911360_o.jpg?_nc_cat=102&_nc_oc=AQkIg8ylZxB-VFCc9-RWjqZgKX_APw8CYkFwqUj-Cihoyck_BRUD_GKnjw76boUjNRI&_nc_ht=scontent.fkkc2-1.fna&oh=5effc202fc452204b10bcebcc5dc4091&oe=5E458F7E');
        }

        .wrapper .column:nth-child(9) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/74353244_980171055659544_3391798513317707776_o.jpg?_nc_cat=111&_nc_oc=AQk631TpFAIudJPaQMsqXlzRrEuFDQ0NAgdbeDRqPN6ZFEMESOrGNXsnCeizvPvWOLM&_nc_ht=scontent.fkkc2-1.fna&oh=172c8e07838c88c1951e577659165402&oe=5E61508D');
        }

        .wrapper .column:nth-child(10) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/74437574_2365099943619744_3925936224094650368_o.jpg?_nc_cat=104&_nc_oc=AQnxtaJDtTPbFuhdSsxq0BTnhvopKF94Z1mXUlt_n3ybO0eBqKOaNbbht2JvkCVY1m0&_nc_ht=scontent.fkkc2-1.fna&oh=c365babca09f4d8733007a45d5c72ab4&oe=5E60C0DE');
        }

        .wrapper .column:nth-child(11) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/s960x960/74599515_2365070813622657_5056991960003248128_o.jpg?_nc_cat=105&_nc_oc=AQkDwdjjOsFtoOL8YdSOH7C6keqmHr5o3RIHLMvlsvL-D7NtKpEy2eXdnm5pEf8HGXY&_nc_ht=scontent.fkkc2-1.fna&oh=0e303dadd5536df5b9224e53bf1ff355&oe=5E5BE650');
        }

        .wrapper .column:nth-child(12) .inner {
            background-image: url('https://scontent.fkkc2-1.fna.fbcdn.net/v/t1.0-9/73498078_2364964120299993_1412030022511755264_o.jpg?_nc_cat=101&_nc_oc=AQnkS1qSzAfh8NeS1hbBKzyXS2UGDXEs48q9b2D-ZW65Z7Brw_uB6eEIBNlfWg5f_Js&_nc_ht=scontent.fkkc2-1.fna&oh=b9728d20bae5f328daa24360bdc9cb2f&oe=5E45ACA7');
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
            <div class="col-12 col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/1300x400.png" width="1200" height="400" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>
                                    <p class="text-dark">First slide label</p>
                                </h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/1300x400.png" width="1200" height="400" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/1300x400.png" width="1200" height="400" class="d-block w-100" alt="...">
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
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="view overlay zoom">
                        <img src="https://www.uppic.org/images/2019/11/08/emsp.jpg" class="img-fluid"
                            alt="smaple image">
                        <div class="mask flex-center rgba-black-slight">

                        </div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <a href="#">
                <div class="view overlay zoom">
                    <img src="https://www.uppic.org/images/2019/11/08/normal.jpg" class="img-fluid" alt="smaple image">
                    <div class="mask flex-center rgba-black-slight">
                    </div>
            </a>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <a href="#">
            <div class="view overlay zoom">
                <img src="https://www.uppic.org/images/2019/11/08/scius.jpg" class="img-fluid" alt="smaple image">
                <div class="mask flex-center rgba-black-slight">
                    <p class="white-text">Zoom effect</p>
                </div>
        </a>
    </div>
    </div>
    </div>
    <hr>
    </div>
    <div class="container-fluid fluid-backgroundd"
        style="background-image: url('https://storage.pondja.com/bg.jpg'); background-repeat: no-repeat; background-size: 100%;">
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