<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="card card-body card-text mb-3">
            <!--Table-->
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="card card-body card-text mb-3">
                        <h1 class="text-center font-weight-bold text-smd">ใบเช็คชื่อ</h1>
                        <div class="select-outline">
                            <select class="mdb-select md-form type" id="grade" name="grade" required>
                                <option value="1">มัธยมศึกษาปีที่ 1</option>
                                <option value="2">มัธยมศึกษาปีที่ 2</option>
                                <option value="3">มัธยมศึกษาปีที่ 3</option>
                                <option value="4">มัธยมศึกษาปีที่ 4</option>
                                <option value="5">มัธยมศึกษาปีที่ 5</option>
                                <option value="6">มัธยมศึกษาปีที่ 6</option>
                            </select>
                            <label class="mdb-main-label">ระดับชั้น</label>
                        </div>
                        <div class="select-outline">
                            <select class="mdb-select md-form type" id="class" name="class" required>
                                <option value="1">ห้อง 1</option>
                                <option value="2">ห้อง 2</option>
                                <option value="3">ห้อง 3</option>
                                <option value="4">ห้อง 4</option>
                                <option value="5" id="scius">ห้อง 5</option>
                            </select>
                            <label class="mdb-main-label">ห้อง</label>
                        </div>
                        <div class="md-form">
                            <input placeholder="กรุณาเลือกวัน" type="text" id="date-picker-example"
                                class="form-control datepicker"
                                <?php if (isset($_GET['date'])) echo 'value="' . $_GET['date'] . '"'; else echo 'value="' . curDate() . '"'; ?>>
                            <label for="date-picker-example" class="text-primary">วัน</label>
                        </div>
                        <a class="btn btn-warning btn-lg" id="btn_query" name="btn_query"><i class="fas fa-download"></i> ดึงข้อมูล</a>
                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <a class="btn btn-success btn-lg text-right" id="btn_save" name="btn_save"><i class="fas fa-save"></i> บันทึก</a>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <?php if (isset($_GET['grade']) && isset($_GET['class']) && isset($_GET['date'])) { ?>
                    <div class="text-center">
                        <h2>คุณกำลังเช็คชื่อระดับชั้น ม.<?php echo $_GET['grade'] . '/' . $_GET['class']; ?></h2>
                        <h4>ประจำวันที่ <?php echo $_GET['date']; ?></h4>
                    </div>
                    <?php }?>
                    <div class='table-responsive'>
                        <table id="tblData" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap text-center">รหัสนักเรียน</th>
                                    <th class="text-nowrap text-center" colspan="3">ชื่อ - สกุล</th>
                                    <th>
                                        <div class="custom-control custom-checkbox text-center">
                                            <input type="checkbox" class="custom-control-input" id="checkAll">
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
                                    $g = $_GET['grade']; $c = $_GET['class']; $d = "d" . str_replace("/", "", $_GET['date']);                                    
                                    
                                    $r = mysqli_query($conn, "ALTER TABLE `std_checktest` ADD COLUMN IF NOT EXISTS $d BOOL DEFAULT FALSE");
                                    if (!$r) die('Could not alter data: '.mysqli_error($conn));
                                
                                    $r = mysqli_query($conn, "SELECT * FROM `std_checktest` WHERE grade = $g AND class = $c ORDER BY `prefix` DESC,`id` ASC");
                                    if (!$r) die('Could not get data: '.mysqli_error($conn));

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
                                                id="<?php echo $t['id']; ?>" name="<?php echo $t['id']; ?>">
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
    <?php include '../global/popup.php'; ?>
    <?php include '../global/footer.php'; ?>
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('#grade option[value=<?php if (isset($_GET['grade'])) echo $_GET['grade']; else echo 1; ?>]').attr('selected', 'selected');
        $('#class option[value=<?php if (isset($_GET['class'])) echo $_GET['class']; else echo 1; ?>]').attr('selected', 'selected');

        $("#btn_query").click(function () {
            window.location.href = "?grade=" + $("#grade").val() + "&class=" + $("#class").val() + "&date=" + $(".datepicker").val();
        });

        $('input[type="checkbox"]').on('change', function (e) {
            console.log(e.target.name + "@" + "<?php echo $d; ?>" + "=" + e.target.checked);
            $.ajax({
                url: "stdCheck_save.php",
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
                        toastr.success("อัพเดทค่า '" + e.target.name + "' เป็น " + e.target
                            .checked);
                    } else {
                        toastr.error("ไม่สามารถปรับค่าของ '" + e.target.name + "' ได้");
                    }
                }
            });
        });

        $("#grade").change(function () {
            if ($(this).val() <= 3) {
                $("#scius").prop('disabled', true);
            } else {
                $("#scius").prop('disabled', false);
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