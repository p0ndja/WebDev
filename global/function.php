<?php declare(strict_types=1);
    function isLogin() {
        if (isset($_SESSION['id'])) return true;
        return false;
    }

    function isPermission($perm, $conn) {
        if (!isset($_SESSION['id'])) return false;
        if (!getUserdata($_SESSION['id'], $perm, $conn) && !getUserdata($_SESSION['id'], 'isAdmin', $conn)) return false;
        return true;
    }

    function checkPermission($perm, $id, $conn) {
        if (!getUserdata($id, $perm, $conn) && !getUserdata($id, 'isAdmin', $conn)) return false;
        return true;
    }

    function getAnySQL($sql, $val, $key, $key_val, $conn) {
        return mysqli_fetch_array(mysqli_query($conn, "SELECT `$val` from `$sql` WHERE $key = '$key_val'"), MYSQLI_ASSOC)[$val];
    }

    function saveAnySQL($sql, $col, $val, $key, $key_val, $conn) {
        return mysqli_query($conn, "UPDATE `$sql` SET `$col` = $val WHERE `$key` = '$key_val'");
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
            if (saveAnySQL('user', $data, $val, 'id', $id, $conn)) return true;
            return false;
        }
        //saveUserdata('604019', 'username', 'PondJaTH', $conn);

        function getPostdata($id, $data, $conn) {
            return getAnySQL('post', $data, 'id', $id, $conn);
        }
        //getPostdata('1', 'article', $conn);

        function savePostdata($id, $data, $val, $conn) {
            if (saveAnySQL('post', $data, $val, 'id', $id, $conn)) return true;
            return false;
        }
        //saveUserdata('604019', 'username', 'PondJaTH', $conn);

        function getProfiledata($id, $data, $conn) {
            return getAnySQL('profile', $data, 'id', $id, $conn);
        }
        //getProfiledata('604019', 'profile', $conn);

        function saveProfiledata($id, $data, $val, $conn) {
            if (saveAnySQL('profile', $data, $val, 'id', $id, $conn)) return true;
            return false;
        }
        //saveProfiledata('604019', 'profile', '...', $conn);

        function getAchievementdata($id, $data, $conn) {
            return getAnySQL('achievement', $data, 'id', $id, $conn);
        }
        //getAchidata('604019', 'page404', $conn);

        function saveAchimentdata($id, $data, $val, $conn) {
            if (saveAnySQL('achievement', $data, $val, 'id', $id, $conn)) return true;
            return false;
        }
        //saveAchidata('604019', 'page404', '...', $conn);

        function getStdCheckdata($id, $data, $conn) {
            return getAnySQL('std_checktest', $data, 'id', $id, $conn);
        }

        function saveStdCheckdata($id, $data, $val, $conn) {
            if (saveAnySQL('std_checktest', $data, $val, 'id', $id, $conn)) return true;
            return false;
        }

        function getProfilePicture($id, $conn) {
            $_array = getProfiledata($id,'profile',$conn);
            if ($_array != null) return $_array;
            else return '../static/images/default.png';
        }

        function isValidUserID($id, $conn) {
            $query = "SELECT * FROM `user` WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) return true;
            return false;
        }

        function isValidPostID($id, $conn) {
            $query = "SELECT * FROM `post` WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) return true;
            return false;
        }
