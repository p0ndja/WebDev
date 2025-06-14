<?php 
    require '../global/connect.php';

    function generateRandomS($length = 16) {
        $characters = md5(time());
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    if (isset($_POST['edit_submit'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM `profile` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) die('Could not get data: ' . mysqli_error($conn));

        $text = $_POST['text'];

        $graduatearray = $_POST['grapri'] . "|" . $_POST['grasecj'] . "|" . $_POST['grasecs'];

        $finalProfile = $_POST['profile_final'];

        $re = mysqli_query($conn, "UPDATE `profile` set greetings = '$text', graduation = '$graduatearray', profile = '$finalProfile' WHERE id = $id");
        if (! $re) die('Could not update text: ' . mysqli_error($conn));

        if(isset($_FILES['background_upload']) && $_FILES['background_upload']['name'] != ""){
            if ($_FILES['background_upload']['name']) {
                if (!$_FILES['background_upload']['error']) {
                    $name = "Background_" . generateRandomS(32);
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