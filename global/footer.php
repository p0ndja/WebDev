<footer style="background-color: rgba(0, 0 , 0, 0.8);">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12">
                <h4 style="color: white">โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p style="color: white">เกี่ยวกับ</p>
                <ul>
                    <li style="color: #ff6c00"><a href="../news/?news=20" style="color: white">ประวัติโรงเรียน</a></li>
                    <li style="color: #ff6c00"><a href="../news/?news=21" style="color: white">ปรัชญา</a></li>
                    <li style="color: #ff6c00"><a href="../news/?news=22" style="color: white">วิสัยทัศน์ พันธกิจ</a>
                    <li style="color: #ff6c00"><a href="../news/?news=23" style="color: white">เป้าหมายเชิงกลยุทธ์</a>
                    </li>
                    <li style="color: #ff6c00"><a href="../news/?news=24"
                            style="color: white">คุณลักษณะอันพึงประสงค์</a></li>
                    <li style="color: #ff6c00"><a href="../news/?news=25"
                            style="color: white">คณะกรรมการประจำโรงเรียน</a></li>
                    <li style="color: #ff6c00"><a href="../news/?news=26" style="color: white">โครงสร้างการบริหาร</a>
                    </li>
                    <li style="color: #ff6c00"><a href="../news/?news=29" style="color: white">ทำเนียบผู้บริหาร</a></li>
                    <li style="color: #ff6c00"><a href="../news/?news=32" style="color: white">คณะผู้บริหาร</a></li>
                    <li style="color: #ff6c00"><a href="../news/?news=37" style="color: white">บุคลากร</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <p style="color: white">หน่วยงาน</p>
                <ul>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">
                            งานแผนและประกันคุณภาพ</a></li>
                    <li style="color: #ff6c00"><a style="color: white"
                            href="https://www.admissionpremium.com/gis/KKU/login"> งานแนะแนว </a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled"> งานทะเบียน </a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled"> งานพัฒนาบุคลิกภาพ </a>
                    </li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled"> งานห้องสมุด </a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">
                            ชมรมผู้ปกครองและครู</a></li>
                </ul>
                <a style="color: white" href="#" class="disabled"> เอกสารประกอบการสอน </a></li>
            </div>
            <div class="col-md-3">
                <p style="color: white">ปฏิทิน</p>
                <ul>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled"> ปฏิทินโรงเรียน </a>
                    </li>
                    <li style="color: #ff6c00"><a style="color: white" href="../calendar">
                            ตารางเรียน</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="https://www.facebook.com/SMD.KKU/posts/2526062130856857"> ตารางสอบ </a></li>
                </ul>
                <a style="color: white" href="../news"> ข่าวสาร </a>
                <br><a style="color: white" href="../forum"> SMD Forum </a>
                <br><a style="color: white" href="#" class="disabled"> SMD Shop </a>
            </div>
            <div class="col-md-3 justify-content-center">
            <div class="d-block d-md-none mb-1"></div>
                    <a href="https://www.web-stat.com">
                        <img alt="Web-Stat web statistics" src="https://wts.one/6s/3/1941813.gif">
                    </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <center>
                    <h6 style="color: white;">Copyright 2019 - 2020 &copy; The demonstration school of Khon Kaen
                        University (Mo Din Daeng). All right reserved<h6>
                            <h6 style="color: white;">Developed by PondJaᵀᴴ & ˢᵖᵉᶜᵗᵉʳRisaka —
                                <?php include 'config.php'; if (isset($patch)) echo $patch;?></h6>
                </center>
            </div>
        </div>
    </div>
</footer>


<?php if(ISSET($snow_effect) && $snow_effect) { ?>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/h5ab-snow-flurry.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(document).snowFlurry({
            maxSize: 5,
            numberOfFlakes: 50,
            minSpeed: 10,
            maxSpeed: 15,
            color: '#fff',
            timeout: 0
        });
    });
</script>

<?php } ?>

<script type="text/javascript">
    $(function () {
        $('.summernote').summernote({
            height: 200,
        });
        // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>
<?php
        mysqli_close($conn);
        if ($close) header("Location: ../extra/close.php");
    ?>