<?php 
    include '../global/connect.php';

    if (isset($_POST['edit_submit'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `profile` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) die('Could not get data: ' . mysqli_error($conn));

        $user = $_SESSION['user'];
        $text = $_POST['text'];

        $re = mysqli_query($conn, "UPDATE `profile` set greetings = '$text' WHERE id = $id");
        if (! $re) die('Could not update text: ' . mysqli_error($conn));
        
            
        if(isset($_FILES['profile_upload']) && $_FILES['profile_upload']['name'] != ""){
            $base64 = base64($_FILES['profile_upload'], $user, 'image');
            $_SESSION['pi'] = $base64;
            $r = mysqli_query($conn, "UPDATE `profile` SET profile = '$base64' WHERE id = $id");
            if (! $r) die("Could not set profile: " . mysqli_error($conn));
        }

        if(isset($_FILES['background_upload']) && $_FILES['background_upload']['name'] != ""){
            $base64 = base64($_FILES['background_upload'], $user, 'image');
            $r = mysqli_query($conn, "UPDATE `profile` SET background = '$base64' WHERE id = $id");
            if (! $r) die("Could not set profile_background: " . mysqli_error($conn));
        }
    }
    header("Location: ../profile");
?>