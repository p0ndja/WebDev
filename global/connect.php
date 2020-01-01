<?php
    ob_start();
    session_start();
    //ตรงนี้ให้ปรับค่าตามเซิฟเวอร์แต่ละเครื่องนะครับ
    //ข้อมูลในส่วนนี้เป็นความลับ ไม่สามารถเผยแพร่ลงสาธารณะได้ครับ
    $dbhost = "IP เซิฟเวอร์ MySQL ของคุณ";
    $dbuser = "Username สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbpass = "Password สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbdatabase = "Database ที่ต้องการให้ระบบใช้งาน";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);
    mysqli_set_charset($conn, 'utf8');

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }
?>