<?php
    require '../../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    function convertIDtoSubject($id){ 
        if ($id >= 1 && $id <= 5) {
            return "ภาษาไทย";
        } else if ($id >= 6 && $id <= 15) {
            return "คณิตศาสตร์";
        } else if ($id == 29 || $id == 30) {
            return "เทคโนโลยี";
        } else if ($id >= 16 && $id <= 33) {
            return "วิทยาศาสตร์";
        } else if ($id >= 34 && $id <= 36) {
            return "การงานอาชีพ";
        } else if (($id >= 37 && $id <= 45) || $id == 48) {
            return "ภาษาอังกฤษ";
        } else if ($id == 46 || $id == 47) {
            return "จีน / ญี่ปุ่น";
        } else if ($id >= 49 && $id <= 55) {
            return "สังคมศึกษา";
        } else if ($id == 56 || $id == 59) {
            return "ดนตรี - นาฏศิลป์";
        } else if ($id == 57 || $id == 58) {
            return "ศิลปะ";
        } else if ($id >= 60 && $id <= 63) {
            return "สุขศึกษา - พลศึกษา";
        } else if ($id == 64) {
            return "แนะแนว";
        } else if ($id >= 65 && $id <= 69) {
            return "";
        } else {
            return "ERR";
        }
    }

    $q = "SELECT * FROM `timetable_2563`";
    $r = mysqli_query($conn, $q);

    $arr = array();
    $arr["class"] = array();

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $listday = array("Mon_1","Mon_2","Mon_3","Mon_4","Mon_5","Mon_6","Mon_7","Mon_8","Tue_1","Tue_2","Tue_3","Tue_4","Tue_5","Tue_6","Tue_7","Tue_8","Wed_1","Wed_2","Wed_3","Wed_4","Wed_5","Wed_6","Wed_7","Wed_8","Thu_1","Thu_2","Thu_3","Thu_4","Thu_5","Thu_6","Thu_7","Thu_8","Fri_1","Fri_2","Fri_3","Fri_4","Fri_5","Fri_6","Fri_7","Fri_8");
        foreach($listday as $day) {
            if ($row[$day] != null) {
                $dd = explode("_", $day);
                foreach (explode("|", $row[$day]) as $s) {
                    if (empty($arr["class"][$dd[0]][$dd[1]][$s]["teacher"])) 
                        $arr["class"][$dd[0]][$dd[1]][$s]["teacher"] = $row['name'];
                    else 
                        $arr["class"][$dd[0]][$dd[1]][$s]["teacher"] .= " / " . $row['name'];

                    $arr["class"][$dd[0]][$dd[1]][$s]["subject"] = convertIDtoSubject($row['id']);
                    
                }
            }
        }
    }

    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>