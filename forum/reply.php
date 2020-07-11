<?php
require '../global/connect.php';

if (isset($_POST['forum_reply'])) {
    $id = $_SESSION['id'];
    $article = $_POST['article'];
    $writer = $id;
    $time = curTime();
    $topic = $_GET['threads'];

    $query_data = "INSERT INTO `id_$topic` (writer, title, message, timestamp) VALUES ($id, 'COMMENT', '$article', '$time')";
    $result_data = mysqli_query($connForum, $query_data);
    if (!$result_data) die('Could not post '.mysqli_error($connForum));

    header("Location: ../threads/" . $topic);
}
?>