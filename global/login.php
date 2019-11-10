<form method="post">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 orange darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active black-text" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                                Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link black-text" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                                Register</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" name="id" id="id" class="form-control form-control-sm validate">
                                    <label for="id">รหัสนักเรียน</label>
                                </div>
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" name="citizen_id" id="citizen_id"
                                        class="form-control form-control-sm validate">
                                    <label for="citizen_id">รหัสบัตรประชาชน</label>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <input class="btn btn-success" type="submit" value="Login"></input>
                                <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">
                            <!--Body-->
                            <div class="modal-body">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" name="id" id="id" class="form-control form-control-sm validate">
                                    <label for="id">รหัสนักเรียน</label>
                                </div>
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" name="citizen_id" id="citizen_id"
                                        class="form-control form-control-sm validate">
                                    <label for="citizen_id">รหัสบัตรประชาชน</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput14"
                                        class="form-control form-control-sm validate">
                                    <label for="modalLRInput14">Repeat
                                        password</label>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <input class="btn btn-success" type="submit" value="Sign Up"></input>
                                <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!--/.Panel 8-->
                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</form>

<form method="post">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">โปรดเข้าสู่ระบบ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="id" class="form-control validate">
                        <label data-error="wrong" for="id">รหัสนักเรียน / Username</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="pass" class="form-control validate">
                        <label data-error="wrong" for="pass">รหัสบัตรประชาชน / Password</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <p>
                        <?php 
                            if (isset($_POST['id'])) {
                                echo $_POST['id'] . '+' . $_POST['pass'];
                            }
                        ?></p>
                    <input type="submit" class="btn text-white" style="background-color: #db6c24;"
                        value="เข้าสู่ระบบ"></input>
                </div>
            </div>
        </div>
    </div>
</form>