<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <script>
        function fixAspect(img) {
            var $img = $(img),
                width = $img.width(),
                height = $img.height(),
                tallAndNarrow = width / height < 1;
            if (tallAndNarrow) {
                $img.addClass('tallAndNarrow');
            }
            $img.addClass('loaded');
        }
    </script>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php'; ?>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark navbar-normal">
        <?php include '../global/navbar.php';?>
    </nav>

    <div class="container">

        <hr>
        <div class="row">
            <div class="col-12">
                <h1>พลภณ สุนทรภาส</h1>
                <h5>Palapon Soontornpas</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="media">
                    <div class="circle">
                        <img src="https://tcas.pondja.com/31959055_1480846662024353_4037302681675497472_n.jpg" alt="Profile" onload="fixAspect(this);">
                    </div>
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
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="container justify-content-center">
                            <center>
                                <h1>ลงทะเบียนวิชาเลือก</h1>
                            </center>
                            <div class="table-responsive text-center">
                                <table class="table">
                                    <thead>
                                        <th><b>รหัสวิชา</b></th>
                                        <th><b>ชื่อวิชา</b></th>
                                        <th><b>กลุ่มสาระ</b></th>
                                        <th><b>ผู้สอน</b></th>
                                        <th><b>หน่วยกิต</b></th>
                                        <th><b>เปิดรับ</b></th>
                                        <th><b>สถานะ</b></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ส10101</td>
                                            <td>โสตทัศนูปกรณ์</td>
                                            <td>โสตทัศนูปกรณ์</td>
                                            <td>นายธีรศักดิ์ บาลชล</td>
                                            <td>1.0</td>
                                            <td>6</td>
                                            <td>เต็ม</td>
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
                                <a href="#" class="btn btn-secondary"><span class="oi" data-glyph="print"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <footer style="background-color: rgba(0, 0 , 0, 0.8);">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-12">
                    <h4 style="color: white">โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p style="color: white">เกี่ยวกับ</p>
                    <ul>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data09.png">ประวัติโรงเรียน</a></li>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data010.png">ปรัชญา</a></li>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data08.png">วิสัยทัศน์ พันธกิจ</a></li>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data06.png">เป้าหมายเชิงกลยุทธ์</a></li>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data07.png">คุณลักษณะอันพึงประสงค์</a></li>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-55/data12.png">คณะกรรมการประจำโรงเรียน</a></li>
                        <li><a href="../load.php?img=http://smd-s.kku.ac.th/home/images/smd-58/managementstructure57.jpg">โครงสร้างการบริหาร</a></li>
                        <li><a href="#">ทำเนียบผู้บริหาร</a></li>
                        <li><a href="#">คณะผู้บริหาร</a></li>
                        <li><a href="#">บุคลากร</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p style="color: white">หน่วยงาน</p>
                    <ul>
                        <li><a style="color: white" href="#"> งานแผนและประกันคุณภาพ </a></li>
                        <li><a style="color: white" href="#"> งานแนะแนว </a></li>
                        <li><a style="color: white" href="#"> งานทะเบียน </a></li>
                        <li><a style="color: white" href="#"> งานพัฒนาบุคลิกภาพ </a></li>
                        <li><a style="color: white" href="#"> งานห้องสมุด </a></li>
                        <li><a style="color: white" href="#"> ชมรมผู้ปกครองและครู </a></li>
                    </ul>

                </div>
                <div class="col-md-4">
                    <p style="color: white">ปฏิทิน</p>
                    <ul>
                        <li><a style="color: white" href="#"> ปฏิทินโรงเรียน </a></li>
                        <li><a style="color: white" href="../calendar.html"> ตารางเรียน </a></li>
                        <li><a style="color: white" href="#"> ตารางสอบ </a></li>
                    </ul>
                    <a style="color: white" href="../forum.html"> SMD Forum </a></li>
                    <br><a style="color: white" href="#"> SMD Shop </a></li>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
    <!-- SCRIPT THAT ADD FROM MDBootstrap-->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- END HERE -->
</body>

</html>