    <div class="modal fade" name="login" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 grey lighten-2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active black-text" data-toggle="tab" href="#panel7" role="tab">
                                <i class="fas fa-user mr-1"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link black-text" data-toggle="tab" href="#panel8" role="tab">
                                <i class="fas fa-user-plus mr-1"></i> Register</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <form method="post" action="../global/save.php" enctype="multipart/form-data">
                                <!--Body-->
                                <div class="modal-body mb-1">



                                    <?php
                                    if (isset($_SESSION['error'])) {
                                        echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>';
                                    }
                                ?>

                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="login_username" id="login_username"
                                            class="form-control form-control-sm validate" required>
                                        <label for="login_username">Username</label>
                                    </div>
                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="password" name="login_password" id="login_password"
                                            class="form-control form-control-sm validate" required>
                                        <label for="login_password">Password</label>
                                    </div>
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <input class="btn btn-success" type="submit" name="login_submit"
                                        value="Login"></input>
                                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">
                            <form method="post" action="../global/save.php" enctype="multipart/form-data">
                                <!--Body-->
                                <div class="modal-body mb-1">
                                    <?php
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>';
                                }
                                ?>
                                    <div class="md-form form-sm mb-1">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" id="register_firstname" name="register_firstname"
                                                    class="form-control form-control-sm validate" required>
                                                <label for="register_firstname">ชื่อ</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" id="register_lastname" name="register_lastname"
                                                    class="form-control form-control-sm validate" required>
                                                <label for="register_lastname">นามสกุล</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" id="register_firstname_en"
                                                    name="register_firstname_en"
                                                    class="form-control form-control-sm validate" required>
                                                <label for="register_firstname_en">Firstname</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" id="register_lastname_en" name="register_lastname_en"
                                                    class="form-control form-control-sm validate" required>
                                                <label for="register_lastname_en">Lastname</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <select
                                                    class="browser-default custom-select form-control form-control-sm validate"
                                                    id="register_prefix" name="register_prefix" required>
                                                    <option value="" disabled="" selected="">- คำนำหน้า -</option>
                                                    <option value="เด็กชาย">เด็กชาย</option>
                                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                                    <option value="นาย">นาย</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md-form form-sm mb-1">
                                        <i class="fas fa-id-badge prefix"></i>
                                        <input type="text" name="register_username" id="register_username"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_username">ชื่อผู้ใช้งาน</label>
                                    </div>
                                    <div class="md-form form-sm mb-1">
                                        <i class="fas fa-key prefix"></i>
                                        <input type="password" name="register_password" id="register_password"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_password">รหัสผ่าน</label>
                                    </div>
                                    <div class="md-form form-sm mb-1">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="register_id" id="register_id"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_id">เลขประจำตัวนักเรียน</label>
                                    </div>
                                    <div class="md-form form-sm">
                                        <i class="fas fa-id-card prefix"></i>
                                        <input type="text" name="register_citizen_id" id="register_citizen_id"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_citizen_id">เลขประจำตัวประชาชน</label>
                                    </div>
                                    <div class="md-form form-sm mb-1">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="email" name="register_email" id="register_email"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_email">อีเมล</label>
                                    </div>
                                    <div class="md-form form-sm form-row mb-1">
                                        <div class="col">
                                            <select
                                                class="browser-default custom-select form-control form-control-sm validate"
                                                id="register_grade" name="register_grade" required>
                                                <option value="" disabled="" selected="">- ระดับชั้น -</option>
                                                <option value="1">ม.1</option>
                                                <option value="2">ม.2</option>
                                                <option value="3">ม.3</option>
                                                <option value="4">ม.4</option>
                                                <option value="5">ม.5</option>
                                                <option value="6">ม.6</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select
                                                class="browser-default custom-select form-control form-control-sm validate"
                                                id="register_class" name="register_class" required>
                                                <option value="" disabled="" selected="">- ห้อง -</option>
                                                <option value="1">1 (IEC/EMSP)</option>
                                                <option value="2">2 (ปกติ)</option>
                                                <option value="3">3 (ปกติ)</option>
                                                <option value="4">4 (ปกติ)</option>
                                                <option value="5">5 (วมว.)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-images prefix"></i>
                                        <input type="file" name="upload" id="upload"
                                            class="form-control form-control-sm validate" required
                                            accept="image/png, image/jpeg">
                                    </div>

                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <input class="btn btn-success" type="submit" name="register_submit"
                                        value="Sign Up"></input>
                                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                        <!--/.Panel 8-->
                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <script>
        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });
    </script>