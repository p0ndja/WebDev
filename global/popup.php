<?php
    if (isset($_SESSION['success']) || isset($_SESSION['error'])) { ?>
<script>
    $(document).ready(function () {
        $('#popupModal').modal('show')
    });
</script>
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">
                    <?php 
                if (isset($_SESSION['success']))
                echo 'SUCCESS!';
                else if (isset($_SESSION['error']))
                echo 'ERROR!';
            ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
        if (isset($_SESSION['success']))
            echo $_SESSION['success'];
        else if (isset($_SESSION['error']))
            echo $_SESSION['error'];
        ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-target="#login">Try Again</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>