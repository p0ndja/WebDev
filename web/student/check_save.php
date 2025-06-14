<?php
    require '../global/connect.php';
    if (isset($_POST['name']) && isset($_POST['col']) && isset($_POST['bool'])) {

        $d = $_POST['col'];
        $t = $_SESSION['id'];

        $whoontoday = null;
        $r = mysqli_query($conn, "SELECT * FROM `std_2563_check` WHERE `date` = '$d'");
        if (!$r) die('Could not get data: '.mysqli_error($conn));
        while ($q = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
            $whoontoday .= $q[$t];
        }

        if ($_POST['bool'] == "true") {
            $whoontoday .= "|" . $_POST['name'];
            $r = mysqli_query($conn, "UPDATE `std_2563_check` SET `$t` = '$whoontoday' WHERE `date` = '$d'");
            if (!$r) die('Could not get data: '.mysqli_error($conn));
            return true;
        } else {
            $whoontoday = str_replace($_POST['name'], "", str_replace("|" . $_POST['name'], "", $whoontoday));            
            $r = mysqli_query($conn, "UPDATE `std_2563_check` SET `$t` = '$whoontoday' WHERE `date` = '$d'");
            if (!$r) die('Could not get data: '.mysqli_error($conn));
            return true;
        }        
    }

    if(isset($_POST['checkwhole_class']) && isset($_POST['checkwhole_grade']) && isset($_POST['checkwhole_date']) && isset($_POST['checkwhole_val'])) {

        $d = $_POST['checkwhole_date'];
        $t = $_SESSION['id'];

        $c = $_POST['checkwhole_class'];
        $g = $_POST['checkwhole_grade'];

        $whoontoday = null;
        $r = mysqli_query($conn, "SELECT * FROM `std_2563_check` WHERE `date` = '$d'");
        if (!$r) die('Could not get data: '.mysqli_error($conn));
        while ($q = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
            $whoontoday .= $q[$t];
        }

        if ($_POST['checkwhole_val'] == "true") {
            $r = mysqli_query($conn, "SELECT * FROM `std_2563` WHERE `grade` = $g AND `class` = $c");
            if (!$r) die('Could not get data: '.mysqli_error($conn));
            while ($q = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                if (strpos($whoontoday, $q['id']) === false)
                    $whoontoday .= "|" . $q['id'];
            }
            $r = mysqli_query($conn, "UPDATE `std_2563_check` SET `$t` = '$whoontoday' WHERE `date` = '$d'");
            if (!$r) die('Could not get data: '.mysqli_error($conn));
        } else {
            $r = mysqli_query($conn, "SELECT * FROM `std_2563` WHERE `grade` = $g AND `class` = $c");
            if (!$r) die('Could not get data: '.mysqli_error($conn));
            while ($q = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $whoontoday = str_replace($q['id'], "", str_replace("|" . $q['id'], "", $whoontoday));
            }
            $r = mysqli_query($conn, "UPDATE `std_2563_check` SET `$t` = '$whoontoday' WHERE `date` = '$d'");
            if (!$r) die('Could not get data: '.mysqli_error($conn));
        }
    }
?>