<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <!-- KANIT FONT -->
    <style>
        body {
            font-family: 'Kanit', sans-serif !important;
            background: url('https://storage.pondja.com/Bottom_texture-01.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>

    <!-- Must be same here -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>


<body>

    <?php 
    session_start();
    $conn = mysqli_connect("remotemysql.com","9SksUB0FHK","DnvUqpwKb0", "9SksUB0FHK", "3306");
    if (!$conn) {
        die("Failed connection to database ".mysql_error($conn));
    }
	 if (isset($_POST['username'])) {
		$username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$passwordenc'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$_SESSION['username'] = $row['username'];
			$_SESSION['rank'] = $row['userlevel'];
			$_SESSION['verify'] = $row['verify'];
			header("Location: ../");
		} else {
			$_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง โปรดลองใหม่อีกครั้ง";
		}
	} 
    ?>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #db6c24;">
        <a class="navbar-brand" href="#"><span class="badge badge-light"><img src="http://www.kmutt.ac.th/jif/enett2015/images/logo/KKU.gif" width="20"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../#">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> เกี่ยวกับ </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data09.png">ประวัติโรงเรียน</a>
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data010.png">ปรัชญา</a>
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data08.png">วิสัยทัศน์ พันธกิจ</a>
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data06.png">เป้าหมายเชิงกลยุทธ์</a>
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data07.png">คุณลักษณะอันพึงประสงค์</a>
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data12.png">คณะกรรมการประจำโรงเรียน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-58/managementstructure57.jpg">โครงสร้างการบริหาร</a>
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
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"> เอกสารประกอบการสอน </a>
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
        </div>
    </nav>
    <div class="container h-100 d-flex justify-content-center ">
        <div class="wrap-login100  my-auto">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form">
                <span class="login100-form-title">
						สำหรับนักเรียน
                    </span>
                    <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-info-circle"></i> <b>เกิดข้อผิดผลาด</b>
                        <hr class="message-inner-separator"><?php echo $_SESSION['error']; ?></hr>
                    </div>
                    <?php
                }
				?>

                <div class="wrap-input100 validate-input" data-validate="กรุณาใส่รหัสนักเรียน / Username">
                    <input class="input100" type="text" name="username" placeholder="รหัสนักเรียน / Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="กรุณาใส่รหัสบัตรประชาชน / Password">
                    <input class="input100" type="text" name="password" placeholder="รหัสบัตรประชาชน / Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
							Login
						</button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="#">
							Username / Password?
						</a>
                </div>

                <div class="text-center">
                    <a class="txt2" href="../profile">
							dummy_text
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
                </div>
            </form>
        </div>
    </div>
    <footer style="background-color: rgba(0, 0 , 0, 0.8);">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-2">
                    <img src="https://tcas.pondja.com/smdlogo.png" width=100%>
                </div>
                <div class="col-10">
                    <h4 style="color: white">โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</h4>
                    <hr>
                    <p style="color: white">123 มหาวิทยาลัยขอนแก่น โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)<br>ถนนมิตรภาพ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40002<br>โทรศัพท์ / โทรสาร <a href="tel:+6643202044" style="color: white">043202044</a></p>
                    <a href="./sitemap.html" style="color:tomato">Sitemap</a>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <center>
                        <p style="color: white">Copyright 2019 © MyWebsite. By PondJa & Risaka .</center>
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>