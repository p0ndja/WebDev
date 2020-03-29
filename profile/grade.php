<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <hr>
        <div class="row">
            <div class="col-12">
                <h1>พลภณ สุนทรภาส</h1>
                <h5>Palapon Soontornpas</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="media">
                        <img src="https://tcas.pondja.com/31959055_1480846662024353_4037302681675497472_n.jpg" alt="Profile" class="img-fluid rounded-circle">
                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                        <hr>
                        <div class="card">
                            <div class="card-body">

                                <strong>รหัสนักเรียน</strong> 604019<br>
                                <strong>ระดับชั้น</strong> ม.6<br>
                                <strong>ห้อง</strong> 1 (EMSP)<br>
                                <strong>เบอร์โทรศัพท์</strong> 0908508007<br>
                                <strong>อีเมล</strong>
                                <a href="mailto:palapon2545@gmail.com">palapon2545@gmail.com</a>

                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="container justify-content-center">
                            <center>
                                <h1>ผลการเรียน</h1>
                                <form class="form-inline justify-content-center">
                                    <div class="form-row text-center justify-content-center">
                                        <label for="term" class="col-form-label col-md-auto">ภาคเรียนที่ </label>
                                        <div class="align-items-center col-md-auto d-flex">
                                            <select class="form-control" id="term">
                                                            <option>1</option>
                                                            <option>2</option>
                                                          </select>
                                        </div>
                                        <label for="year" class="col-form-label col-md-auto">ปีการศึกษา </label>
                                        <div class=" align-items-center col-md-auto d-flex">
                                            <select class="form-control" id="year">
                                                        <option>2562</option>
                                                        <option>2561</option>
                                                        <option>2560</option>
                                                      </select>
                                        </div>
                                    </div>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="container justify-content-center">
                            <center>
                                <h1>ใบแจ้งผลการเรียน</h1>
                                <h5>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง) ระดับมัธยมศึกษาตอนปลาย</h5>
                            </center>
                            <div class="table-responsive text-center">
                                <table class="table">
                                    <thead>
                                        <th><b>รหัสวิชา</b></th>
                                        <th><b>ชื่อวิชา</b></th>
                                        <th><b>หน่วยกิต</b></th>
                                        <th><b>ระดับ</b></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ท33101</td>
                                            <td>ภาษาไทย 5</td>
                                            <td>1.0</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ท33202</td>
                                            <td>ภาษากับการเชื่อมโยง</td>
                                            <td>0.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ค33207</td>
                                            <td>คณิตศาสตร์ทั่วไป 3</td>
                                            <td>2.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>

                                            <td>ว33207</td>
                                            <td>ฟิสิกส์ประยุกต์ 4</td>
                                            <td>1.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ว33227</td>
                                            <td>เคมีประยุกต์ 4</td>
                                            <td>2.0</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ว33247</td>
                                            <td>ชีววิทยาประยุกต์ 4</td>
                                            <td>1.0</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>

                                            <td>ว30249</td>
                                            <td>สรีรวิทยา</td>
                                            <td>2.0</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ส33101</td>
                                            <td>สังคมศึกษา 5</td>
                                            <td>1.0</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ส30231</td>
                                            <td>หน้าที่พลเมือง 1</td>
                                            <td>1.0</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ส30205</td>
                                            <td>พุทธปรัชญา 1</td>
                                            <td>1.0</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>พ33101</td>
                                            <td>สุขศึกษาและพลศึกษา</td>
                                            <td>0.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ศ33101</td>
                                            <td>ศิลปะ 5</td>
                                            <td>0.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ง33101</td>
                                            <td>การงานอาชีพและเทคโนโลยี 5</td>
                                            <td>0.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>ญ33213</td>
                                            <td>เที่ยวเมืองอาทิตย์อุทัย</td>
                                            <td>0.5</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>อ33207</td>
                                            <td>ภาษาอังกฤษเพื่อการศึกษาต่อ</td>
                                            <td>2.5</td>
                                            <td>4</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>
</body>

</html>