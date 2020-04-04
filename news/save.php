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
    $time = curTime();
    $tags = $_POST['tags'];
    
    $finaldir = null;

    if(isset($_FILES['cover']) && $_FILES['cover']['name'] != ""){
        $name_file = $_FILES['cover']['name'];
        $tmp_name = $_FILES['cover']['tmp_name'];
        $locate_img ="../file/news/images/";
        $date = unformat_curTime();
        move_uploaded_file($tmp_name,$locate_img.$name_file);
        rename($locate_img.$name_file, $locate_img.$date.'_'.$name_file);
        $finaldir = $locate_img.$date.'_'.$name_file;
    } else if (isset($_SESSION['temp_cover'])) {
        $finaldir = $_SESSION['temp_cover'];
    } else {
        $finaldir = null;
    }

    if (isset($_POST['post_submit'])) {
        $query_final = "INSERT INTO `post` (title, writer, time, article, tags, cover) VALUES ('$title', '$writer', '$time', '$article', '$tags', '$finaldir')";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
        $news = mysqli_insert_id($conn);
    } else {
        $news = $_GET['news'];
        $query_final = "UPDATE `post` SET title = '$title', writer = '$writer', time = '$time', article = '$article', tags = '$tags', cover = '$finaldir' WHERE id = $news";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    }

    $fileTotal = count($_FILES['attachment']['name']);
    $finalFilePath = null;
    if (is_uploaded_file($_FILES['attachment']['tmp_name'][0])) {
        mkdir("../file/news/attachment/" . $news.'/');
        for ($i = 0; $i < $fileTotal; $i++) {
            if($_FILES['attachment']['tmp_name'][$i] != ""){
                $name_file = $_FILES['attachment']['name'][$i];
                $tmp_name = $_FILES['attachment']['tmp_name'][$i];
                $locate_img ="../file/news/attachment/".$news.'/';
                move_uploaded_file($tmp_name,$locate_img.$name_file);
                rename($locate_img.$name_file, $locate_img.$name_file);
                $finalFiledir = $locate_img.$name_file;
                if ($i == 0) $finalFilePath = "'". $finalFiledir;
                else $finalFilePath .= ',' . $finalFiledir;
            }
        }
        $finalFilePath .= "'";
        savePostdata($news, 'attachment', $finalFilePath, $conn); 
    }
}
header("Location: ../news/"); ?>