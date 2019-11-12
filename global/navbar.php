        <a class="navbar-brand" href="../home"><span class="badge badge-light"><img
                    src="http://www.kmutt.ac.th/jif/enett2015/images/logo/KKU.gif" width="20" alt="SMD"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../home">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> เกี่ยวกับ </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-55/data09.png">ประวัติโรงเรียน</a>
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-55/data010.png">ปรัชญา</a>
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-55/data08.png">วิสัยทัศน์
                            พันธกิจ</a>
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-55/data06.png">เป้าหมายเชิงกลยุทธ์</a>
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-55/data07.png">คุณลักษณะอันพึงประสงค์</a>
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-55/data12.png">คณะกรรมการประจำโรงเรียน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"
                            href="../temp_load/?img=http://smd-s.kku.ac.th/home/images/smd-58/managementstructure57.jpg">โครงสร้างการบริหาร</a>
                        <a class="dropdown-item" href="#">ทำเนียบผู้บริหาร</a>
                        <a class="dropdown-item" href="#">คณะผู้บริหาร</a>
                        <a class="dropdown-item" href="#">บุคลากร</a>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ปฏิทิน </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"> ปฏิทินโรงเรียน </a>
                        <a class="dropdown-item" href="../calendar"> ตารางเรียน </a>
                        <a class="dropdown-item" href="#"> ตารางสอบ </a>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="./#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> อื่น ๆ </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../forum">SMD Forum</a>
                        <a class="dropdown-item" href="#">SMD Shop</a>
                        <a class="dropdown-item" href="#">ถ่ายทอดสด <sup class="notifi"><span
                                    class="badge badge-danger badge-pill d-none d-lg-inline-block blink">LIVE <span
                                        class="oi" data-glyph="video"></span></span></sup></a>
                    </div>
                </li>
                <a href="https://storage.pondja.com/.show.php" target="_blank" class="btn btn-warning"><i>ฝากไฟล์</i></a>
                <a href="https://remotemysql.com/phpmyadmin/" target="_blank" class="btn btn-info"><i>MySQL</i></a>

            </ul>
            <right>
                <form action="../profile/" method="GET" class="form-inline mr-auto align-right">
                    <div class="md-form my-0">
                        <input method="GET" class="form-control" type="text" placeholder="Search" aria-label="Search"
                            id="search" name="search" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
                    </div>
                </form>
            </right>
            <?php
                if (isset($_SESSION['fn'])) { ?>
                        <ul class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://d3ipks40p8ekbx.cloudfront.net/dam/jcr:3a4e5787-d665-4331-bfa2-76dd0c006c1b/user_icon.png" width="20"> <?php echo $_SESSION['fn'] . ' ' . $_SESSION['ln']; ?></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../profile"> ข้อมูลส่วนตัว <span class="oi" data-glyph="person"></span></a>
                                    <a class="dropdown-item" href="#"> ลงทะเบียนวิชาเลือก <span class="oi" data-glyph="file"></span></a>
                                    <a class="dropdown-item" href="#"> การเช็คชื่อ <span class="oi" data-glyph="task"></span></a>
                                    <a class="dropdown-item" href="#"> ผลการเรียน (SGS) <span class="oi" data-glyph="browser"></span></a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" style="color: red" href="../global/logout.php">ออกจากระบบ <span class="oi" data-glyph="account-logout"></span></a>
                                </div>
                            </li>
                        </ul>;
                        <?php
                } else { ?>
                    <a href="" class="btn btn-dark" data-toggle="modal" data-target="#login">Login</a>;
                    <?php
                }
            ?>
        </div>