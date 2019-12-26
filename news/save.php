<?php 
    include '../global/connect.php';

    if (isset($_POST['post_submit'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `post` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (! $result) {
            die('Could not get data: ' . mysqli_error());
        }

        $title = $_POST['title'];
        $article = $_POST['article'];
        $writer = $id;
        $cover = $_POST['cover'];
        $time = $_SESSION['time'];
        $tag = $_POST['tags'];
        
        $query_final = "INSERT INTO `post` (title, writer, time, article, cover, tags) VALUES ('$title', $writer, '$time', '$article', '$cover', '$tags')";
        //$query_final = "UPDATE `profile` SET background = '$bg', profile = '$profile', greetings = '$text' WHERE id = '$id'";
        $result_final = mysqli_query($conn, $query_final);
        if (! $result_final) {
            die('Could not post ' . mysqli_error());
        }

        echo $article;
    }

    //header("Location: ../news")
?>