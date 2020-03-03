<?php  declare(strict_types=1);

    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    function isLogin() {
        if (isset($_SESSION['id'])) return true;
        return false;
    }

    if (isLogin()) {
        function getConfig($name, $col, $conn) {
            $getConfig_query="SELECT `$col` from `config` WHERE name = '$name'";
            $getConfig_result=mysqli_query($conn, $getConfig_query);
            $getConfig_array=mysqli_fetch_array($getConfig_result, MYSQLI_ASSOC);
            return $getConfig_array[$col];
        }  
        //getConfig('indexpg_showCarousel', 'bool', $conn);

        function saveConfig($name, $col, $val, $conn) {
            $saveConfig_query="UPDATE `config` SET $col = '$val' WHERE name = '$name'";
            $saveConfig_result=mysqli_query($conn, $saveConfig_query);
            if ($saveConfig_result) return true;
            return false;
        }
        //saveConfig('indexpg_showCarousel', 'bool', true, $conn);

        function getUserdata($id, $data, $conn) {
            $getUserdata_query="SELECT `$data` from `user` WHERE id = '$id'";
            $getUserdata_result=mysqli_query($conn, $getUserdata_query);
            $getUserdata_array=mysqli_fetch_array($getUserdata_result, MYSQLI_ASSOC);
            return $getUserdata_array[$data];
        }
        //getUserdata('604019', 'username', $conn);

        function saveUserdata($id, $data, $val, $conn) {
            $saveUserdata_query="UPDATE `user` SET $data = '$val' WHERE id = '$id'";
            $saveUserdata_result=mysqli_query($conn, $saveUserdata_query);
            if ($saveUserdata_result) return true;
            return false;
        }
        //saveUserdata('604019', 'username', 'PondJaTH', $conn);
    }
?>

<?php

    function base64($f, $user, $type) {
        $name=$f['name'];
        $name_file=$f['name'];
        $tmp_name=$f['tmp_name'];
        date_default_timezone_set('Asia/Bangkok');
        $date=date('YmdHis', time());
        $locate_img="../cache/";
        move_uploaded_file($tmp_name, $locate_img.$name_file);
        rename($locate_img.$name_file, $locate_img.$user.'_'.$date.'_'.$name_file);
        $finaldir=$locate_img.$user.'_'.$date.'_'.$name_file;
        $path=$finaldir;
        $type=pathinfo($path, PATHINFO_EXTENSION);
        $data=file_get_contents($path);
        $base64='data:'. $type . '/'. $type . ';base64,'. base64_encode($data);
        unlink($finaldir);
        return $base64;
    }
?>
<?php 
    function needLogin() {
    if (!isLogin()) {?>
    <script>
    swal({
        title: "ACCESS DENIED",
        text: "You need to logged-in!",
        icon: "error"
    }).then(function() {
        window.history.back();
    });
    </script>
    <?php die(); }} ?>

<?php 
    function needPermission($perm, $conn) {
    if (!getUserdata($_SESSION['id'], $perm, $conn)) { ?>
    <script>
        swal({
            title: "ACCESS DENIED",
            text: "You don't have enough permission!",
            icon: "warning"
        }).then(function() {
            window.history.back();
        });
    </script>
    <?php die(); }} ?>
<?php function back() { 
    ?>
    <script>
    window.history.back();
    </script>
<?php die(); 
} ?>
    