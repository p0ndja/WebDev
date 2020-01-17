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
    $time = $_SESSION['time'];
    $tags = $_POST['tags'];
    
    $finaldir = null;

    if (isset($_POST['post_submit'])) {
        $query_final = "INSERT INTO `post` (title, writer, time, article, tags) VALUES ('$title', '$writer', '$time', '$article', '$tags')";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    } else {
        $news = $_GET['news'];
        $query_final = "UPDATE `post` SET title = '$title', writer = '$writer', time = '$time', article = '$article', tags = '$tags' WHERE id = $news";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    }

    if(isset($_FILES['cover']) && $_FILES['cover']['name'] != ""){
        $name_file = $_FILES['cover']['name'];
        $tmp_name = $_FILES['cover']['tmp_name'];
        date_default_timezone_set('Asia/Bangkok'); $date = date('YmdHis', time());
        $locate_img ="../news/images/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
        rename($locate_img.$name_file, $locate_img.$date.'_'.$name_file);
        $finaldir = $locate_img.$date.'_'.$name_file;

        $query_final = "UPDATE `post` SET cover = '$finaldir' WHERE id = $news";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    }
}
echo '$_POST[tags] = ' . $tags . '<br>$_POST[cover] = ' . $finaldir;
header("Location: ../news/"); ?>