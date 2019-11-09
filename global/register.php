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
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="text" name="id" class="form-control validate">
                    <label data-error="wrong" for="id">รหัสนักเรียน / Username</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="pass" class="form-control validate">
                    <label data-error="wrong" for="pass">รหัสบัตรประชาชน / Password</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-pencil-ruler prefix grey-text"></i>
                    <input type="text" name="id" class="form-control validate">
                    <label data-error="wrong" for="id">รหัสนักเรียน / Username</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <p>aaaa<?php 
if (isset($_POST['id'])) {
    echo $_POST['id'] . '+' . $_POST['pass'];
}
?></p>
                <input type="submit" class="btn text-white" style="background-color: #db6c24;" value="เข้าสู่ระบบ"></input>
            </div>
        </div>
    </div>
</div>
</form>
