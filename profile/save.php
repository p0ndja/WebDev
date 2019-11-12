<?php 
    include '../global/connect.php';

    if (isset($_POST['edit_submit'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `profile` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) {
            die('Could not get data: ' . mysqli_error());
        }

        $bg = $_POST['backgroundURL'];
        $profile = $_POST['profileURL'];
        $text = $_POST['displayTextArea'];

        $query_final = "UPDATE `profile` SET background = '$bg', profile = '$profile', greetings = '$text' WHERE id = '$id'";
        mysqli_query($conn, $query_final);
    }

    header("Location: ../profile")
?>