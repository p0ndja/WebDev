    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 white darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active black-text bg-dark" data-toggle="tab" href="#panel7" role="tab" ><i
                                    class="fas fa-user mr-1"></i>
                                Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link black-text" data-toggle="tab" href="#panel8" role="tab"><i
                                    class="fas fa-user-plus mr-1"></i>
                                Register</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <form method="post">
                                <!--Body-->
                                <div class="modal-body mb-1">

                                    <?php
                                    if (isset($_POST['login_submit'])) {
                                        $user = $_POST['login_username'];
                                        $pass = md5($_POST['login_password']);
                                        $query = "SELECT * FROM `userdatabase` WHERE username = '$user' AND password = '$pass'";
                                        $result = mysqli_query($conn, $query);

                                        if (! $result) {
                                            die('Could not get data: ' . mysqli_error());
                                        }
                                       
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $_SESSION['user'] = $row['username'];
                                            $_SESSION['fn'] = $row['firstname'];
                                            $_SESSION['ln'] = $row['lastname'];
                                        }
                                        if (mysqli_num_rows($result) == 0) {
                                            $_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
                                            session_destroy();
                                        }
                                    }

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
                            <form method="post">
                                <?php
                                if (isset($_POST['register_submit'])) {
                                    $user = $_POST['register_username'];
                                    $pass = md5($_POST['register_password']);
                                    $id = $_POST['register_id'];
                                    $citizen_id = $_POST['register_citizen_id'];
                                    $firstname = $_POST['register_firstname'];
                                    $lastname = $_POST['register_lastname'];
                                    $email = $_POST['register_email'];
                                    $query1 = "SELECT * FROM `user` WHERE username = '$user'";
                                    $query2 = "SELECT * FROM `user` WHERE citizen_id = '$citizen_id'";
                                    $result1 = mysqli_query($conn, $query1);
                                    $result2 = mysqli_query($conn, $query2);

                                    if (! $result1) {
                                        die('Could not get data: ' . mysqli_error());
                                    }

                                    if (mysqli_num_rows($result1) == 1) {
                                        $_SESSION['error'] = "มีชื่อผู้ใช้นี้อยู่แล้ว";
                                    } else if (mysqli_num_rows($result2) == 1) {
                                        $_SESSION['error'] = "รหัสบัตรประชาชนนี้ ได้ทำการสมัครสมาชิกอยู่แล้ว";
                                    } else {
                                        $query_final = "INSERT INTO `userdatabase` (id, username, password, citizen_id, firstname, lastname, email) VALUES ($id, '$user', '$pass', $citizen_id, '$firstname', '$lastname', '$email')";
                                        $result_final = mysqli_query($conn, $query_final);
                                        if ($result_final) {
                                            $_SESSION['error'] = "สมัครผู้ใช้งานสำเร็จ";
                                            $_SESSION['user'] = $user;
                                            $_SESSION['fn'] = $_POST['register_firstname'];
                                            $_SESSION['ln'] = $_POST['register_lastname'];
                                        }
                                    }
                                }
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">'. $_SESSION['error'] .'</div>';
                                }
                                ?>
                                <!--Body-->
                                <div class="modal-body">
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="text" name="register_username" id="register_username"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_username">ชื่อผู้ใช้งาน</label>
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="password" name="register_password" id="register_password"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_password">รหัสผ่าน</label>
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="register_id" id="register_id"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_id">รหัสนักเรียน</label>
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="text" name="register_citizen_id" id="register_citizen_id"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_citizen_id">รหัสบัตรประชาชน</label>
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-signature prefix"></i>
                                        <input type="text" name="register_firstname" id="register_firstname"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_firstname">ชื่อ</label>
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-signature prefix"></i>
                                        <input type="text" name="register_lastname" id="register_lastname"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_lastname">นามสกุล</label>
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="email" name="register_email" id="register_email"
                                            class="form-control form-control-sm validate" required>
                                        <label for="register_email">อีเมล</label>
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
    </form>