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
            <div class='table-responsive'>
            <table id="tablePreview" class="table table-sm table-bordered">
                <!--Table head-->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รหัสนักเรียน</th>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <?php
                        $q = "SELECT * FROM `std` WHERE grade = 6 AND class = 1 ORDER BY `prefix` DESC,`id` ASC";
                        $r = mysqli_query($conn, $q);
                        $i = 0;
                        while ($t = mysqli_fetch_array($r, MYSQLI_ASSOC)) { $i++; ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $t['id']; ?></td>
                            <td><?php echo $t['prefix']; ?></td>
                            <td><?php echo $t['firstname']; ?></td>
                            <td><?php echo $t['lastname']; ?></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            <td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked"><label class="custom-control-label" for="defaultUnchecked"></label></div></td>
                            </tr>
                        <?php } ?>
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
            </div>
        </div>
    </div>
    <?php include '../global/popup.php'; ?>
    <?php include '../global/footer.php'; ?>
</body>

</html>