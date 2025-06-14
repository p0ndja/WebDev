<?php 
    require '../connect.php';

    if (isset($_POST['reset'])) {
        $email = $_POST['reset'];
        $r = "SELECT * FROM `user` WHERE email = '$email'";
        $q = mysqli_query($conn, $r);
        if (! $q) die('Could not lookup database ' . mysqli_error($conn));

        $id = mysqli_fetch_array($q, MYSQLI_ASSOC)['id'];
        $pass = getUserdata($id, 'password', $conn);
        $email = getUserdata($id, 'email', $conn);
        $name = getDisplayname($id, $conn);

        if (mysqli_num_rows($q) == 0) {
            $_SESSION['error'] = "ไม่พบอีเมลนี้ในฐานข้อมูล";
            back();
        } else if (mysqli_num_rows($q) > 1) {
            $_SESSION['error'] = "ไม่สามารถรีเซ็ตรหัสผ่านได้: พบการใช้อีเมลซ้ำมากกว่า 1 ผู้ใช้งาน โปรดติดต่อผู้ดูแลระบบ";
            back();
        } else {
            $_SESSION['swal_success'] = "รีเซ็ตรหัสผ่านสำเร็จ";
            $_SESSION['swal_success_msg'] = "กรุณาตรวจสอบที่อีเมล " . $email . " ของท่านเพื่อดำเนินการต่อ";
            header("Location: ../resetpassword/mail.php?key=$pass&email=$email&name=$name");
        }
    }
?>