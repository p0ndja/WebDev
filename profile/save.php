<?php 
    require '../global/connect.php';

    if (isset($_POST['edit_submit'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `profile` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) die('Could not get data: ' . mysqli_error($conn));

        $user = $_SESSION['username'];
        $text = $_POST['text'];

        $re = mysqli_query($conn, "UPDATE `profile` set greetings = '$text' WHERE id = $id");
        if (! $re) die('Could not update text: ' . mysqli_error($conn));
        

            
        if(isset($_FILES['profile_upload']) && $_FILES['profile_upload']['name'] != ""){
            if ($_FILES['profile_upload']['name']) {
                if (!$_FILES['profile_upload']['error']) {
                    $name = "Avatar";
                    $ext = explode('.', $_FILES['profile_upload']['name']);
                    $filename = $name . '.' . $ext[1];
        
                    if (!file_exists('../file/profile/'. $id .'/')) {
                        mkdir('../file/profile/'. $id .'/');
                    }
        
                    $destination = '../file/profile/'. $id .'/' . $filename; //change this directory
                    $location = $_FILES["profile_upload"]["tmp_name"];
                    move_uploaded_file($location, $destination);
                    $finalFile = '../file/profile/'. $id .'/' . $filename;//change this URL
                    $r = mysqli_query($conn, "UPDATE `profile` SET profile = '$finalFile' WHERE id = $id");
                    if (! $r) die("Could not set profile: " . mysqli_error($conn));
                }
            }
        }

        if(isset($_FILES['background_upload']) && $_FILES['background_upload']['name'] != ""){
            if ($_FILES['background_upload']['name']) {
                if (!$_FILES['background_upload']['error']) {
                    $name = "Background";
                    $ext = explode('.', $_FILES['background_upload']['name']);
                    $filename = $name . '.' . $ext[1];
        
                    if (!file_exists('../file/profile/'. $id .'/')) {
                        mkdir('../file/profile/'. $id .'/');
                    }
        
                    $destination = '../file/profile/'. $id .'/' . $filename; //change this directory
                    $location = $_FILES["background_upload"]["tmp_name"];
                    move_uploaded_file($location, $destination);
                    $finalFile = '../file/profile/'. $id .'/' . $filename;//change this URL
                    $isDark = $_POST['isDark'];
                    $r = mysqli_query($conn, "UPDATE `profile` SET background = '$finalFile', isDark = $isDark WHERE id = $id");
                    if (! $r) die("Could not set profile: " . mysqli_error($conn));
                }
            }
        }
    }
    header("Location: ../profile");
?>