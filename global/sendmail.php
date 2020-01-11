<?php

$emailto='palapon2545@gmail.com'; //อีเมล์ผู้รับ
$subject="ทดสอบระบบ"; //หัวข้อ
$header.="Content-type: text/html; charset=utf-8\n";
$header.="from: ทดสอบ E-mail : test@pondja.com"; //ชื่อและอีเมลผู้ส่ง
$messages.= "TEXT"
$send_mail=mail($emailto, $subject, $messages, $header);

if( !$send_mail) {
    echo"ยังไม่สามารถส่งเมลล์ได้ในขณะนี้";
}

else {
    echo "ส่งเมลล์สำเร็จ";
}

?>