<form method="post">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">กรุณากรอกรายละเอียด</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="text" name="id" class="form-control validate">
                        <label data-error="wrong" for="id">รหัสนักเรียน</label>
                    </div>
                    <div class="md-form mb-5">
                        <select class="form-control browser-default custom-select">
                            <option value="" disabled>Choose option</option>
                            <option value="1" selected>Feedback</option>
                            <option value="2">Report a bug</option>
                            <option value="3">Feature request</option>
                            <option value="4">Feature request</option>
                        </select>
                        <label>Subject</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-pencil-ruler prefix grey-text"></i>
                        <input type="text" name="firstname" class="form-control validate">
                        <label data-error="wrong" for="firstname">ชื่อ</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="lastname" class="form-control validate">
                        <label data-error="wrong" for="lastname">นามสกุล</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-pencil-ruler prefix grey-text"></i>
                        <input type="text" name="firstname_en" class="form-control validate">
                        <label data-error="wrong" for="firstname_en">Firstname</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="lastname_en" class="form-control validate">
                        <label data-error="wrong" for="lastname_en">Lastname</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="lastname" class="form-control validate">
                        <label data-error="wrong" for="lastname"></label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="pass" class="form-control validate">
                        <label data-error="wrong" for="pass">เลขบัตรประชาชน</label>
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