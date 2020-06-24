<?php
    require '../global/connect.php';
    if (isset($_POST['name']) && isset($_POST['col']) && isset($_POST['bool'])) {
        return saveStdCheckdata($_POST['name'], $_POST['col'], $_POST['bool'], $conn);
    }

    if(isset($_POST['checkwhole_class']) && isset($_POST['checkwhole_grade']) && isset($_POST['checkwhole_date']) && isset($_POST['checkwhole_val'])) {
        return saveStdCheckdataWholeClass($_POST['checkwhole_grade'], $_POST['checkwhole_class'], $_POST['checkwhole_date'], $_POST['checkwhole_val'], $conn);
    }
?>