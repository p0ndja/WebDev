<?php
require '../global/connect.php';

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

    if (isset($_POST['makeHotlink']) && $_POST['makeHotlink'] == true)
        $hotlink = $_POST['hotlinkField'];
    else
        $hotlink = null;

    if (isset($_POST['post_submit'])) {
        $query_final = "INSERT INTO `post` (title, writer, time, article, tags, hotlink, type, hide, pin) VALUES ('$title', '$writer', '$time', '$article', '$tags', '$hotlink', '$type', '$hide', $pinned)";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
        $news = mysqli_insert_id($conn);
    } else {
        $news = $_GET['news'];
        $query_final = "UPDATE `post` SET title = '$title', writer = '$writer', time = '$time', article = '$article', tags = '$tags', hotlink = '$hotlink', hide = '$hide', type = '$type', `pin` = $pinned WHERE id = '$news'";
        $result_final = mysqli_query($conn, $query_final);
        if (!$result_final) die('Could not post '.mysqli_error($conn));
    }

    if (!file_exists("../file/post/".$news."/")) {
        mkdir("../file/post/".$news."/");
    }

    foreach (explode(",", $tags) as $s) {
        $ss = trim($s);
        if (startsWith($ss, "@")) {
            $userID = str_replace("@", "", $ss);
            if (isValidUserID($userID, $conn)) {
                $tagBefore = getProfiledata($userID, 'tagPostID', $conn);
                if (!strpos($tagBefore, "|" . $news . "|")) {
                    if ($tagBefore == null) $tagBefore = "|" . $news . "|";
                    else $tagBefore = "|" . $news . $tagBefore;
    
                    saveProfiledata($userID, 'tagPostID', "'" . $tagBefore . "'", $conn);
                }
            }
        }
    }

    $finaldir = null;
    if (isset($_FILES['cover']) && $_FILES['cover']['name'] != "") {
        $name_file = $_FILES['cover']['name'];
        $tmp_name = $_FILES['cover']['tmp_name'];
        $locate_img ="../file/post/".$news."/"."thumbnail/";
        if (!file_exists($locate_img)) {
            mkdir($locate_img);
        }
        move_uploaded_file($tmp_name,$locate_img.$name_file);
        $finaldir = $locate_img.$name_file;
    } else if (isset($_SESSION['temp_cover']) && $_SESSION['temp_cover'] != null) {
        $finaldir = $_SESSION['temp_cover'];
        $_SESSION['temp_cover'] = null;
    }
    $query_final = "UPDATE `post` SET cover = '$finaldir' WHERE id = '$news'";
    $result_final = mysqli_query($conn, $query_final);
    if (!$result_final) die('Could not post cover '.mysqli_error($conn));

    $fileTotal = count($_FILES['attachment']['name']);
    $finalFilePath = null;
    if (is_uploaded_file($_FILES['attachment']['tmp_name'][0])) {
        if (!file_exists("../file/post/" . $news . "/". "attachment/")) {
            mkdir("../file/post/" . $news . "/". "attachment/");
        }
        for ($i = 0; $i < $fileTotal; $i++) {
            if($_FILES['attachment']['tmp_name'][$i] != ""){
                $name_file = $_FILES['attachment']['name'][$i];
                $tmp_name = $_FILES['attachment']['tmp_name'][$i];
                $locate_img ="../file/post/".$news.'/'.'attachment/';
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
header("Location: ../post/");
?>