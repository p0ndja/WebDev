<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include'../global/head.php'?>
</head>

<body>
    <?php include'../global/login.php'?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top sticky" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="content"></div>
    <div class="container">
        <a class="btn z-depth-1 text-white disabled" href="#"
            style="background-color: #db6c24;">ประกาศจากทางโรงเรียน</a>
        <a class="btn z-depth-1 text-white" href="#" style="background-color: #db6c24;">SMD Community</a>
        <a class="btn z-depth-1 text-white" href="#" style="background-color: #db6c24;">Alumni Community</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered" style="background-color: white">
                <thead class="table table-sm thead-dark">
                    <tr>
                        <th scope="col" style="width: 53%">
                            <center>หัวข้อ</center>
                        </th>
                        <th scope="col" style="width: 12%">
                            <center>ประเภท</center>
                        </th>
                        <th scope="col" style="width: 12%">
                            <center>ผู้โพสต์</center>
                        </th>
                        <th scope="col" style="width: 23%">
                            <center>ข้อความล่าสุด</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-warning" style="cursor: pointer;" onclick="window.location='./post.php';">
                        <td>
                            <span class="badge badge-danger z-depth-0"><span class="oi" data-glyph="pin"></span></span>
                            รับสมัครผู้ช่วยพัฒนาเว็บไซด์
                            <span class="badge badge-success z-depth-0">รับสมัครงาน</span>
                            </span><br>26/10/2562</td>
                        <td>
                            <center>รับสมัครงาน</center>
                        </td>
                        <td>
                            <center>Admin</center>
                        </td>
                        <td>
                            <center>PondJa<br>26/10/2562</center>
                        </td>
                    </tr>
                    <tr class="table-pointer" style="cursor: not-allowed;" onclick="window.location='#';">
                        <td>มันดูดี~ ที่สุดเลยเว้ยแก~ <span
                                class="badge badge-primary z-depth-0">คำสั่ง</span><br>26/10/2562</td>
                        <td>
                            <center>ทั่วไป</center>
                        </td>
                        <td>
                            <center>Guest</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
                    <tr class="table-pointer" style="cursor: not-allowed;" onclick="window.location='#';">
                        <td>คำสั่ง คสช. ที่ 1/2562 <span
                                class="badge badge-secondary z-depth-0">คำสั่ง</span><br>26/10/2562</td>
                        <td>
                            <center>คำสั่ง</center>
                        </td>
                        <td>
                            <center>Admin</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
                    <tr class="table-pointer" style="cursor: not-allowed;" onclick="window.location='#';">
                        <td>มันดูดี~ ที่สุดเลยเว้ยแก~ <span
                                class="badge badge-primary z-depth-0">ทั่วไป</span><br>26/10/2562</td>
                        <td>
                            <center>ทั่วไป</center>
                        </td>
                        <td>
                            <center>Guest</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
                    <tr class="table-pointer" style="cursor: not-allowed;" onclick="window.location='#';">
                        <td>ว้าวววววววววววววววว <span class="badge badge-primary z-depth-0">ทั่วไป</span><br>26/10/2562
                        </td>
                        <td>
                            <center>ทั่วไป</center>
                        </td>
                        <td>
                            <center>Guest</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    <?php include'../global/footer.php'?>

</body>

</html>