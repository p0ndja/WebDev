<?php
    require '../../global/connect.php';

    //กรณี Login
if (isset($_POST['login_submit'])) {
    $user = $_POST['login_username'];
    $pass = $_POST['login_password']; $md5_pass = md5($pass);
    
    if (!isset($_POST['login_username'], $_POST['login_password'])) {
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้งานและรหัสผ่านให้ครบถ้วน";
        header("Location: ../../login/");
    }

    if($loginResult = userLogin($user, $md5_pass, $conn)) {
        //User found and match with password (function in global/function.php)
        session_regenerate_id();
        $_SESSION['id'] = $loginResult->getID();
        $_SESSION['real_id'] = $loginResult->getID();
        $_SESSION['username'] = $loginResult->getUsername();
        $_SESSION['name'] = $loginResult->getName();
        $_SESSION['userData'] = $loginResult;

        if ($_GET['method'] == "email") {
            $_SESSION['swal_success'] = "ยืนยันอีเมลสำเร็จ";
            $_SESSION['swal_success_msg'] = "ยินดีต้อนรับ! " . $_SESSION['name'];
            header("Location: ../../home/");
        }

        if (isset($_POST['method'])) {
            $_SESSION['swal_success'] = "เข้าสู่ระบบสำเร็จ";
            if (isVerify($_SESSION['id'], $conn)) $_SESSION['swal_success_msg'] = "ยินดีต้อนรับ! " . $_SESSION['name'];
            else $_SESSION['swal_success_msg'] = "อย่าลืมเข้าไปยืนยันตัวตนทางอีเมลนะครับ";
            
            if ($_POST['method'] == "loginPage") {
                header("Location: ../../home/");
            } else if ($_POST['method'] == "loginNav") {
                back();
            } else {
                header("Location: ../../home/");
            }
        } else {
            $_SESSION['swal_success'] = "เข้าสู่ระบบสำเร็จ";
            $_SESSION['swal_success_msg'] = "ยินดีต้อนรับ! " . $_SESSION['name'];    
            back();
        }

    } else {
        $_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
        header("Location: ../../login/");
    }
}

    //กรณี Register
