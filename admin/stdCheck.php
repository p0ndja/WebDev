<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <?php needPermission('isTeacher', $conn); ?>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="card card-body card-text mb-3">
            <!--Table-->
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="card card-body card-text">
                        <h1 class="text-center font-weight-bold text-smd">ใบเช็คชื่อ</h1>
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
                        <div class="md-form">
                            <input placeholder="กรุณาเลือกวัน" type="text" id="date-picker-example"
                                class="form-control datepicker"
                                <?php if (isset($_GET['date'])) echo 'value="' . $_GET['date'] . '"'; else echo 'value="' . curDate() . '"'; ?>>
                            <label for="date-picker-example" class="text-primary">วันที่ / Date</label>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-warning btn-lg z-depth-0" id="btn_query" name="btn_query"><i class="fas fa-download"></i> ดึงข้อมูล</a>
                            <a class="btn btn-success btn-lg z-depth-0" id="btn_save" name="btn_save"><i class="fas fa-save"></i> บันทึก</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <?php if (isset($_GET['grade']) && isset($_GET['class']) && isset($_GET['date'])) { ?>
                    <div class="text-center">
                        <h2>คุณกำลังเช็คชื่อระดับชั้น ม.<?php echo $_GET['grade'] . '/' . $_GET['class']; ?></h2>
                        <h4>ประจำวันที่ <?php echo $_GET['date']; ?></h4>
                    </div>
                    <?php }?>
                    <div class='table-responsive <?php if (!isset($_GET['grade'])) echo "d-none"?>'>
                        <table id="tblData" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap text-center">รหัสนักเรียน</th>
                                    <th class="text-nowrap text-center" colspan="3">ชื่อ - สกุล</th>
                                    <th>
                                        <div class="custom-control custom-checkbox text-center">
                                            <input type="checkbox" class="custom-control-input thisisawholeclasscheck" id="checkAll">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!(isset($_GET['grade']) && isset($_GET['class']) && isset($_GET['date']))) {
                                    $_GET['grade'] = 1; $_GET['class'] = 1; $_GET['date'] = curDate();
                                }

                                    $g = $_GET['grade']; $c = $_GET['class']; $d = str_replace("/", "-", $_GET['date']); $t = $_SESSION['id'];
                                    
                                    $r = mysqli_query($conn, "ALTER TABLE `std_2563_check` ADD COLUMN IF NOT EXISTS `$t` LONGTEXT DEFAULT NULL");
                                    if (!$r) die('Could not alter data: '.mysqli_error($conn));

                                    $r = mysqli_query($conn, "SELECT * FROM `std_2563_check` WHERE `date` = '$d'");
                                    if (!$r) die('Could not get data: '.mysqli_error($conn));

                                    $whoontoday = null;
                                    if (mysqli_num_rows($r) == 0) { //This date has not been created yet.
                                        $r = mysqli_query($conn, "INSERT INTO `std_2563_check` (`date`) VALUES ('$d')");
                                        if (!$r) die('Error! ' . mysqli_error($conn));
                                    } else {
                                        while ($q = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
                                            $whoontoday .= $q[$t];
                                        }
                                    }

                                    if ($g <= 3) {
                                        $r = mysqli_query($conn, "SELECT * FROM `std_2563` WHERE grade = $g AND class = $c ORDER BY `prefix` ASC,`id` ASC");
                                        if (!$r) die('Could not get data: '.mysqli_error($conn));
                                    } else {
                                        $r = mysqli_query($conn, "SELECT * FROM `std_2563` WHERE grade = $g AND class = $c ORDER BY `prefix` DESC,`id` ASC");
                                        if (!$r) die('Could not get data: '.mysqli_error($conn));
                                    }

                                    $checklist = array();

                                    $i = 0;
                                    while ($t = mysqli_fetch_array($r, MYSQLI_ASSOC)) { $i++; 
                                    array_push($checklist, $t['id']); ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $t['id']; ?></td>
                                    <td class="text-nowrap"><?php echo $t['prefix']; ?></td>
                                    <td class="text-nowrap"><?php echo $t['firstname']; ?></td>
                                    <td class="text-nowrap"><?php echo $t['lastname']; ?></td>
                                    <td>
                                        <div class="custom-control custom-checkbox text-center">
                                            <input type="checkbox" class="custom-control-input thisisastudentcheck"
                                                id="<?php echo $t['id']; ?>" name="<?php echo $t['id']; ?>" <?php if ((strpos($whoontoday, $t['id']) !== false)) echo "checked";?>>
                                            <label class="custom-control-label" for="<?php echo $t['id']; ?>"></label>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
    <script>
        $('input.thisisawholeclasscheck[type="checkbox"]').click(function (e) {
            $.ajax({
                url: "stdCheck_save",
                type: "POST",
                //pass data like this 
                data: {
                    checkwhole_class: "<?php echo $c; ?>",
                    checkwhole_grade: "<?php echo $g; ?>",
                    checkwhole_date: "<?php echo $d; ?>",
                    checkwhole_val: e.target.checked
                },
                cache: false,
                success: function (data) {
                    if (data) {
                        if (e.target.checked) {
                            toastr.success("ห้อง: ม.<?php echo "$g";?>/<?php echo "$c";?>" + "<br>สถานะ: เข้าเรียนทั้งห้อง");
                        } else {
                            toastr.warning("ห้อง: ม.<?php echo "$g";?>/<?php echo "$c";?>" + "<br>สถานะ: ไม่เข้าเรียนทั้งห้อง");
                        }
                    } else {
                        toastr.error("ERROR - พบข้อผิดพลาด<br>ไม่สามารถปรับค่า 'checkWholeClass' ได้<br>กรุณาแจ้ง Webmaster");
                    }
                }
            });
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        //Get current selection grade,class
        $('#grade option[value=<?php if (isset($_GET['grade'])) echo $_GET['grade']; else echo 1; ?>]').attr('selected', 'selected');
        $('#class option[value=<?php if (isset($_GET['class'])) echo $_GET['class']; else echo 1; ?>]').attr('selected', 'selected');

        //Query Data
        $("#btn_query").click(function () {
            window.location.href = "?grade=" + $("#grade").val() + "&class=" + $("#class").val() + "&date=" + $(".datepicker").val();
        });

        //On check checkbox
        $('input.thisisastudentcheck[type="checkbox"]').on('change', function (e) {
            $.ajax({
                url: "stdCheck_save",
                type: "POST",
                //pass data like this 
                data: {
                    name: e.target.name,
                    col: "<?php echo $d; ?>",
                    bool: e.target.checked
                },
                cache: false,
                success: function (data) {
                    if (data) {
                        if (e.target.checked) {
                            toastr.success("รหัสนักเรียน: " + e.target.checked + e.target.name + " <br>สถานะ: เข้าเรียน");
                        } else {
                            toastr.warning("รหัสนักเรียน: "  + e.target.checked + e.target.name + " <br>สถานะ: ไม่เข้าเรียน");
                        }
                    } else {
                        toastr.error("ERROR - พบข้อผิดพลาด<br>ไม่สามารถปรับค่า '" + e.target.name + "' ได้<br>กรุณาแจ้ง Webmaster");
                    }
                }
            });
        });

        $("#grade").change(function () {
            if ($(this).val() <= 3) {
                $('#class option[value="5"]').remove();
            } else {
                $('#class').append('<option value="5">ห้อง 5</option>');
            }
        });

        $(document).ready(function() {
            if ($("#grade").val() <= 3) {
                $('#class option[value="5"]').remove();
            } else {
                $('#class').append('<option value="5">ห้อง 5</option>');
            }
        });

        $('.datepicker').pickadate({
            format: 'dd/mm/yyyy',
            formatSubmit: 'yyyymmdd',
            max: new Date(),
            disable: [1, 7]
        });
    </script>
</body>

</html>