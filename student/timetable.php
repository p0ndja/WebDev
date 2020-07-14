<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container center" id="container" style="padding-top: 88px">
        <div class="card mb-3">
            <div class="card-body">
                <div class="justify-content-center">
                    <center>
                        <h1>ตารางเรียน</h1>
                        <form class="form-inline justify-content-center" method="GET" action="../student/timetable_redirect.php">
                            <div class="form-row text-center justify-content-center">
                                <label for="grade" class="col-form-label col-md-auto">ระดับชั้น </label>
                                <div class="align-items-center col-md-auto d-flex">
                                    <select class="form-control" id="grade" name="grade">
                                        <option value="1">มัธยมศึกษาปีที่ 1</option>
                                        <option value="2">มัธยมศึกษาปีที่ 2</option>
                                        <option value="3">มัธยมศึกษาปีที่ 3</option>
                                        <option value="4">มัธยมศึกษาปีที่ 4</option>
                                        <option value="5">มัธยมศึกษาปีที่ 5</option>
                                        <option value="6">มัธยมศึกษาปีที่ 6</option>
                                    </select>
                                </div>
                                <label for="class" class="col-form-label col-md-auto">ห้อง </label>
                                <div class=" align-items-center col-md-auto d-flex">
                                    <select class="form-control" id="class" name="class">
                                        <option value="1">ห้อง 1</option>
                                        <option value="2">ห้อง 2</option>
                                        <option value="3">ห้อง 3</option>
                                        <option value="4">ห้อง 4</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-md">เปิด</button>
                        </form>
                    </center>
                </div>

                <div class="table-responsive <?php if (!isset($_GET['grade'])) echo "d-none"; ?>">
                    <table class="table table-bordered text-center">
                        <thead>
                            <?php 
                    if (!isset($_GET['grade'])) $grade = 1; else $grade = $_GET['grade'];
                    if (!isset($_GET['class'])) $class = 1; else $class = $_GET['class'];
                    $c = 8; if (($grade <= 3 && ($class == 3 || $class == 4)) || ($grade >= 4 && ($class >= 2 && $class <= 4))) $c = 7;
                    ?>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">[1]<br><b>08.30-09.20</b></th>
                                <th scope="col">[2]<br><b>09.20-10.10</b></th>
                                <th scope="col">[3]<br><b>10.20-11.10</b></th>
                                <th scope="col">[4]<br><b>11.10-12.00</b></th>
                                <th scope="col">[5]<br><b>13.00-13.50</b></th>
                                <th scope="col">[6]<br><b>13.50-14.40</b></th>
                                <th scope="col">[7]<br><b>14.50-15.40</b></th>
                                <?php if ($c == 8) { ?><th scope="col">[8]<br><b>15.40-16.30</b></th><?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $json_txt = file_get_contents("https://smd.pondja.com/api/timetable");
                                $students = json_decode($json_txt, true);
                                
                                $class = $grade . "0" . $class;
                                $day = array("Mon","Tue","Wed","Thu","Fri");
                                $dayTH = array("จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์");
                                for ($i = 0; $i < 5; $i++) { ?>
                            <tr>
                                <th scope="row"><?php echo $dayTH[$i]; ?></th>
                                <?php 
                            for ($o = 1; $o <= $c; $o++) { ?>
                                <td class="text-nowrap">
                                    <?php
                                        if (empty($students["class"][$day[$i]][$o][$class])) {
                                            echo "-";
                                        } else {
                                            $subject = $students["class"][$day[$i]][$o][$class]["subject"];
                                            $teacher = $students["class"][$day[$i]][$o][$class]["teacher"];
                                            echo "<h6 class='font-weight-bold'>" . $subject . "</h6>" . $teacher;
                                        }
                                    ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-secondary <?php if (!isset($_GET['grade'])) echo "d-none"; ?>" href="../file/timetable/<?php echo $class . ".jpg"; ?>">พิมพ์ <i class="fas fa-print"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <?php require '../global/popup.php'; ?>
    <div class="d-none">
    <?php require '../global/footer.php'; ?>
    </div>
    <script>
            //Get current selection grade,class
            $(document).ready(function() {
                var grade = <?php if (isset($_GET['grade'])) echo $_GET['grade']; else echo 1; ?>;
                if (grade >= 4) $('#class').append('<option value="5">ห้อง 5</option>');
                $('#grade option[value=<?php if (isset($_GET['grade'])) echo $_GET['grade']; else echo 1; ?>]').attr('selected', 'selected');
                $('#class option[value=<?php if (isset($_GET['class'])) echo $_GET['class']; else echo 1; ?>]').attr('selected', 'selected');
            });
            
            
            $("#grade").change(function () {
            if ($(this).val() <= 3) {
                $('#class option[value="5"]').remove();
            } else {
                $('#class').append('<option value="5">ห้อง 5</option>');
            }
        });
    </script>
</body>

</html>