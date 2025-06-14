<?php declare(strict_types=1);

    class User{
        private $id;
        private $username;
        private $name;
        public function __construct($id, $username, $name) {
            $this->name = $name;
            $this->username = $username;
            $this->id = $id;
        }
        public function getID() {
            return $this->id;
        }
        public function getName() {
            return $this->name;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function getUsername() {
            return $this->username;
        }
    }
    
    function isLogin() {
        if (isset($_SESSION['id'])) return true;
        return false;
    }

    function userLogin($user, $pass, $conn) {
        if ($stmt = $conn -> prepare('SELECT id, username, password, firstname, lastname FROM `user` WHERE username = ? AND password = ?')) {
            $stmt->bind_param('ss', $user, $pass);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
    
                $stmt->bind_result($id, $username, $password, $firstname, $lastname);
                $stmt->fetch();
                
                session_regenerate_id();
                $user = new User($id, $username, "$firstname $lastname");
                return $user;
            }
            $stmt->free_result();
            $stmt->close();
        }
        return 0;
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
        if ($sql == null || $val == null || $key == null || $key_val == null || $conn == null) return false;
        return mysqli_fetch_array(mysqli_query($conn, "SELECT `$val` from `$sql` WHERE $key = '$key_val'"), MYSQLI_ASSOC)[$val];
    }

    function saveAnySQL($sql, $col, $val, $key, $key_val, $conn) {
        if ($sql == null || $key == null || $key_val == null || $conn == null) return false;
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

    function getUserID($input, $method, $conn) {
        return getAnySQL('user', 'id', $method, $input, $conn);
    }
    //getUserdata('604019', 'username', $conn);

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
        return getAnySQL('std_2563_checktest', $data, 'id', $id, $conn);
    }

    function saveStdCheckdata($id, $data, $val, $conn) {
        if (saveAnySQL('std_2563_checktest', $data, $val, 'id', $id, $conn)) return true;
        return false;
    }

    function saveStdCheckdataWholeClass($grade, $class, $date, $val, $conn) {
        return mysqli_query($conn, "UPDATE `std_2563_checktest` SET `$date` = $val WHERE `grade` = '$grade' AND `class` = '$class'");
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

    function isValidForumID($id, $connForum) {
        $query = "SELECT * FROM `id_$id`";
        $result = mysqli_query($connForum, $query);
        if (mysqli_num_rows($result) > 0) return true;
        return false;
    }

    function isValidPostID($id, $conn) {
        $query = "SELECT * FROM `post` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) return true;
        return false;
    }

    function isVerify($id, $conn) {
        return getUserdata($id, 'isEmailVerify', $conn);
    }

    function getForumPropertiesSQL($sql, $val, $key, $key_val, $conn) {
        return mysqli_fetch_array(mysqli_query($conn, "SELECT `$val` from `$sql` WHERE $key = '$key_val'"), MYSQLI_ASSOC)[$val];
    }

    function saveForumPropertiesSQL($sql, $col, $val, $key, $key_val, $conn) {
        return mysqli_query($conn, "UPDATE `$sql` SET `$col` = $val WHERE `$key` = '$key_val'");
    }

    function getForumDataSQL($sql, $val, $conn) {
        return mysqli_fetch_array(mysqli_query($conn, "SELECT `$val` from `$sql`"), MYSQLI_ASSOC)[$val];
    }

    function saveForumDataSQL($sql, $col, $val, $conn) {
        return mysqli_query($conn, "UPDATE `$sql` SET `$col` = $val WHERE `$key` = '$key_val'");
    }

    function getForumProperties($id, $data, $connForum) {
        return getForumPropertiesSQL('forum_properties', $data, 'id', $id, $connForum);
    }

    function getForumData($id, $data, $connForum) {
        return getForumDataSQL('id_' . $id, $data, $connForum);
    }

    function saveForumProperties($id, $data, $val, $connForum) {
        if (saveForumPropertiesSQL('forum_properties', $data, $val, 'id', $id, $connForum)) return true;
        return false;
    }

    function saveForumData($id, $data, $val, $connForum) {
        if (saveForumDataSQL('id_' . $id, $data, $val, $connForum)) return true;
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

    function getUserIDTag($id, $conn) {
        if (!isValidUserID($id, $conn)) return false;
        return getUserdata($id, 'username', $conn). '#' . $id;
    }

    function generateInfoCard($id, $conn) {

        $profile_grade = getUserdata($id, 'grade', $conn);

        $profile_room = getUserdata($id, 'class', $conn);
        if ($profile_room == 1) $profile_class = "EMSP";
        else if ($profile_room == 5) $profile_class = "วมว.";
        else $profile_class = "ปกติ";

        if (checkPermission('isAdmin', $id, $conn)) $profile_class_detail = "<strong class='font-weight-bold text-danger'>แอดมิน</strong><br>";
        else if (getRole($id, $conn) == "teacher") $profile_class_detail = "<strong class='font-weight-bold text-smd'>อาจารย์</strong><br>";
        else if (getRole($id, $conn) == "alumni") $profile_class_detail = "<strong>ศิษย์เก่า</strong><br>";
        else if (getRole($id, $conn) == "parent") $profile_class_detail = "<strong>ผู้ปกครอง</strong><br>";
        else if (getRole($id, $conn) == "student" && ($profile_grade >= 1 && $profile_grade <= 6)) $profile_class_detail = "<strong>ระดับชั้น</strong> " . $profile_grade . "/" . $profile_room . " (" . $profile_class . ")<br>";
        else $profile_class_detail = "";

        $id_prefix = "รหัสผู้ใช้";
        if (getRole($id, $conn) == "student") $id_prefix = "รหัสนักเรียน";

        $profile_email = getUserdata($id, 'email', $conn);
        if ($profile_email != null) {
            $profile_email = '<strong>อีเมล</strong> <a href="mailto:' . $profile_email . '">'. $profile_email .'</a>';
        }

        $d_th = getDisplayName($id, "TH", $conn);
        $d_en = getDisplayName($id, "EN", $conn);
        return '<h1 class="text-smd font-weight-bold">' . $d_th . '</h1><h4>' . $d_en . '</h4><hr><p><strong>'.$id_prefix.'</strong> ' . $id . '<br>' .$profile_class_detail . $profile_email . '</p>';
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

    function getRole($id, $conn) {
        return getUserdata($id, 'role', $conn);
    }

    function countGrade($grade, $conn) {
        $query = "SELECT `grade` FROM `user` WHERE role = 'student' AND grade = $grade";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result);
    }

    function countRole($role, $conn) {
        $query = "SELECT `role` FROM `user` WHERE role = '$role' AND isAdmin != true";
        if ($role == "admin") $query = "SELECT `role` FROM `user` WHERE role = '$role' OR isAdmin = true";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result);
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

    function createThumbnail($path) {
        $dir = pathinfo($path, PATHINFO_DIRNAME);
        $nam = pathinfo($path, PATHINFO_FILENAME);
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        list($wid, $ht) = getimagesize($path);
        return imageResize($wid/10, "$dir/$nam.thumbnail", $path);
    }

    function imageResize($newWidth, $targetFile, $originalFile) {

        $info = getimagesize($originalFile);
        $mime = $info['mime'];
    
        switch ($mime) {
                case 'image/jpeg':
                        $image_create_func = 'imagecreatefromjpeg';
                        $image_save_func = 'imagejpeg';
                        $new_image_ext = 'jpg';
                        break;
    
                case 'image/png':
                        $image_create_func = 'imagecreatefrompng';
                        $image_save_func = 'imagepng';
                        $new_image_ext = 'png';
                        break;
    
                case 'image/gif':
                        $image_create_func = 'imagecreatefromgif';
                        $image_save_func = 'imagegif';
                        $new_image_ext = 'gif';
                        break;
    
                default: 
                        throw new Exception('Unknown image type.');
        }
    
        $img = $image_create_func($originalFile);
        list($width, $height) = getimagesize($originalFile);
    
        $newHeight = (int) floor(($height / $width) * $newWidth);
        $newWidth = (int) floor($newWidth);
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
        if (file_exists($targetFile)) {
                unlink($targetFile);
        }
        return $image_save_func($tmp, "$targetFile.$new_image_ext");
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
        foreach (listCategory($conn) as $listCategory) {
            if ($listCategory == $category) return true;
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

    function generateForumTopic($topic) {
        $main = '<span class="badge %color% z-depth-0">%title%</span>';
        if ($topic == "general") $main = str_replace("%title%", "พูดคุยทั่วไป", str_replace("%color%", "badge-smd", $main));
        else if ($topic == "knowledge") $main = str_replace("%title%", "รอบรู้เรื่องเรียน", str_replace("%color%", "badge-info", $main));
        else if ($topic == "alumni") $main = str_replace("%title%", "ศิษย์เก่า", str_replace("%color%", "red darken-4", $main));
        else if ($topic == "marketplace") $main = str_replace("%title%", "ตลาดนัด SMD", str_replace("%color%", "badge-success", $main));
        else if ($topic == "bugreport") $main = str_replace("%title%", "แจ้งปัญหาการใช้งาน", str_replace("%color%", "purple", $main));
        else if ($topic == "suggestion") $main = str_replace("%title%", "เสนอแนะ", str_replace("%color%", "indigo", $main));
        else if ($topic == "updatelog") $main = str_replace("%title%", "อัพเดทเว็บไซต์", str_replace("%color%", "pink lighten-1", $main));
        return $main;
    }

    function isDarkMode() {
        if (isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'] == true) return true;
        else return false;
    }

    function sendFileToIMGHost($file) {
        $data = array(
            'img' => new CURLFile($file['tmp_name'],$file['type'], $file['name']),
        ); 
        
        //**Note :CURLFile class will work if you have PHP version >= 5**
        
         $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://img.p0nd.ga/upload.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60000);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
        
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $msg = FALSE;
        } else {
            $msg = $response;
        }
        
        curl_close($ch);
        return $msg;
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
                    list($ogwidth, $ogheight, $ogtype, $ogattr) = getimagesize("../static/images/default/thumbnail.jpg");
                    $cover = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/static/images/default/thumbnail.jpg";
                } else {
                    list($ogwidth, $ogheight, $ogtype, $ogattr) = getimagesize($cover);
                    $cover = str_replace("..", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'], $cover);
                }
                ?>
    <meta property="og:image" content="<?php echo $cover; ?>" />
    <meta property="og:image:width" content="<?php echo $ogwidth; ?>" />
    <meta property="og:image:height" content="<?php echo $ogheight; ?>" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <title><?php echo $title;?> | โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
    <meta property="og:description" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
    <link rel="image_src" href="<?php echo $cover; ?>" />
            <?php }

        } else if ((strpos($current_url, "/profile/") || strpos($current_url, "/id/")) && isset($_GET['id'])) {
            if (isValidUserID($_GET['id'], $conn) || isValidUserID(getUserID($_GET['id'], 'username', $conn), $conn)) {
                $id = isValidUserID($_GET['id'], $conn) ? $_GET['id'] : getUserID($_GET['id'], 'username', $conn);
                $cover = getProfilePicture($id, $conn);
                $title = getUserdata($id, 'firstname', $conn) . ' ' . getUserdata($id, 'lastname', $conn) . ' ('. $id .')';
                $cover = str_replace("..", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'], $cover);
            ?>
            
    <meta property="og:image" content="<?php echo $cover; ?>" />
    <meta property="og:title" content="โปรไฟล์ของ <?php echo $title;?>" />
    <title>โปรไฟล์ของ <?php echo $title;?> | โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
    <meta property="og:description" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
    <link rel="image_src" href="<?php echo $cover; ?>" />
        <?php } ?>

        <?php } else { ?>
        <meta property="og:image" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']; ?>/static/images/default/thumbnail.jpg" />
        <meta property="og:title" content="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)" />
        <title>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)</title>
        <meta property="og:description" content="123 มหาวิทยาลัยขอนแก่น โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ถนนมิตรภาพ ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40002 โทรศัพท์ / โทรสาร 043202044" />
        <link rel="image_src" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']; ?>/static/images/logo/smdlogo.jpg" />
        <?php } ?>
        <meta name="twitter:card" content="summary"></meta>
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
        window.location = "../login/";
    });
</script>
<?php die(); }} ?>

<?php
    function needPermission($perm, $conn) {
    if (!isset($_SESSION['id']) || !isLogin()) { needLogin(); die(); return false; }
    if (!getUserdata($_SESSION['id'], $perm, $conn) && !getUserdata($_SESSION['id'], 'isAdmin', $conn)) { ?>
<script>
    swal({
        title: "ACCESS DENIED",
        text: "You don't have enough permission!",
        icon: "warning"
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
                    window.location = "../logout/";
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
<?php function warningSwal($title,$name) { ?>
    <script>
    swal({
        title: "<?php echo $title; ?>",
        text: "<?php echo $name; ?>",
        icon: "warning"
    });
    </script>
<?php } ?>
<?php function errorSwal($title,$name) { ?>
    <script>
    swal({
        title: "<?php echo $title; ?>",
        text: "<?php echo $name; ?>",
        icon: "error"
    });
    </script>
<?php } ?>
<?php function successSwal($title,$name) { ?>
    <script>
    swal({
        title: "<?php echo $title; ?>",
        text: "<?php echo $name; ?>",
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
