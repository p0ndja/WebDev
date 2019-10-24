<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

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
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">

</head>

<body style="background-color: #ededed">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #db6c24;">
        <a class="navbar-brand" href="./#"><span class="badge badge-light"><img src="http://www.kmutt.ac.th/jif/enett2015/images/logo/KKU.gif" width=20></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./#">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> เกี่ยวกับ </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data09.png">ประวัติโรงเรียน</a>
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data010.png">ปรัชญา</a>
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data08.png">วิสัยทัศน์ พันธกิจ</a>
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data06.png">เป้าหมายเชิงกลยุทธ์</a>
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data07.png">คุณลักษณะอันพึงประสงค์</a>
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data12.png">คณะกรรมการประจำโรงเรียน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./load.php?img=http://smd-s.kku.ac.th/home/images/smd-58/managementstructure57.jpg">โครงสร้างการบริหาร</a>
                        <a class="dropdown-item" href="#">ทำเนียบผู้บริหาร</a>
                        <a class="dropdown-item" href="#">คณะผู้บริหาร</a>
                        <a class="dropdown-item" href="#">บุคลากร</a>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        หน่วยงาน </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"> งานแผนและประกันคุณภาพ </a>
                        <a class="dropdown-item" href="#"> งานแนะแนว </a>
                        <a class="dropdown-item" href="#"> งานทะเบียน </a>
                        <a class="dropdown-item" href="#"> งานพัฒนาบุคลิกภาพ </a>
                        <a class="dropdown-item" href="#"> งานห้องสมุด </a>
                        <a class="dropdown-item" href="#"> ชมรมผู้ปกครองและครู </a>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="nav-link" href="#">ถ่ายทอดสด <sup class="notifi"><span class="badge badge-danger badge-pill d-none d-lg-inline-block blink">LIVE <span class="oi" data-glyph="video"></span></span></a></sup>
                </li>
            </ul>
            <a class="btn btn-dark" href="./login">Login</a>
        </div>
    </nav>
    <br>
        <div class="container">
            <div class="row text-center">
            <?php
                $i = $_GET['img'];
                $s = $_GET['iframe'];
                $h = $_GET['iframe_height'];
                if ($i != null) echo '<img src="' . $i . '" width="100%" height="100%"';
                if ($s != null) echo '<iframe src="'. $s . '" width="100%" ';
                
                if ($s != null && $h != null) echo 'height="' . $h . '"></iframe>';
                else echo '></iframe>';
            ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <footer class="text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <p>Copyright 2019 © MyWebsite. By PondJa & Risaka .</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
</body>

</html>