<?php
    include '../global/connect.php';

    //กรณี Login
if (isset($_POST['login_submit'])) {
    $user = $_POST['login_username'];
    $pass = $_POST['login_password']; $md5_pass = md5($pass);

    //ดึงข้อมูลมาเช็คว่า $User ที่ตั้งรหัสผ่านเป็น $Pass มีในระบบรึเปล่า
    $query = "SELECT * FROM `user` WHERE (username = '$user' OR id = '$user') AND (password = '$md5_pass' OR citizen_id = '$pass')";
    $result = mysqli_query($conn, $query);
    if (!$result) die('Could not get data: ' . mysqli_error($conn));

    //ถ้าไม่เจอ User นี้ จะ return เป็น 0
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
    } else {
        //ปกติค่านี้ ถ้าเจอในฐานข้อมูลจะ return ออกมา > 0
        //ตั้งค่าข้อมูลต่าง ๆ ของ User ใส่ SESSION
        $_SESSION['id'] = mysqli_fetch_array($result, MYSQLI_ASSOC)['id'];
        $_SESSION['real_id'] = $_SESSION['id'];
        $_SESSION['username'] = getUserdata($_SESSION['id'], 'username', $conn);
        $_SESSION['name'] = getUserdata($_SESSION['id'], 'firstname', $conn) . ' ' . getUserdata($_SESSION['id'], 'lastname', $conn);
        $_SESSION['shortname'] = getUserdata($_SESSION['id'], 'firstname', $conn);

        $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
    }

    back();
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
    } else if (mysqli_num_rows($result2) == 1) {
        $_SESSION['error'] = "รหัสบัตรประชาชนนี้ ได้ทำการสมัครสมาชิกอยู่แล้ว";
    } else {
        //กรณีนี้ไม่เจอข้อมูลใด ๆ ตรงเลย เลยสามารถสมัครได้
        if(isset($_FILES['upload']) && $_FILES['upload']['name'] != ""){
            $finaldir = base64($_FILES['upload'], $user, 'image');
        } else {
            $finaldir = null;
        }
        
        $query_final = "INSERT INTO `user` (id, username, password, citizen_id, prefix, firstname, lastname, firstname_en, lastname_en, email, grade, class) VALUES ($id, '$user', '$pass', $citizen_id, '$prefix', '$firstname', '$lastname', '$firstname_en', '$lastname_en', '$email', $grade, $class)";
        $result_final = mysqli_query($conn, $query_final);

        $query_achi = "INSERT INTO `achievement` (id) VALUES ($id)";
        $result_achi = mysqli_query($conn, $query_achi);

        $query_profile = "INSERT INTO `profile` (id, profile) VALUES ($id, '$finaldir')";
        $result_profile = mysqli_query($conn, $query_profile);

        //แสดงค่ากลับหาผู้ใช้
        if ($result_final) {
            $_SESSION['error'] = null;
            $_SESSION['success'] = "สมัครผู้ใช้งานสำเร็จ";
            $_SESSION['username'] = $user;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $_POST['register_firstname'] . ' ' . $_POST['register_lastname'];
        } else {
            die('Could not register ' . mysqli_error($conn));
        }

        if (! $result_profile) {
            die('Could not create profile ' . mysqli_error($conn));
        }

        if (! $result_achi) {
            die('Could not add achievement ' . mysqli_error($conn));
        }
    }
    
    back();
}
?>