?>
<?php

    function changePrefixTHtoEN($text) {
        if ($text == 'นาย') $text_en = 'Mr. ';
        else if ($text == 'นาง') $text_en = 'Mrs. ';
        else if ($text == 'เด็กชาย') $text_en = 'Master ';
        else if ($text == 'เด็กหญิง' || $text == 'นางสาว') $text_en = 'Miss ';
        else $text_en = "";

        return $text_en;
    }

    function getDisplayName($id, $type, $conn) {
        $profile_prefix = getUserdata($id, 'prefix', $conn);

        if ($type == "EN" || $type == "en") return changePrefixTHtoEN($profile_prefix) . getUserdata($id, 'firstname_en', $conn) . ' ' . getUserdata($id, 'lastname_en', $conn);
        else return $profile_prefix . getUserdata($id, 'firstname', $conn) . ' ' . getUserdata($id, 'lastname', $conn);
    }

    function generateInfoCard($id, $conn) {
    
        $profile_grade = getUserdata($id, 'grade', $conn);

        $profile_room = getUserdata($id, 'class', $conn);
        if ($profile_room == 1) $profile_class = "EMSP";
        else if ($profile_room == 5) $profile_class = "วมว.";
        else $profile_class = "ปกติ";
        
        if (checkPermission('isAdmin', $id, $conn)) $profile_class_detail = "<strong class='font-weight-bold text-danger'>แอดมิน</strong><br>";
        else if (checkPermission('isTeacher', $id, $conn)) $profile_class_detail = "<strong class='font-weight-bold text-smd'>อาจารย์</strong><br>";
        else if ($profile_grade > 6) $profile_class_detail = "<strong>ศิษย์เก่า</strong><br>";
        else if ($profile_grade >= 1 && $profile_grade <= 6) $profile_class_detail = "<strong>ระดับชั้น</strong> " . $profile_grade . "/" . $profile_room . " (" . $profile_class . ")<br>";
        else $profile_class_detail = "";

        $profile_email = getUserdata($id, 'email', $conn);
        if ($profile_email != null) {
            $profile_email = '<strong>อีเมล</strong> <a href="mailto:' . $profile_email . '">'. $profile_email .'</a>';
        }

        $d_th = getDisplayName($id, "TH", $conn);
        $d_en = getDisplayName($id, "EN", $conn);
        return '<h1 class="text-smd font-weight-bold">' . $d_th . '</h1><h4>' . $d_en . '</h4><hr><p><strong>รหัสนักเรียน</strong> ' . $id . '<br>' .$profile_class_detail . $profile_email . '</p>';
    }

    function generateAchievementCard($id, $conn) {
        $profile_achi = "";
        if (getAchievementdata($id, 'betaTester', $conn))
            $profile_achi .= '<a class="material-tooltip-main" data-toggle="tooltip" title="Beta Tester (LEGENDARY)"><img src="../static/images/achievement/beta-tester-icon_resize.gif" alt="Beta Tester (LEGENDARY)" width="50" class="justify-content-center"></a>&nbsp;';
        if (getAchievementdata($id, 'WebDevTycoon', $conn))
            $profile_achi .= '<a class="material-tooltip-main" data-toggle="tooltip" title="Web Dev Tycoon (UNOBTAINABLE)"><img src="../static/images/achievement/Web_dev_tycoon_icon_resize.gif" alt="Web Dev Tycoon (UNOBTAINABLE)" width="50" class="justify-content-center"></a>&nbsp;';
        if (getAchievementdata($id, 'the4thFloor', $conn))
            $profile_achi .= '<a class="material-tooltip-main" data-toggle="tooltip" title="The 4th Floor (RARE)"><img src="../static/images/achievement/stair.png" alt="The 4th Floor (RARE)" width="50" class="justify-content-center"></a>&nbsp;';
        if (getAchievementdata($id, 'Xmas', $conn))
            $profile_achi .= '<a class="material-tooltip-main" data-toggle="tooltip" title="Merry Christmas~ (UNCOMMON)"><img src="../static/images/achievement/xmas_resize.png" alt="Merry Christmas~ (UNCOMMON)" width="50" class="justify-content-center"></a>&nbsp;';
        
            return $profile_achi;
    }

    function isThisMyID($id, $conn) {
        if (isLogin() && $_SESSION['id'] == $id) {
            return true;
        } else {
            return false;
        }
    }

    function getClientIP() {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
        else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    function path_curTime() {
        date_default_timezone_set('Asia/Bangkok'); return date('Y/m/d', time());
    }

    function unformat_curTime() {
        date_default_timezone_set('Asia/Bangkok'); return date('YmdHis', time());
    }

    function curDate() {
        date_default_timezone_set('Asia/Bangkok'); return date('d/m/Y', time());
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
        $locate_img="../file/cache/";
        if (!file_exists($locate_img)) {
            mkdir($locate_img);
        }
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

    function addCategory($category, $conn) {
        if (!isValidCategory($category, $conn)) { //This Category not exist
            $arr = getConfig('global_categoryListThing', 'val', $conn) . "|" . $category;
            if (saveConfig('global_categoryListThing', 'val', $arr, $conn)) {
                echo "Y";
            } else {
                echo "N";
            }
            print_r(getConfig('global_categoryListThing', 'val', $conn));
            echo "Y";
        }
    }

    function removeCategory($category, $conn) {
        
    }

    function listCategory($conn) {
        $arr = array();
        $unsplit_category = getConfig('global_categoryListThing', 'val', $conn);
        foreach (explode("|", $unsplit_category) as $s) {
            array_push($arr, $s);
        }
        return $arr;
    }

    function isValidCategory($category, $conn) {
        if ($category == "~") return true;
        foreach (listCategory($conn) as $a) {
            if ($a == $category) return true;
        }
        return false;
    }

    function generateCategoryTitle($category) {
        $path = "../static/images/element/header/$category.png";
        if (file_exists($path)) {
            return "<div><img src='$path'/>";
        } else {
            return "<div class='display-4'>" . strtoupper($category);
        }
    }

    function isDarkMode() {
        if (isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'] == true) return true;
        else return false;
    }

    
    function generateOpenGraphMeta($conn) {
        $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($current_url, "/post")) {
            //Mean you're currently browsing in post page
            if (isset($_GET['id']) && isValidPostID($_GET['id'], $conn)) {
                $postID = $_GET['id'];
                $title = getPostdata($postID, 'title', $conn);
                $cover = getPostdata($postID, 'cover', $conn);
                if ($cover == null) {
                    $cover = "../static/images/default/thumbnail.jpg";
                }
                ?>
        <meta property="og:image" content="<?php echo $cover; ?>" />
        <meta property="og:title" content="<?php echo $title;?>" />
        <meta property="og:description" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
            <?php }
        } else { ?>
        <meta property="og:image" content="../static/images/default/thumbnail.jpg" />
        <meta property="og:title" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
        <meta property="og:description" content="123 มหาวิทยาลัยขอนแก่น โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ถนนมิตรภาพ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40002 โทรศัพท์ / โทรสาร 043202044" />
        <?php } ?>
        <link rel="image_src" href="../static/images/logo/smdlogo.jpg" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo $current_url; ?>" />
        <meta property="fb:app_id" content="129081655091085" />
    <?php }

    function generateRandom($length = 16) {
        $characters = md5(time());
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
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
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        home();
    }
    die(); 
    } ?>
<?php function home() {
    header("Location: ../home");
} ?>
<?php function logout() { ?>
    <script>
        swal({
            title: "ออกจากระบบ ?",
            text: "คุณต้องการออกจากระบบหรือไม่?",
            icon: "warning",
            buttons: true,
            dangerMode: true}).then((willDelete) => { 
                if (willDelete) { 
                    window.location = "../global/logout.php";
                }
            });
</script>
<?php } ?>

<?php function deletePost($id) { ?>
    <script>
        swal({
            title: "ลบข่าวหรือไม่ ?",
            text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",
            icon: "warning",
            buttons: true,
            dangerMode: true}).then((willDelete) => { 
                if (willDelete) { 
                    window.location = "../post/delete.php?id=<?php echo $id; ?>";
                }
            });
    </script>
<?php } ?>

<?php function signinSuccess($name) { ?>
    <script>
    swal({
        title: "เข้าสู่ระบบสำเร็จ",
        text: "ยินดีต้อนรับ! <?php echo $name; ?>",
        icon: "success"
    });
    </script>
<?php } ?>
<?php function debug($message) { echo $message; } ?>

<?php
    function isWebsiteClose($conn) {        
        if (getConfig('global_temporaryClose', 'bool', $conn))
            if (!isPermission('isAdmin', $conn))
                header("Location: ../p/close");
            //Else is admin so bypass, still can use website
        //Else bypass
    }

    function startsWith($haystack, $needle) {
        return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
    }
    function endsWith($haystack, $needle) {
        return substr_compare($haystack, $needle, -strlen($needle)) === 0;
    }
?>