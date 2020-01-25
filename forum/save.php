<?php
include '../global/connect.php';

if (isset($_POST['post_submit']) || isset($_POST['post_update'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `forum` WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result)
        die('Could not get data: '.mysqli_error($conn));

    $title = $_POST['title'];
    $article = $_POST['article'];
    $writer = $id;
    $time = $_SESSION['time'];
    $tags = $_POST['tags'];
    
    $finaldir = null;

    if (isset($_POST['post_submit'])) {
        $query_final = "INSERT INTO `forum` (title, writer, time, article, tags) VALUES ('$title', '$writer', '$time', '$article', '$tags')";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    } else {
        $news = $_GET['news'];
        $query_final = "UPDATE `forum` SET title = '$title', writer = '$writer', time = '$time', article = '$article', tags = '$tags' WHERE id = $news";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    }
}
header("Location: ../forum/"); ?>