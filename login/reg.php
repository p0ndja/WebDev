

<html lang="th">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Kanit&amp;display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif !important;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        
    </style>

    <!-- Must be same here -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>Computer Mvsk - สมัครสมาชิก</title>
    <meta property="og:title" content="เว็บไซต์กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี สาขาคอมพิวเตอร์ โรงเรียนมหาวชิราวุธ จังหวัดสงขลา">
    <meta property="og:description" content="เว็บไซต์กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี สาขาคอมพิวเตอร์ โรงเรียนมหาวชิราวุธ จังหวัดสงขลา">
    <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
    <link href="https://v4-alpha.getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
    <script src="https://kit.fontawesome.com/7454809de8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/mdb.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

<?php 
    
    session_start();
    $conn = mysqli_connect("remotemysql.com","9SksUB0FHK","DnvUqpwKb0", "9SksUB0FHK", "3306");
    if (!$conn) {
        die("Failed connection to database ".mysql_error($conn));
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpass = $_POST['conpassword'];
        $email = $_POST['email'];
        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['username'] === $username) {
            $_SESSION['error'] = "มีผู้ใช้งานชื่อนี้แล้ว โปรดลองใหม่";
        } else if ($password != $confirmpass) {
            $_SESSION['error'] = "รหัสผ่านผ่านไม่เหมือนกัน โปรดลองใหม่";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            $_SESSION['error'] = "กรุณากรอกอีเมลให้ถูกต้อง";
        } else {
            $passwordenc = md5($password);
            $query = "INSERT INTO user (username, password, email) VALUE ('$username', '$passwordenc', '$email')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['success'] = "สมัครเสร็จแล้ว ลองล็อกอินเข้าใช้งานดูครับ";
            } 
        }

    }

?>    
<body style="background-color: #ededed" data-gr-c-s-loaded="true">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #336699;">
        <a class="navbar-brand" href="#"><span class="badge badge-light"><img src="../img/logo.jpg" width="20"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="../">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <a class="btn btn-light" href="../login">เข้าสู่ระบบ</a>
            <a class="btn btn-light" href="../register">สมัครสมาชิก</a>
        </div>
    </nav>
    <div class="container">
        <hr>
            <div class="card mb-3" style="max-width: 900px;">
                 <?php
                if (isset($_SESSION['success'])) {
					?>
					<div class="alert alert-success" role="alert">
						<i class="fas fa-info-circle"></i> <b>สมัครเสร็จสิ้น</b>
						<hr class="message-inner-separator"><?php echo $_SESSION['success']; ?></hr>
					</div>
					<?php
                }
                if (isset($_SESSION['error'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-info-circle"></i> <b>เกิดข้อผิดผลาด</b>
                        <hr class="message-inner-separator"><?php echo $_SESSION['error']; ?></hr>
                    </div>
                    <?php
                }
            ?>
                <div class="row no-gutters">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <label for="username">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน เช่น FewZa" required>
                            <p></p>
                            <label for="password">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน | ควรจะ 3 อักษรขึ้นไป" required>
                            <p></p>
                            <label for="password">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" name="conpassword" placeholder="พิมพ์รหัสผ่านอีกรอบ" required>
                            <p></p>
                            <label for="firstname">อีเมล</label>
                            <input type="text" class="form-control" name="email" placeholder="ตัวอย่าง | example@gmail.com" required>
                            <br>
                            <center><input type="submit" align="right" name="submit" class="btn btn-primary" value="Submit"></center>
                        </form>
                    </div>
                </div>
            </div>
        <hr>
    </div>
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Created by Cosgum.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    session_destroy();
}
?>