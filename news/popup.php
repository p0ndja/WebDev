<!-- Central Modal Small -->
<?php 
    include '../global/connect.php';
    if(isset($_GET['news'])) {
        $id = $_GET['news'];
        $query = "SELECT * FROM `post` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) {
            die('Could not get data: ' . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $writer = null;
            $writer_id = $row['writer'];
            $query_final = "SELECT * FROM `userdatabase` WHERE id = '$writer_id'";
            $result_final = mysqli_query($conn, $query_final);
            while($row2 = mysqli_fetch_array($result_final, MYSQLI_ASSOC)) {
                $writer = $row2['firstname'] . ' ' . $row2['lastname'] . ' (' . $row2['username'] . ')';
            }
            if ($writer != null)
                echo $row['time'] . ' โดย ' . '<a href="../profile/?search=' . $writer_id . '">' . $writer . '</a>'; 
            $article = $row['article'];
            $title = $row['title'];
        }
    } else {
        header("Location: ../home");
    }
?>
<div class="modal fade" id="newsPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel"><?php echo $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $article; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Central Modal Small -->