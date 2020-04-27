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
                    <div class="card card-body card-text">
                        <h1 class="text-center font-weight-bold text-smd">ใบเช็คชื่อ</h1>
                        <div class="select-outline">
                            <select class="mdb-select md-form type" id="grade" name="type" required>
                                <optgroup label="- ระดับชั้น -">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </optgroup>
                            </select>
                            <label class="mdb-main-label">ระดับชั้น</label>
                        </div>
                                                <div class="select-outline">
                            <select class="mdb-select md-form type" id="type" name="type" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                            </select>
                            <label class="mdb-main-label">ห้อง</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
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
                        $q = "SELECT * FROM `std` WHERE grade = 6 AND class = 1 ORDER BY `prefix` DESC,`id` ASC";
                        $r = mysqli_query($conn, $q);
                        $i = 0;
                        while ($t = mysqli_fetch_array($r, MYSQLI_ASSOC)) { $i++; ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td class="text-center"><?php echo $t['id']; ?></td>
                                    <td class="text-nowrap"><?php echo $t['prefix']; ?></td>
                                    <td class="text-nowrap"><?php echo $t['firstname']; ?></td>
                                    <td class="text-nowrap"><?php echo $t['lastname']; ?></td>
                                    <td>
                                        <div class="custom-control custom-checkbox text-center">
                                            <input type="checkbox" class="custom-control-input" id="<?php echo $i; ?>">
                                            <label class="custom-control-label" for="<?php echo $i; ?>"></label>
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
    </script>
</body>

</html>