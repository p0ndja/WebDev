<?php
include '../global/connect.php';

if (isset($_POST['post_submit']) || isset($_POST['post_update'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `post` WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result)
        die('Could not get data: '.mysqli_error($conn));

    $title = $_POST['title'];
    $article = $_POST['article'];
    $writer = $id;
    $cover = $_POST['cover'];
    $time = $_SESSION['time'];
    $tag = $_POST['tags'];

    if (isset($_POST['post_submit'])) {
        $query_final = "INSERT INTO `post` (title, writer, time, article, cover, tags) VALUES ('$title', '$writer', '$time', '$article', '$cover', '$tags')";
        //$query_final = "UPDATE `profile` SET background = '$bg', profile = '$profile', greetings = '$text' WHERE id = '$id'";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    } else {
        $news = $_GET['news'];
        $query_final = "UPDATE `post` SET title = '$title', writer = '$writer', time = '$time', article = '$article', cover = '$cover', tags = '$tags' WHERE id = '$news'";
        //$query_final = "UPDATE `profile` SET background = '$bg', profile = '$profile', greetings = '$text' WHERE id = '$id'";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    }
}

header("Location: ../news/"); ?>