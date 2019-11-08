<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- KANIT FONT -->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif !important;
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
                background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
            }

            header video {
                display: none;
            }
        }

        @-webkit-keyframes blinker {
            from {
                opacity: 1.0;
            }

            to {
                opacity: 0.0;
            }
        }

        .blink {
            text-decoration: blink;
            -webkit-animation-name: blinker;
            -webkit-animation-duration: 0.6s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-timing-function: ease-in-out;
            -webkit-animation-direction: alternate;
        }
    </style>
    <!-- Must be same here -->
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <title>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
    <link rel="image_src" href="https://tcas.pondja.com/smdlogo.png" />
    <meta property="og:image" content="https://tcas.pondja.com/smdlogo.png" />
    <meta property="og:title" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
    <meta property="og:description"
        content="123 มหาวิทยาลัยขอนแก่น โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ถนนมิตรภาพ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40002 โทรศัพท์ / โทรสาร 043202044" />
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <!-- For Callout -->
    <link href="https://v4-alpha.getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    <!-- Icon :: See More at https://useiconic.com/open/ -->
    <link href="../icon/font/css/open-iconic.css" rel="stylesheet">
    <!-- Icon :: See More at https://fontawesome.com/icons?d=gallery -->
    <script src="https://kit.fontawesome.com/7454809de8.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!---->

</head>

<body style="background-color: #ededed">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #db6c24;">
        <a class="navbar-brand" href="./#"><span class="badge badge-light"><img
                    src="http://www.kmutt.ac.th/jif/enett2015/images/logo/KKU.gif" width=20></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./#">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> เกี่ยวกับ </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data09.png">ประวัติโรงเรียน</a>
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data010.png">ปรัชญา</a>
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data08.png">วิสัยทัศน์
                            พันธกิจ</a>
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data06.png">เป้าหมายเชิงกลยุทธ์</a>
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data07.png">คุณลักษณะอันพึงประสงค์</a>
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data12.png">คณะกรรมการประจำโรงเรียน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"
                            href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-58/managementstructure57.jpg">โครงสร้างการบริหาร</a>
                        <a class="dropdown-item" href="#">ทำเนียบผู้บริหาร</a>
                        <a class="dropdown-item" href="#">คณะผู้บริหาร</a>
                        <a class="dropdown-item" href="#">บุคลากร</a>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        หน่วยงาน </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"> งานแผนและประกันคุณภาพ </a>
                        <a class="dropdown-item" href="#"> งานแนะแนว </a>
                        <a class="dropdown-item" href="#"> งานทะเบียน </a>
                        <a class="dropdown-item" href="#"> งานพัฒนาบุคลิกภาพ </a>
                        <a class="dropdown-item" href="#"> งานห้องสมุด </a>
                        <a class="dropdown-item" href="#"> ชมรมผู้ปกครองและครู </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"> เอกสารประกอบการสอน </a>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ปฏิทิน </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"> ปฏิทินโรงเรียน </a>
                        <a class="dropdown-item" href="#"> ตารางเรียน </a>
                        <a class="dropdown-item" href="#"> ตารางสอบ </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SMD Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SMD Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ถ่ายทอดสด <sup class="notifi"><span
                                class="badge badge-danger badge-pill d-none d-lg-inline-block blink">LIVE <span
                                    class="oi" data-glyph="video"></span></span></a></sup>
                </li>
            </ul>
            <!-- Search form -->
            <right>
                <form method="GET" class="form-inline mr-auto align-right">
                    <div class="md-form my-0">
                        <input method="GET" class="form-control" type="text" placeholder="Search" aria-label="Search"
                            id="test">
                    </div>
                </form>
            </right>
            <a class="btn btn-dark" href="./login">Login</a>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row text-center">
            <?php
                echo '<img src="' . $_GET['img'] . '" width="100%" height="100%">';
            ?>
        </div>
    </div>
    </div>
    <br>
    <hr>
    <?php include './global/footer.php' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap-4.3.1.js"></script>

    <!-- SCRIPT THAT ADD FROM MDBootstrap-->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="./js/mdb.min.js"></script>
    <!-- END HERE -->
</body>

</html>