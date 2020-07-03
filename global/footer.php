<footer class="footer" id="footer">
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
                    <li style="color: #ff6c00"><a style="color: white" href="../category/qa-1">งานแผนและประกันคุณภาพ</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="../category/advice-1">งานแนะแนว</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="../category/reg-1">งานทะเบียน</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="../category/person-1">งานพัฒนาบุคลิกภาพ</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="../category/lib-1">งานห้องสมุด</a></li>
                    <li style="color: #ff6c00"><a style="color: white" href="../category/pta-1">ชมรมผู้ปกครองและครู</a></li>
                </ul>
                <a style="color: white" href="../category/subject-1"> เอกสารประกอบการสอน </a></li>
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
                <a class="btn-floating btn-sm btn-info" href="https://www.facebook.com/SMD.KKU" target="_blank"><i class="fab fa-facebook"></i></a><a href="https://www.facebook.com/SMD.KKU" target="_blank" style="color: white">SMD.KKU</a><br>
                <a class="btn-floating btn-sm blue" href="https://www.facebook.com/wearesmd" target="_blank"><i class="fab fa-facebook"></i></a><a href="https://www.facebook.com/wearesmd" target="_blank" style="color: white">WE ARE SMD</a><br>
                <a class="btn-floating btn-sm pink" href="https://www.instagram.com/wearesmd" target="_blank"><i class="fab fa-instagram"></i></a><a href="https://www.instagram.com/wearesmd" target="_blank" style="color: white">WE ARE SMD</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                <a href="https://www.web-stat.com">
                    <img alt="Web-Stat web statistics" src="https://wts.one/6s/3/1941813.gif" class="mb-1">
                </a>
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
        $('.btn-floating').unbind('click');
        $('.fixed-action-btn').unbind('click');
    });

    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });

    if ($(document.body).height() < $(window).height()) {
        $('#footer').attr('style', 'position: fixed!important; bottom: 0px;');
    }

    $('.carouselCourse').on('slide.bs.carousel', function(e) {
        $('#pNormalCollapse').collapse('hide');
        $('#pJEMSCollapse').collapse('hide');
        $('#sNormalCollapse').collapse('hide');
        $('#sSEMSCollapse').collapse('hide');
        $('#sSCiUSCollapse').collapse('hide');
    });

    $('.carouselsmoothanimated').on('slide.bs.carousel', function(e) {
        $(this).find('.carousel-inner').animate({
            height: $(e.relatedTarget).height()
        }, 500);
    });
</script>

<div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0&appId=2529205720433288&autoLogAppEvents=1" nonce="2UGIjGvo"></script>

<?php $_SESSION['isDarkProfile'] = 0; ?>
<?php isWebsiteClose($conn); ?>
<?php mysqli_close($conn); ?>