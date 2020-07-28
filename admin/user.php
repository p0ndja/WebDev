<?php require '../global/connect.php'; ?>
<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar admin" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <?php needLogin(); needPermission('isAdmin', $conn); ?>
    <div class="container-fluid" id="container" style="padding-top: 88px;">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-6 col-md-12">
                        <div class="card mb-3 card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="display-4 text-center text-md-right text-smd"><i class="fas fa-users"></i></h1>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h4 class="text-md-left text-center">นักเรียน<br><?php echo countRole('student', $conn); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12">
                        <div class="card mb-3 card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="display-4 text-center text-md-right text-info"><i
                                            class="fas fa-chalkboard-teacher"></i></h1>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h4 class="text-md-left text-center">อาจารย์<br><?php echo countRole('teacher', $conn); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12">
                        <div class="card mb-3 card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="display-4 text-center text-md-right text-secondary"><i
                                            class="fas fa-user-cog"></i></h1>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h4 class="text-md-left text-center">ผู้ดูแล<br><?php echo countRole('admin', $conn); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12">
                        <div class="card mb-3 card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="display-4 text-center text-md-right text-danger"><i
                                            class="fas fa-graduation-cap"></i></h1>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h4 class="text-md-left text-center">ศิษย์เก่า<br><?php echo countRole('alumni', $conn); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12">
                        <div class="card mb-3 card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="display-4 text-center text-md-right text-warning"><i
                                            class="fas fa-house-user"></i></h1>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h4 class="text-md-left text-center">ผู้ปกครอง<br><?php echo countRole('parent', $conn); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12">
                        <div class="card mb-3 card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="display-4 text-center text-md-right text-success"><i class="fas fa-user"></i>
                                    </h1>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h4 class="text-md-left text-center">บุคคลทั่วไป<br><?php echo countRole('user', $conn); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 card-body">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card mb-3 card-body">
                    <select class="mdb-select" searchable="กรุณาใส่ข้อมูล..." id="user_query" name="user_query">
                        <option value="" disabled selected>กรุณาเลือก</option>
                        <?php $cor = mysqli_query($conn, "SELECT * FROM `user`");
                                while($row = mysqli_fetch_array($cor, MYSQLI_ASSOC)) {?>
                        <option value="<?php echo $row['id']; ?>"
                            data-icon="<?php echo getProfilePicture($row['id'], $conn); ?>" class="rounded-circle">
                            <?php echo getUserdata($row['id'], 'firstname', $conn) . ' ' . getUserdata($row['id'], 'lastname', $conn) . ' (' . $row['id'] . ')' ; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <?php if (isset($_GET['id']) && isValidUserID($_GET['id'], $conn)) { $id = $_GET['id']; ?>
                <div class="card mb-3">
                    <form method="post" action="../admin/user_save.php" enctype="multipart/form-data" id="userEditForm">
                        <input type="hidden" id="real_id" name="real_id" value="<?php echo $id; ?>">
                        <input type="hidden" id="real_role" name="real_role" value="<?php echo getRole($id, $conn); ?>">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12 col-md-4 mb-3">
                                    <img class="img-fluid" src="<?php echo getProfilePicture($id, $conn); ?>">
                                    <h1 class="display-4 text-center">
                                    ID: <?php echo $id; ?>
                                    </h1>
                                    <a class="btn btn-success btn-block btn-lg" href="javascript:{}"
                                        onclick="document.getElementById('userEditForm').submit();">บันทึกข้อมูล <i
                                            class="fas fa-save"></i></a>
                                </div>
                                <div class="col-12 col-md-8">
                                    <!-- Personal Zone -->
                                    <h4 class="font-weight-bold">ข้อมูลส่วนตัว - Information <i
                                            class="fas fa-info-circle"></i></h4>
                                    <hr>
                                    <!-- ID -->
                                    <div class="md-form input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">รหัสประจำตัว <sup class="text-danger">*แก้ไขเมื่อจำเป็นเท่านั้น</sup></span>
                                        </div>
                                        <input type="text" class="form-control mb-2 mr-sm-3" id="id"
                                            name="id"
                                            placeholder="<?php echo $id; ?>"
                                            value="<?php echo $id; ?>"
                                            required>
                                    </div>
                                    <!-- ID -->
                                    <!-- Username -->
                                    <div class="md-form input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">ผู้ใช้งาน</span>
                                        </div>
                                        <input type="text" class="form-control mb-2 mr-sm-3" id="username"
                                            name="username"
                                            placeholder="<?php echo getUserdata($id, 'username', $conn); ?>"
                                            value="<?php echo getUserdata($id, 'username', $conn); ?>"
                                            required>
                                    </div>
                                    <!-- Username -->
                                    <!-- Password -->
                                    <div class="md-form input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">รหัสผ่าน</span>
                                        </div>
                                        <input type="text" class="form-control mb-2 mr-sm-3" id="password"
                                            name="password"
                                            placeholder="พิมพ์รหัสผ่านเพื่อตั้งรหัสผ่านใหม่... (การเว้นว่างจะถือว่าใช้รหัสผ่านเดิม)"
                                            value="">
                                    </div>
                                    <!-- Password -->
                                    <!-- name -->
                                    <div class="form-inline">
                                        <div class="md-form input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon">ชื่อ</span>
                                            </div>
                                            <input type="text" class="form-control mb-2 mr-sm-3" id="firstname"
                                                name="firstname"
                                                placeholder="<?php echo getUserdata($id, 'firstname', $conn); ?>"
                                                value="<?php echo getUserdata($id, 'firstname', $conn); ?>">
                                        </div>
                                        <div class="md-form input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon">สกุล</span>
                                            </div>
                                            <input type="text" class="form-control mb-2 mr-sm-3" id="lastname"
                                                name="lastname"
                                                placeholder="<?php echo getUserdata($id, 'lastname', $conn); ?>"
                                                value="<?php echo getUserdata($id, 'lastname', $conn); ?>">
                                        </div>
                                    </div>
                                    <!-- name -->
                                    <!-- nameen -->
                                    <div class="form-inline">
                                        <div class="md-form input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon">Firstname</span>
                                            </div>
                                            <input type="text" class="form-control mb-2 mr-sm-3" id="firstname_en"
                                                name="firstname_en"
                                                placeholder="<?php echo getUserdata($id, 'firstname_en', $conn); ?>"
                                                value="<?php echo getUserdata($id, 'firstname_en', $conn); ?>">
                                        </div>
                                        <div class="md-form input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon">Lastname</span>
                                            </div>
                                            <input type="text" class="form-control mb-2 mr-sm-3" id="lastname_en"
                                                name="lastname_en"
                                                placeholder="<?php echo getUserdata($id, 'lastname_en', $conn); ?>"
                                                value="<?php echo getUserdata($id, 'lastname_en', $conn); ?>">
                                        </div>
                                    </div>
                                    <!-- name -->
                                    <!-- Email -->
                                    <div class="md-form input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">อีเมล<sup class="text-danger">*ต้องยืนยันอีเมล</sup></span>
                                        </div>
                                        <input type="text" class="form-control mb-2 mr-sm-3" id="email"
                                            name="email"
                                            placeholder="<?php echo getUserdata($id, 'email', $conn); ?>"
                                            value="<?php echo getUserdata($id, 'email', $conn); ?>"
                                            required>
                                    </div>
                                    <!-- Email -->
                                    <!-- Citizen -->
                                    <div class="md-form input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">เลขประจำตัวประชาชน</span>
                                        </div>
                                        <input type="text" class="form-control mb-2 mr-sm-3" id="citizen_id"
                                            name="citizen_id"
                                            placeholder="<?php echo getUserdata($id, 'citizen_id', $conn); ?>"
                                            value="<?php echo getUserdata($id, 'citizen_id', $conn); ?>"
                                            required>
                                    </div>
                                    <!-- Citizen -->
                                    <!-- Personal Zone -->



                                    <!-- Status Zone -->
                                    <!-- role -->
                                    <!-- Group of material radios - option 1 -->
                                    <h4 class="mt-5 font-weight-bold">สถานะ - Role <i class="fas fa-user-tag"></i></h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="student" name="role"
                                                    <?php if (getRole($id, $conn) == "student") echo "checked"; ?>>
                                                <label class="form-check-label" for="student">นักเรียน
                                                    <a class="material-tooltip-main" data-html="true"
                                                        data-toggle="tooltip"
                                                        title="🔰 สิทธิ์เท่าบุคคลทั่วไป<br>✔ สามารถเข้าหน้าที่เกี่ยวข้องกับนักเรียนได้ (/student)<br>✔ สามารถแก้ไขโปรไฟล์ได้เต็มรูปแบบ"><i
                                                            class="fas fa-info-circle"></i></a>
                                                </label>
                                            </div>
                                            <!-- Group of material radios - option 2 -->
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="alumni" name="role"
                                                    <?php if (getRole($id, $conn) == "alumni") echo "checked"; ?>>
                                                <label class="form-check-label" for="alumni">ศิษย์เก่า
                                                    <a class="material-tooltip-main" data-html="true"
                                                        data-toggle="tooltip"
                                                        title="🔰 สิทธิ์เท่านักเรียน<br>❌ ไม่สามารถเข้าหน้าที่เกี่ยวข้องกับนักเรียน"><i
                                                            class="fas fa-info-circle"></i></a>
                                                </label>
                                            </div>
                                            <!-- Group of material radios - option 3 -->
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="teacher" name="role"
                                                    <?php if (getRole($id, $conn) == "teacher") echo "checked"; ?>>
                                                <label class="form-check-label" for="teacher">อาจารย์
                                                    <a class="material-tooltip-main" data-html="true"
                                                        data-toggle="tooltip"
                                                        title="🔰 สิทธิ์เท่าบุคคลทั่วไป<br>✔ สามารถเข้าหน้าที่เกี่ยวข้องกับอาจารย์ได้"><i
                                                            class="fas fa-info-circle"></i></a>
                                                </label>
                                            </div>
                                            <!-- Group of material radios - option 4 -->
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="parent" name="role"
                                                    <?php if (getRole($id, $conn) == "parent") echo "checked"; ?>>
                                                <label class="form-check-label" for="parent">ผู้ปกครอง
                                                    <a class="material-tooltip-main" data-html="true"
                                                        data-toggle="tooltip"
                                                        title="🔰 สิทธิ์เท่าบุคคลทั่วไป<br>✔ สามารถดูผลการเช็คชื่อ<br>✔ สามารถดูผลการลงทะเบียนวิชาเลือก<br>✔ สามารถดูผลการเรียนได้"><i
                                                            class="fas fa-info-circle"></i></a>
                                                </label>
                                            </div>
                                            <!-- Group of material radios - option 5 -->
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="user" name="role"
                                                    <?php if (getRole($id, $conn) == "user") echo "checked"; ?>>
                                                <label class="form-check-label" for="user">บุคคลทั่วไป
                                                    <a class="material-tooltip-main" data-html="true"
                                                        data-toggle="tooltip"
                                                        title="✔ สามารถเข้าหน้าทั่วไปได้<br>✔ สามารถโพสต์ Forum ได้<br>✔ สามารถแก้ไข Profile ได้<br>❕ ไม่มีประสบการณ์ในโปรไฟล์<br>❕ ไม่มีประวัติการศึกษาในโปรไฟล์"><i
                                                            class="fas fa-info-circle"></i></a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div id="parentZone" style="display: <?php if (getRole($id, $conn) == 'parent') echo "block"; else echo "none"; ?>;">
                                                <div class="md-form form-sm">
                                                    <i class="fas fa-user prefix"></i>
                                                    <input type="text" name="childID" id="childID"
                                                        class="form-control form-control-sm validate" required value="<?php if (getUserdata($id, 'parentID', $conn) != null) echo getUserdata($id, 'parentID', $conn); ?>">
                                                    <label for="childID">คุณเป็นผู้ปกครองของ... (กรุณากรอกรหัสนักเรียน)*</label>
                                                </div>
                                            </div>
                                            <div id="studentZone" style="display: <?php if (getRole($id, $conn) == 'student') echo "block"; else echo "none"; ?>;">
                                                <div class="form-inline">
                                                    <div class="form-row">
                                                        <label for="grade" class="col-form-label col-md-auto">ระดับชั้น*</label>
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
                                                        <label for="class" class="col-form-label col-md-auto"> ห้อง* </label>
                                                        <div class=" align-items-center col-md-auto d-flex">
                                                            <select class="form-control" id="class" name="class">
                                                                <option value="1">ห้อง 1</option>
                                                                <option value="2">ห้อง 2</option>
                                                                <option value="3">ห้อง 3</option>
                                                                <option value="4">ห้อง 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- role -->
                                    <!-- Status Zone -->



                                    <!-- Permission Zone -->
                                    <h4 class="mt-5 font-weight-bold">สิทธิ์ - Permission <i class="fas fa-tools"></i>
                                    </h4>
                                    <hr>
                                    <!-- isAdmin -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isAdmin" name="perm[]" value="isAdmin"
                                            <?php if(checkPermission('isAdmin', $id, $conn)) echo "checked "; ?>>
                                        <label class="form-check-label" for="perm_isAdmin">Administrator
                                            <a class="material-tooltip-main" data-html="true" data-toggle="tooltip"
                                                title="✔ ทำได้ทุกอย่าง<br>✔ Override ทุกสิทธิ์"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </label>
                                    </div>
                                    <!-- isTeacher -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isTeacher" name="perm[]" value="isTeacher"
                                            <?php if(checkPermission('isTeacher', $id, $conn)) echo "checked "; if(checkPermission('isAdmin', $id, $conn)) echo "disabled "; ?>>
                                        <label class="form-check-label" for="perm_isTeacher">Teacher
                                            <a class="material-tooltip-main" data-html="true" data-toggle="tooltip"
                                                title="✔ สามารถเข้าหน้าที่เกี่ยวข้องกับอาจารย์ได้"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </label>
                                    </div>
                                    <!-- isNewsReporter -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isNewsReporter" name="perm[]" value="isNewsReporter"
                                            <?php if(checkPermission('isNewsReporter', $id, $conn)) echo "checked "; if(checkPermission('isAdmin', $id, $conn)) echo "disabled ";  ?>>
                                        <label class="form-check-label" for="perm_isNewsReporter">Newsreporter
                                            <a class="material-tooltip-main" data-html="true" data-toggle="tooltip"
                                                title="✔ สามารถสร้าง/แก้ไข/ลบโพสต์ได้ (/post)"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </label>
                                    </div>
                                    <!-- isForumEditor -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isForumEditor" name="perm[]" value="isForumEditor"
                                            <?php if(checkPermission('isForumEditor', $id, $conn)) echo "checked "; if(checkPermission('isAdmin', $id, $conn)) echo "disabled ";  ?>>
                                        <label class="form-check-label" for="perm_isForumEditor">Forum Editor
                                            <a class="material-tooltip-main" data-html="true" data-toggle="tooltip"
                                                title="✔ สามารถสร้าง/แก้ไข/ลบโพสต์ในฟอรั่มได้ (/forum)"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </label>
                                    </div>
                                    <!-- isRegistrator -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isRegistrator" name="perm[]" value="isRegistrator"
                                            <?php if(checkPermission('isRegistrator', $id, $conn)) echo "checked "; if(checkPermission('isAdmin', $id, $conn)) echo "disabled ";  ?>>
                                        <label class="form-check-label" for="perm_isRegistrator">Registrator</label>
                                    </div>
                                    <!-- isSubjectRegistrator -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isSubjectRegistrator" name="perm[]" value="isSubjectRegistrator"
                                            <?php if(checkPermission('isSubjectRegistrator', $id, $conn)) echo "checked "; if(checkPermission('isAdmin', $id, $conn)) echo "disabled ";  ?>>
                                        <label class="form-check-label" for="perm_isSubjectRegistrator">Subject
                                            Registrator</label>
                                    </div>
                                    <!-- isTimetableDesigner -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="perm_isTimetableDesigner" name="perm[]" value="isTimetableDesigner"
                                            <?php if(checkPermission('isTimetableDesigner', $id, $conn)) echo "checked "; if(checkPermission('isAdmin', $id, $conn)) echo "disabled ";  ?>>
                                        <label class="form-check-label" for="perm_isTimetableDesigner">Timetable
                                            Designer
                                            <a class="material-tooltip-main" data-html="true" data-toggle="tooltip"
                                                title="✔ สามารถปรับปรุงฐานข้อมูลตารางเรียนได้ (/timetable)"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </label>
                                    </div>
                                    <!-- Permission Zone -->

                                    <!-- Delete Zone -->
                                    <h4 class="mt-5 font-weight-bold">ลบแอคเค้าท์ - Delete Account <i class="fas fa-trash-alt"></i>
                                    </h4>
                                    <hr>

                                    <a class="btn btn-outline-danger btn-lg" href="javascript:{}" onclick='swal({title: "ลบผู้ใช้นี้หรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../admin/user_delete.php?id=<?php echo $id; ?>";}});''>ยืนยันการลบผู้ใช้นี้ <u><b>!! ไม่สามารถกู้คืนได้ !!</b></u></a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script>
        $("#perm_isAdmin").on('change', function (e) {
            $('input:checkbox').not(this).prop('checked', this.checked);
            $('input:checkbox').not(this).prop('disabled', this.checked);
        });

        $("#user_query").on('change', function (e) {
            console.log("s");
            window.location = "../user/" + $("#user_query").val();
        });

        $('#user_query <?php if (isset($_GET['id']))echo "option[value=" . $_GET['id'] .']'; ?>').attr('selected', 'selected');

        $("input[type=radio]").change(function () {
            $("#real_role").val(this.id);
            console.log($("#real_role").val());
            if (this.id == "student") {
                $('#studentZone').css('display', 'block');
                $('#parentZone').css('display', 'none');
            } else if (this.id == "parent") {
                $('#parentZone').css('display', 'block');
                $('#studentZone').css('display', 'none');
            } else {
                $('#studentZone').css('display', 'none');
                $('#parentZone').css('display', 'none');
            }
        });

        $("#grade").change(function () {
            if ($(this).val() <= 3) {
                $('#class option[value="5"]').remove();
            } else {
                $('#class').append('<option value="5">ห้อง 5</option>');
            }
        });
    </script>
    <script>
    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {
                labels: ["ม.1", "ม.2", "ม.3", "ม.4", "ม.5", "ม.6"],
                datasets: [{
                    data: [<?php echo countGrade(1, $conn) ?>, <?php echo countGrade(2, $conn) ?>, <?php echo countGrade(3, $conn) ?>, <?php echo countGrade(4, $conn) ?>, <?php echo countGrade(5, $conn) ?>, <?php echo countGrade(6, $conn) ?>],
                    hoverBackgroundColor: ["#A800FF", "#0079FF", "#00F11D", "#FFEF00", "#FF7F00", "#FF0900"],
                    backgroundColor: ["#B933FF", "#3394FF", "#33F44A", "#FFF233", "#FF9933", "#FF3A33"]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <?php if (isset($_GET['id']) && getUserdata($_GET['id'], 'grade', $conn) != null && getRole($id, $conn) == "student") {?>
        <script>$('#grade option[value=<?php echo getUserdata($_GET['id'], 'grade', $conn); ?>]').attr('selected', 'selected');</script>
    <?php } ?>
    <?php if (isset($_GET['id']) && getUserdata($_GET['id'], 'class', $conn) != null && getRole($id, $conn) == "student") {?>
        <?php if (getUserdata($_GET['id'], 'class', $conn) == 5) { ?>
            <script>$('#class').append('<option value="5">ห้อง 5</option>');</script>
        <?php } ?>
        <script>$('#class option[value=<?php echo getUserdata($_GET['id'], 'class', $conn); ?>]').attr('selected', 'selected');</script>
    <?php } ?>

    <?php require '../global/popup.php'; ?>
    <div class="d-none">
        <?php require '../global/footer.php' ?>
    </div>
</body>

</html>
