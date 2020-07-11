<?php require '../global/connect.php';
    if (isset($_GET['thread']) && isset($_GET['comment']) && isLogin()) {
        
        $postID = $_GET['thread'];
        $commentID = $_GET['comment'];
        
        $iid = 0;

        $q = "SELECT `writer` FROM `id_$postID` WHERE id = $commentID";
        $r = mysqli_query($connForum, $q);
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $iid = $row['writer'];
        }

        $q = "";
        if ($_GET['method'] == "admin" && isPermission('isForumEditor', $conn)) {
            $q = "UPDATE `id_$postID` SET message = '%deletebyadmin%', isDelete = true WHERE id = $commentID";
        } else if ($_GET['method'] == "user" && isLogin() && $_SESSION['id'] == $iid) {
            $q = "UPDATE `id_$postID` SET message = '%deletebyuser%', isDelete = true WHERE id = $commentID";
        }
        $r = mysqli_query($connForum, $q);
        if (!$r) die('Could not get data: '.mysqli_error($connForum)); 
        
        header("Location: ../threads/" . $_GET['thread']);
    } else {
        header("Location: ../forum/");
    }
?>