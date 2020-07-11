<?php
require '../global/connect.php';

if (isset($_POST['forum_submit']) || isset($_POST['forum_update'])) {
    $id = $_SESSION['id'];
    $title = $_POST['title'];
    $article = $_POST['article'];
    $writer = $id;
    $time = curTime();

    $hide = 0;
    if (isset($_POST['isHidden'])) {
        $hide = $_POST['isHidden'];
        if ($hide == 'on') $hide = 1;
        else $hide = 0;
    }

    $pinned = 0;
    if (isset($_POST['pinned'])) {
        $pinned = $_POST['pinned'];
        if ($pinned == 'on') $pinned = 1;
        else $pinned = 0;
    }

    $type = $_POST['type'];

    if (isset($_POST['forum_submit']) && $_GET['topic'] == "new") {
        $query_final = "INSERT INTO `forum_properties` (category, isPinned, isHidden) VALUES ('$type', $pinned, $hide)";
        $result_final = mysqli_query($connForum, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($connForum));
        $topic = mysqli_insert_id($connForum);

        $query_create_table = "CREATE TABLE IF NOT EXISTS `id_$topic` (id INT NOT NULL AUTO_INCREMENT, writer INT NOT NULL, title TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, message LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, timestamp TEXT NOT NULL, isDelete BOOLEAN NOT NULL DEFAULT FALSE, PRIMARY KEY (id))";
        $result_table = mysqli_query($connForum, $query_create_table);
        if (!$result_table) die('Could not post '.mysqli_error($connForum));
        $query_data = "INSERT INTO `id_$topic` (writer, title, message, timestamp) VALUES ($id, '$title', '$article', '$time')";
        $result_data = mysqli_query($connForum, $query_data);
        if (!$result_data) die('Could not post '.mysqli_error($connForum));

    } else if (isset($_POST['forum_update']) && $_GET['topic'] != "new") {
        $topic = $_GET['topic'];
        $comment_id = $_GET['comment'];

        $query_properties = "UPDATE `forum_properties` SET isPinned = $pinned, isHidden = $hide, category = '$type' WHERE id = '$topic'";
        $result_properties = mysqli_query($connForum, $query_properties);
        if (!$result_properties) die('Could not post '.mysqli_error($connForum));


        $query_data = "UPDATE `id_$topic` SET title = '$title', writer = $writer, message = '$article' WHERE id = $comment_id";
        $result_data = mysqli_query($connForum, $query_data);
        if (!$result_data) die('Could not post '.mysqli_error($connForum));
    }
}
header("Location: ../threads/$topic");
?>