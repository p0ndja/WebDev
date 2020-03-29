<?php declare(strict_types=1);

    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    function isLogin() {
        if (isset($_SESSION['id'])) return true;
        return false;
    }

    function isPermission($perm, $conn) {
        if (!isset($_SESSION['id'])) return false;
        if (!getUserdata($_SESSION['id'], $perm, $conn) && !getUserdata($_SESSION['id'], 'isAdmin', $conn)) return false;
        return true;
    }

    function getAnySQL($sql, $val, $key, $key_val, $conn) {
        return mysqli_fetch_array(mysqli_query($conn, "SELECT `$val` from `$sql` WHERE $key = '$key_val'"), MYSQLI_ASSOC)[$val];
    }

    function saveAnySQL($sql, $col, $val, $key, $key_val, $conn) {
        return mysqli_query($conn, "UPDATE `$sql` SET $col = $val WHERE $key = '$key_val'");
    }

        function getConfig($name, $col, $conn) {
            return getAnySQL('config', $col, 'name', $name, $conn);
        }  
        //getConfig('indexpg_showCarousel', 'bool', $conn);

        function saveConfig($name, $col, $val, $conn) {
            if (saveAnySQL('config', $col, $val, 'name', $name, $conn)) return true;
            return false;
        }
        //saveConfig('indexpg_showCarousel', 'bool', true, $conn);
        function getUserdata($id, $data, $conn) {
            return getAnySQL('user', $data, 'id', $id, $conn);
        }
        //getUserdata('604019', 'username', $conn);

        function saveUserdata($id, $data, $val, $conn) {
            if (saveAnySQL('user', $data, $val, 'id', $id)) return true;
            return false;
        }
        //saveUserdata('604019', 'username', 'PondJaTH', $conn);

        function getPostdata($id, $data, $conn) {
            return getAnySQL('post', $data, 'id', $id, $conn);
        }
        //getPostdata('1', 'article', $conn);

        function getProfiledata($id, $data, $conn) {
            return getAnySQL('profile', $data, 'id', $id, $conn);
        }
        //getProfiledata('604019', 'profile', $conn);

        function saveProfiledata($id, $data, $val, $conn) {
            if (saveAnySQL('profile', $data, $val, 'id', $id)) return true;
            return false;
        }
        //saveProfiledata('604019', 'profile', '...', $conn);

        function getAchievementdata($id, $data, $conn) {
            return getAnySQL('achievement', $data, 'id', $id, $conn);
        }
        //getAchidata('604019', 'page404', $conn);

        function saveAchidata($id, $data, $val, $conn) {
            if (saveAnySQL('achievement', $data, $val, 'id', $id)) return true;
            return false;
        }
        //saveAchidata('604019', 'page404', '...', $conn);

        function getProfilePicture($id, $conn) {
            $_array = getProfiledata($id,'profile',$conn);
            if ($_array != null) return $_array;
            else return '../assets/images/default.png';
        }

        function isValidUserID($id, $conn) {
            $query = "SELECT * FROM `user` WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) return true;
            return false;
        }
?>

<?php
    function getClientIP() {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
        else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    function unformat_curTime() {
        date_default_timezone_set('Asia/Bangkok'); return date('YmdHis', time());
    }

    function curTime() {
        date_default_timezone_set('Asia/Bangkok'); return date('Y-m-d H:i:s', time());
    }

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
    }).then(function () {
        <?php $_SESSION['error'] = "กรุณาเข้าสู่ระบบก่อนดำเนินการต่อ"; ?>
        window.location = "../home";
    });
</script>
<?php die(); }} ?>

<?php 
    function needPermission($perm, $conn) {
    if (!isset($_SESSION['id'])) return false;
    if (!getUserdata($_SESSION['id'], $perm, $conn) && !getUserdata($_SESSION['id'], 'isAdmin', $conn)) { ?>
<script>
    swal({
        title: "ACCESS DENIED",
        text: "You don't have enough permission!",
        icon: "warning"
    }).then(function () {
        <?php $_SESSION['error'] = "กรุณาเข้าสู่ระบบก่อนดำเนินการต่อ"; ?>
        window.location = "../home";
    });
</script>
<?php die(); return false;}
        return true;
    }
?>
<?php function back() { 
    ?>
<script>
    window.history.back();
</script>
<?php die(); 
} ?>

<?php function signinSuccess($name) { ?>
    <script>
    swal({
        title: "เข้าสู่ระบบสำเร็จ",
        text: "ยินดีต้อนรับ! <?php echo $name; ?>",
        icon: "success"
    });
    </script>
<?php } ?>