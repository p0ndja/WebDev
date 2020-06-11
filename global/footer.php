<footer class="footer" id="footer" style="background-color: rgba(12, 12, 12, 0.95); flex-shrink: 0;">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12">
                <h4 style="color: white"><img src="../static/images/logo/logokku_t_w_b.png" height="32">
                    โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</h4>
                <hr>
            </div>
            <div class="col-md-3">
                <h5 style="color: white">เกี่ยวกับ</h5>
                <ul>
                    <li style="color: #ff6c00"><a href="../post/20" style="color: white">ประวัติโรงเรียน</a></li>
                    <li style="color: #ff6c00"><a href="../post/22" style="color: white">เกี่ยวกับโรงเรียน</a></li>
                    <li style="color: #ff6c00"><a href="../post/25" style="color: white">คณะกรรมการประจำโรงเรียน</a></li>
                    <li style="color: #ff6c00"><a href="../post/26" style="color: white">โครงสร้างการบริหาร</a></li>
                    <li style="color: #ff6c00"><a href="../post/29" style="color: white">ทำเนียบผู้บริหาร</a></li>
                    <li style="color: #ff6c00"><a href="../post/32" style="color: white">คณะผู้บริหาร</a></li>
                    <li style="color: #ff6c00"><a href="../post/37" style="color: white">บุคลากร</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 style="color: white">หน่วยงาน</h5>
                <ul>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">งานแผนและประกันคุณภาพ</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="https://www.admissionpremium.com/gis/KKU/login">งานแนะแนว</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">งานทะเบียน</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">งานพัฒนาบุคลิกภาพ</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">งานห้องสมุด</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled">ชมรมผู้ปกครองและครู</a></li>
                </ul>
                <a style="color: white" href="../pages/subject.php"> เอกสารประกอบการสอน </a></li>
            </div>
            <div class="col-md-3">
                <h5 style="color: white">ปฏิทิน</h5>
                <ul>
                    <li style="color: #ff6c00"><a style="color: white" href="#" class="disabled"> ปฏิทินโรงเรียน </a>
                    </li>
                    <li style="color: #ff6c00"><a style="color: white" href="../calendar">
                            ตารางเรียน</a></li>
                    <li style="color: #ff6c00"><a style="color: white"
                            href="https://www.facebook.com/SMD.KKU/posts/2526062130856857"> ตารางสอบ </a></li>
                </ul>
                <a style="color: white" href="../category/news-1"> ข่าวสาร </a>
                <br><a style="color: white" href="../forum"> SMD Forum </a>
                <br><a style="color: white" href="#" class="disabled"> SMD Shop </a>
            </div>
            <div class="col-md-3">
                <div class="d-block d-md-none mb-1"></div>
                <a href="https://www.web-stat.com">
                    <img alt="Web-Stat web statistics" src="https://wts.one/6s/3/1941813.gif">
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                <h6 style="color: white;">Copyright 2019 - 2020 &copy; The demonstration school of Khon Kaen University (Mo Din Daeng). All Right Reserved.</h6>
                <h6 style="color: white;">Made with ❤ by <a href="../pages/about.php">PondJaᵀᴴ & ˢᵖᵉᶜᵗᵉʳRisaka</a></h6>
            </div>
        </div>
    </div>
</footer>


<?php if(getConfig('global_snowEffect', 'bool', $conn)) { ?>
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
    // Tooltips Initialization
    $(document).ready(function () {
        $('.mdb-select').materialSelect();
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
</script>
<?php mysqli_close($conn); ?>