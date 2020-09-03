<?php require('global/connect.php'); ?>

<?php   if(isset($_SESSION['isVisitedLandingPage'])) header("Location: ./home/");
        else     $_SESSION['isVisitedLandingPage'] = true;
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="static/images/logo/favicon.ico" type="image/x-icon">
    <link rel="icon" href="static/images/logo/favicon.ico" type="image/x-icon">
    <title>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
    <link rel="image_src" href="static/images/logo/smdlogo.png" />
    <meta property="og:image" content="static/images/logo/smdlogo.png" />
    <meta property="og:title" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
    <meta property="og:description" content="123 มหาวิทยาลัยขอนแก่น โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ถนนมิตรภาพ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40002 โทรศัพท์ / โทรสาร 043202044" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/bootstrap/bootstrap.min.css">
    <link href="static/css/mdb.min.css" rel="stylesheet">
    <link href="static/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7454809de8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!--SweetAlert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="static/js/1.16.0-popper.min.js"></script>
    <script src="static/js/jquery-3.5.1.min.js"></script>
    <script src="static/bootstrap/bootstrap.min.js"></script>
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
            opacity: 0;
            z-index: 1;
        }

        @media (pointer: coarse) and (hover: none) {
            header {
                background: url('static/images/element/landing.mp4') black no-repeat center center scroll;
            }

            header video {
                display: url('static/images/element/landing.mp4');
            }
        }
        .center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        body {
            background: url('static/images/background/bg_dark.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            color: white;
            font-family: 'Kanit', sans-serif;
        }
        html,
        body,
        header,
        .view {
            height: 100% !important;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" id="video">
            <source src="static/images/element/landing.mp4" type="video/mp4">
        </video>
        <div class="container h-100 d-none d-lg-block" id="container">
            <div class="d-flex h-100 text-center align-items-end">
                <div class="w-100 text-white">
                    <div class="animated fadeIn">
                        <div style="padding-bottom: 25px;">
                            <a class="btn btn-lg btn-outline-light" href="./home">เข้าสู่เว็บไซต์ | Enter Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <script>
    $( document ).ready(function() {      
        var is_mobile = false;

        if ($('#container').css('display') == 'none') 
            is_mobile = true;       
        

        if (is_mobile == true)
            window.location = "./home";
        
        document.getElementById("video").onended = function() {
            window.location = "./home";
        };
    });
    </script>
</body>
</html>