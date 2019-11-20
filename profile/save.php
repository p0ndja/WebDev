<?php 
    include '../global/connect.php';

    if (isset($_POST['edit_submit'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `profile` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) {
            die('Could not get data: ' . mysqli_error($conn));
        }

        $user = $_SESSION['user'];
        $text = $_POST['displayTextArea'];

        $re = mysqli_query($conn, "UPDATE `profile` set greetings = '$text' WHERE id = $id");
        if (! $re) {
            die('Could not update text: ' . mysqli_error($conn));
        }

        if(isset($_FILES['profile_upload']) && $_FILES['profile_upload']['name'] != ""){
            $name_file =  $_FILES['profile_upload']['name'];
            $tmp_name =  $_FILES['profile_upload']['tmp_name'];

            date_default_timezone_set('Asia/Bangkok'); $date = date('Y-m-d_H-i-s', time());
            
            $locate_img ="../cache/";
            move_uploaded_file($tmp_name,$locate_img.$name_file);

            rename($locate_img.$name_file, $locate_img.$user.'_'.$date.'_'.$name_file);

            $finaldir = $locate_img.$user.'_'.$date.'_'.$name_file;

            $_SESSION['pi'] = $finaldir;

            $r = mysqli_query($conn, "UPDATE `profile` SET profile = '$finaldir' WHERE id = $id");
            if (! $r) {
                die("Could not set profile: " . mysqli_error($conn));
            }
        }

        if(isset($_FILES['background_upload']) && $_FILES['background_upload']['name'] != ""){
            $name_file =  $_FILES['background_upload']['name'];
            $tmp_name =  $_FILES['background_upload']['tmp_name'];

            date_default_timezone_set('Asia/Bangkok'); $date = date('Y-m-d_H-i-s', time());
            
            $locate_img ="../cache/";
            move_uploaded_file($tmp_name,$locate_img.$name_file);

            rename($locate_img.$name_file, $locate_img.$user.'_'.$date.'_'.$name_file);

            $finaldir = $locate_img.$user.'_'.$date.'_'.$name_file;

            $r = mysqli_query($conn, "UPDATE `profile` SET background = '$finaldir' WHERE id = $id");
            if (! $r) {
                die("Could not set profile: " . mysqli_error($conn));
            }
        }
    }
    header("Location: ../profile")
?>