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
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>