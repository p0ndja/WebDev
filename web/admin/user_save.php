<?php
    require('../global/connect.php');
    //Personal Zone
    $id = $_POST['real_id'];
    $newID = $_POST['id'];
    $newUSER = $_POST['username'];
    $newPASSWORD = $_POST['password'];
    if (empty($newPASSWORD))    $newPASSWORD = getUserdata($id,'password',$conn);
    else                        $newPASSWORD = md5($newPASSWORD);
    $newFIRSTNAME = $_POST['firstname'];
    $newLASTNAME = $_POST['lastname'];
    $newFIRSTNAME_EN = $_POST['firstname_en'];
    $newLASTNAME_EN = $_POST['lastname_en'];
    $newEMAIL = $_POST['email']; //TODO: WRITE RE-CONFIRM EMAIL SYSTEM
    $newCITIZENID = $_POST['citizen_id'];
    $q = "UPDATE `user` SET username = '$newUSER', password = '$newPASSWORD', firstname = '$newFIRSTNAME', lastname = '$newLASTNAME', firstname_en = '$newFIRSTNAME_EN', lastname_en = '$newLASTNAME_EN', email = '$newEMAIL', citizen_id = $newCITIZENID WHERE id = $id";
    $r = mysqli_query($conn, $q);
    if (!$r) die('Could not update personal information: '.mysqli_error($conn));

    //Role zone
    $newROLE = $_POST['real_role'];
    $newROLE_parentID = "null"; $newROLE_grade = "null"; $newROLE_class = "null";
    if ($newROLE == "parent") $newROLE_parentID = $_POST['childID'];
    if ($newROLE == "student") {
        $newROLE_grade = $_POST['grade'];
        $newROLE_class = $_POST['class'];
    }
    $q = "UPDATE `user` SET role = '$newROLE', parentID = '$newROLE_parentID', grade = '$newROLE_grade', class = '$newROLE_class' WHERE id = $id";
    $r = mysqli_query($conn, $q);
    if (!$r) die('Could not update role: '.mysqli_error($conn));

    //Permission zone
    $newPERM = $_POST['perm'];
    $permLIST = ['isAdmin', 'isTeacher', 'isNewsReporter', 'isRegistrator', 'isSubjectRegistrator', 'isForumEditor', 'isTimetableDesigner'];
    $perm = array();
    foreach ($permLIST as $p) {
        $perm[$p] = 0;
    }

    foreach ($newPERM as $p) {
        $perm[$p] = 1;
    }
    
    if (!empty($newPERM['isAdmin'])) {
        foreach ($permLIST as $p) {
            $perm[$p] = 1;
        }
    }

    $newPERM_isAdmin = $perm['isAdmin'];
    $newPERM_isTeacher = $perm['isTeacher'];
    $newPERM_isNewsReporter = $perm['isNewsReporter'];
    $newPERM_isForumEditor = $perm['isForumEditor'];
    $newPERM_isRegistrator = $perm['isRegistrator'];
    $newPERM_isSubjectRegistrator = $perm['isSubjectRegistrator'];
    $newPERM_isTimetableDesigner = $perm['isTimetableDesigner'];
    $q = "UPDATE `user` SET isAdmin = '$newPERM_isAdmin', isTeacher = '$newPERM_isTeacher', isNewsReporter = '$newPERM_isNewsReporter', isForumEditor = '$newPERM_isForumEditor', isRegistrator = '$newPERM_isRegistrator', isSubjectRegistrator = '$newPERM_isSubjectRegistrator', isTimetableDesigner = '$newPERM_isTimetableDesigner' WHERE id = $id";
    $r = mysqli_query($conn, $q);
    if (!$r) die('Could not update permission: '.mysqli_error($conn));

    if ($newID != $id) {
        $q = "UPDATE `user` SET id = $newID WHERE id = $id";
        $r = mysqli_query($conn, $q);
        if (!$r) die('Could not update permission: '.mysqli_error($conn));

        $q = "UPDATE `achievement` SET id = $newID WHERE id = $id";
        $r = mysqli_query($conn, $q);
        if (!$r) die('Could not update permission: '.mysqli_error($conn));

        if (is_dir("../file/profile/" . $id . "/")) rename("../file/profile/" . $id . "/", "../file/profile/" . $newID . "/");
        $profile_url = str_replace("/" . $id . "/", "/" . $newID . "/", getProfiledata($id, 'profile', $conn));
        $bg_url = str_replace("/" . $id . "/", "/" . $newID . "/", getProfiledata($id, 'background', $conn));
        $editor_url = str_replace("/" . $id . "/", "/" . $newID . "/", getProfiledata($id, 'greetings', $conn));
        $q = "UPDATE `profile` SET id = $newID, greetings = '$editor_url', profile = '$profile_url', background = '$bg_url' WHERE id = $id";
        $r = mysqli_query($conn, $q);
        if (!$r) die('Could not update permission: '.mysqli_error($conn));
    }

    header("Location: ../user/" . $newID);
?>