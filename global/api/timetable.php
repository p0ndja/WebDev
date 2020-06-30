<?php
    require '../../global/connect.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    function convertIDtoSubject($id){ 
        if ($id >= 1 && $id <= 5) {
            return "ภาษาไทย";
        } else if ($id >= 6 && $id <= 13) {
            return "คณิตศาสตร์";
        } else if ($id >= 14 && $id <= 36) {
            return "วิทยาศาสตร์";
        } else if ($id == 28 || $id == 29) {
            return "เทคโนโลยี";
        } else if ($id >= 37 && $id <= 39) {
            return "การงานอาชีพ";
        } else if (($id >= 40 && $id <= 49) || $id == 52) {
            return "ภาษาอังกฤษ";
        } else if ($id == 50 || $id == 51) {
            return "จีน / ญี่ปุ่น";
        } else if ($id >= 53 && $id <= 59) {
            return "สังคมศึกษา";
        } else if ($id == 60 || $id == 63) {
            return "ดนตรี - นาฏศิลป์";
        } else if ($id == 61 || $id == 62) {
            return "ศิลปะ";
        } else if ($id >= 64 && $id <= 67) {
            return "สุขศึกษา - พลศึกษา";
        } else if ($id == 68) {
            return "แนะแนว";
        } else if ($id >= 69 && $id <= 73) {
            return "";
        } else {
            return "ERR";
        }
    }

    function method($id) {
        if ($id == 68 || ($id <= 53 && $id >= 57 && $id != 55) || $id == 42 || $id == 46 || $id == 37 || $id == 28 || $id == 20 || $id == 1) return "Discord";
        else return "zoom";
    }

    function isOnlineDate($date, $grade) {
        if ($grade >= 400 && ($date == "Tue" || $date == "Thu" || $date == "Fri")) return true;
        if ($grade < 400 && ($date == "Mon" || $date == "Wed")) return true;
        else return false;
    }

    $q = "SELECT * FROM `timeTable`";
    $r = mysqli_query($conn, $q);

    $arr = array();
    $arr["class"] = array();

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $listday = array("Mon_1","Mon_2","Mon_3","Mon_4","Mon_5","Mon_6","Mon_7","Mon_8","Tue_1","Tue_2","Tue_3","Tue_4","Tue_5","Tue_6","Tue_7","Tue_8","Wed_1","Wed_2","Wed_3","Wed_4","Wed_5","Wed_6","Wed_7","Wed_8","Thu_1","Thu_2","Thu_3","Thu_4","Thu_5","Thu_6","Thu_7","Thu_8","Fri_1","Fri_2","Fri_3","Fri_4","Fri_5","Fri_6","Fri_7","Fri_8");
        foreach($listday as $day) {
            if ($row[$day] != null) {
                $dd = explode("_", $day);
                foreach (explode("|", $row[$day]) as $s) {
                    $arr["class"][$dd[0]][$dd[1]][$s]["teacher"] = $row['name'];
                    $arr["class"][$dd[0]][$dd[1]][$s]["subject"] = convertIDtoSubject($row['id']);
                    $arr["class"][$dd[0]][$dd[1]][$s]["method"] = method($row['id']);
                    $arr["class"][$dd[0]][$dd[1]][$s]["isOnlineDate"] = isOnlineDate($dd[0], $s);
                }
            }
        }
    }

    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>