<?php

function generateRandom($length = 16) {
    $characters = md5(time());
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

echo generateRandom();
?>