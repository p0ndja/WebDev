<?php

    function generateRandom($length = 16) {
        $characters = md5(time());
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    if ($_FILES['file']['name']) {
        if (!$_FILES['file']['error']) {
            $name = generateRandom(32);
            $ext = explode('.', $_FILES['file']['name']);
            $filename = $name . '.' . $ext[1];

            if (!file_exists('../file/post/editor/')) {
                mkdir('../file/post/editor/');
            }

            $destination = '../file/post/editor/' . $filename; //change this directory
            $location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo '../file/post/editor/' . $filename;//change this URL
        } else {
            echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
        }
    }

?>