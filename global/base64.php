<?php declare(strict_types=1);
    function base64($f, $user, $type) {
        $name = $f['name'];

        $name_file =  $f['name'];
        $tmp_name =  $f['tmp_name'];
        date_default_timezone_set('Asia/Bangkok'); $date = date('YmdHis', time());
        $locate_img ="../cache/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
        rename($locate_img.$name_file, $locate_img.$user.'_'.$date.'_'.$name_file);
        $finaldir = $locate_img.$user.'_'.$date.'_'.$name_file;

        $path = $finaldir;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:' . $type . '/' . $type . ';base64,' . base64_encode($data);
        unlink($finaldir);

        return $base64;
    }
?>