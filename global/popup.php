<div class="modal fade" id="successPopup" name="successPopup" tabindex="-1" role="dialog" aria-labelledby="successPopup"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">
                    <?php 
                if (isset($_SESSION['success']))
                echo 'SUCCESS!';
            ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
            <div class="col-md-4 col-6">
            <img src="<?php echo $_SESSION['pi'];?>" class="img img-fluid"></div>
            <div class="col-md-8 col-6">
                <div class="text-center"><i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                    <h4>

                        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
        }
        ?></h4>
                    <p>ยินดีต้อนรับ! <b><?php echo $_SESSION['fn'] . ' ' . $_SESSION ['ln']?></b></p>
                </div>
            </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="announcementPopup" name="announcementPopup" tabindex="-1" role="dialog" aria-labelledby="announcementPopup"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">ข่าวประชาสัมพันธ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img src="https://th.kku.ac.th/wp-content/uploads/2019/12/1C1DDE44-C01B-49A3-BAAF-F7DF73F93798.jpeg" class="img-fluid w-100 d-flex justify-content-center mb-3 z-depth-2">
            <div class="modal-text">
            <p>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง) เปิดรับสมัครนักเรียนเพื่อสอบเข้าศึกษาต่อในระดับชั้นมัธยมศึกษาปีที่ 4 ประจำปีการศึกษา 2563
            สามารถสมัครสอบผ่านระบบออนไลน์ที่เว็บไซต์ <a href="http://www.smd.kku.ac.th">www.smd.kku.ac.th</a> ระหว่างวันที่ 3 กุมภาพันธ์ – 3 มีนาคม 2563
            สอบถามรายละเอียดเพิ่มเติม โทร.<a href="tel:091-056-7871">091-056-7871</a></p>
            </div>
            </div>
            
            <!--div class="modal-footer">
                <a href="#" target="_blank" class="btn btn-warning">สมัครเข้าศึกษา</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div-->
        </div>
    </div>
</div>