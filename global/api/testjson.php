<?php
    // อ่านไฟล์
    $json_txt = file_get_contents("http://localhost/WebDev/api/timetable");
    // ถอดรหัส json ให้เป็น array
    $students = json_decode($json_txt, true);
    foreach($students["class"] as $s) {
        if ($students["class"] == $_GET['grade'] && $student["class"] == $_GET['class']) {
            
        }
    }
    
?>