if (isset($_POST['register_submit'])) {
    $user = $_POST['register_username'];
    $pass = md5($_POST['register_password']);
    $id = $_POST['register_id'];
    $citizen_id = $_POST['register_citizen_id'];
    $firstname = $_POST['register_firstname'];
    $lastname = $_POST['register_lastname'];
    $email = $_POST['register_email'];
    $firstname_en = $_POST['register_firstname_en'];
    $lastname_en = $_POST['register_lastname_en'];
    $prefix = $_POST['register_prefix'];
    $grade = $_POST['register_grade'];
    $class = $_POST['register_class'];

    //ลองเอาค่าต่าง ๆ ไปดูว่ามีผู้ใช้นี้อยู่ในระบบแล้วรึยัง
    $query1 = "SELECT * FROM `user` WHERE username = '$user'";
    $query2 = "SELECT * FROM `user` WHERE citizen_id = '$citizen_id'";
    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

    if (! $result1) {
        die('Could not get data: ' . mysqli_error($conn));
    }

    //กรณีมีข้อมูลอยู่แล้ว จะ return ค่าเป็น 1
    if (mysqli_num_rows($result1) == 1) {
        $_SESSION['error'] = "มีชื่อผู้ใช้นี้อยู่แล้ว";
        header("Location: ../../register/");
    } else if (mysqli_num_rows($result2) == 1) {
        $_SESSION['error'] = "รหัสบัตรประชาชนนี้เคยใช้ในการสมัครเข้าใช้งานไปแล้ว";
        header("Location: ../../register/");
    } else {

        $role = $_POST['register_type'];

        if ($role != "student") {

            $grade = null;
            $class = null;

            $query_getID = "SELECT `id` FROM `user` WHERE role = '$role' ORDER BY id DESC";
            $result_getID = mysqli_query($conn, $query_getID);
            $lastID = mysqli_fetch_array($result_getID, MYSQLI_ASSOC)['id'];
            while(mysqli_num_rows(mysqli_query($conn, "SELECT `id` FROM `user` WHERE role = '$role' AND id = $lastID ORDER BY id DESC")) > 0) {
                $lastID++;
            }
            $id = $lastID;

        }

        $childID = null;
        if ($role == "parent") $childID = $_POST['register_childID'];

        $finaldir = null;
        if(isset($_FILES['upload']) && $_FILES['upload']['name'] != "") {
            if ($_FILES['upload']['name']) {
                if (!$_FILES['upload']['error']) {
                    $name = "Avatar";
                    $ext = explode('.', $_FILES['upload']['name']);
                    $filename = $name . '.' . $ext[1];
        
                    if (!file_exists('../file/profile/'. $id .'/')) {
                        mkdir('../file/profile/'. $id .'/');
                    }
        
                    $destination = '../file/profile/'. $id .'/' . $filename; //change this directory
                    $location = $_FILES["upload"]["tmp_name"];
                    move_uploaded_file($location, $destination);
                    $finaldir = '../file/profile/'. $id .'/' . $filename;//change this URL
                }
            }
        }
        
        $query_final = "INSERT INTO `user` (id, username, password, citizen_id, prefix, firstname, lastname, firstname_en, lastname_en, email, role) VALUES ($id, '$user', '$pass', $citizen_id, '$prefix', '$firstname', '$lastname', '$firstname_en', '$lastname_en', '$email', '$role')";
        $result_final = mysqli_query($conn, $query_final);

        $query_achi = "INSERT INTO `achievement` (id) VALUES ($id)";
        $result_achi = mysqli_query($conn, $query_achi);

        $query_profile = "INSERT INTO `profile` (id, profile) VALUES ($id, '$finaldir')";
        $result_profile = mysqli_query($conn, $query_profile);

        if (! $result_final) {
        }

        if (! $result_profile) {
            die('Could not create profile ' . mysqli_error($conn));
        }

        if (! $result_achi) {
            die('Could not add achievement ' . mysqli_error($conn));
        }

        //แสดงค่ากลับหาผู้ใช้
        if (! $result_final) {
            die('Could not register ' . mysqli_error($conn));
        } else {
            if ($role == "student") {
                $query_class = "UPDATE `user` SET grade = '$grade', class = '$class' WHERE id = $id";
                $result_class = mysqli_query($conn, $query_class);
                if (! $result_class) {
                    die('Could not add parent ID ' . mysqli_error($conn));
                }
            } else if ($role == "parent") {
                $query_parentID = "UPDATE `user` SET parentID = '$childID' WHERE id = $id";
                $result_parentID = mysqli_query($conn, $query_parentID);
                if (! $result_parentID) {
                    die('Could not add parent ID ' . mysqli_error($conn));
                }
            }

            $_SESSION['error'] = null;
            $_SESSION['swal_success'] = "สมัครผู้ใช้งานสำเร็จ";
            $_SESSION['swal_success_msg'] = "อย่าลืมเข้าไปยืนยันตัวตนทางอีเมลนะครับ";
            $_SESSION['username'] = $user;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $_POST['register_firstname'] . ' ' . $_POST['register_lastname'];
            header("Location: ../verify/mail.php?key=" . $pass . "&email=" . $email . "&name=" . $_SESSION['name'] . "&method=reg");
        }
    }
}
if (isset($_GET['user']) && isset($_GET['pass'])) {
    $user = $_GET['user'];
    $pass = $_GET['pass']; $md5_pass = md5($pass);

    if($loginResult = userLogin($user, $md5_pass, $conn)) {
        //User found and match with password (function in global/function.php)
        session_regenerate_id();
        $_SESSION['id'] = $loginResult->getID();
        $_SESSION['real_id'] = $loginResult->getID();
        $_SESSION['username'] = $loginResult->getUsername();
        $_SESSION['name'] = $loginResult->getName();

        if (isset($_GET['method'])) {
            if ($_GET['method'] == "normal") {
                $_SESSION['swal_success'] = "เข้าสู่ระบบสำเร็จ";
                if (isVerify($_SESSION['id'], $conn)) $_SESSION['swal_success_msg'] = "ยินดีต้อนรับ! " . $_SESSION['name'];
                else $_SESSION['swal_success_msg'] = "อย่าลืมเข้าไปยืนยันตัวตนทางอีเมลนะครับ";
                header("Location: ../../home/");
            } else if ($_GET['method'] == "email") {
                $_SESSION['swal_success'] = "ยืนยันอีเมลสำเร็จ";
                $_SESSION['swal_success_msg'] = "ยินดีต้อนรับ! " . $_SESSION['name'];
                header("Location: ../../home/");
            } else if ($_GET['method'] == "reset") {
                header("Location: ../../resetpassword/");
            }
        } else {
            echo "Accept! Welcome $id";
        }

    } else {
        echo "Wrong Username / Password or Missing argument to login";
    }
}
?>