<?php include '../global/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
    <style>
        @media (min-width: 960px) {
            .card-columns {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3;
            }
        }

        @media (max-width: 960px) {
            .card-columns {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 420px) {
            .card-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }
    </style>
</head>

<body class="admin">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar admin" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <?php include '../global/popup.php' ?>
    <div class="container-fluid" id="container" style="padding-top: 88px">
        <?php needLogin(); ?>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-lg green waves-effect waves-light"
                onclick="toastr.success('บันทึกค่าทั้งหมดเรียบร้อยแล้ว')">
                <i class="fas fa-save">
                </i>
            </a>
        </div>
        <?php if(getConfig('global_override_checking_admin', 'bool', $conn)) { ?>
            <div class="alert alert-warning" role="alert">
                <p>GLOBAL_OVERRIDE_CHECKING_ADMIN</p>
            </div>
        <?php } else needPermission('isAdmin', $conn);?>
        <!-- Nav tabs -->
        <ul class="nav md-tabs nav-justified peach-gradient mx-0 mb-0 mt-1" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Global & Homepage Settings <i class="fas fa-cogs"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="user-management-tab" data-toggle="tab" href="#user-management" role="tab"
                    aria-controls="user-management" aria-selected="false">User Management <i class="fas fa-users"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="news-management-tab" data-toggle="tab" href="#news-management" role="tab"
                    aria-controls="news-management" aria-selected="false">News Editorial <i class="fas fa-newspaper"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="forum-management-tab" data-toggle="tab" href="#forum-management" role="tab"
                    aria-controls="forum-management" aria-selected="false">Forum Administrator <i class="fas fa-comments"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="page-management-tab" data-toggle="tab" href="#page-management" role="tab"
                    aria-controls="page-management" aria-selected="false">Page Manager <i class="fas fa-file-alt"></i>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php include ('settings.php'); ?>
            </div>
            <div class="tab-pane fade" id="user-management" role="tabpanel" aria-labelledby="user-management-tab">
                <?php include ('users.php'); ?>
            </div>
            <div class="tab-pane fade" id="news-management" role="tabpanel" aria-labelledby="news-management-tab">CCCC
            </div>
            <div class="tab-pane fade" id="forum-management" role="tabpanel" aria-labelledby="forum-management-tab">
                DDDDD
            </div>
            <div class="tab-pane fade" id="page-management" role="tabpanel" aria-labelledby="page-management-tab">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="card">
                    <div class="card-body card-text">
                    <div class="card-title"><h1 class="font-weight-bold text-smd">รายการ</h1></div>
                    test
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.form-control').on('change', function (e) {
            var x = document.getElementById(e.target.name).value;
            console.log("ID: " + e.target.name + " -> " + x);
            $.ajax({
                url: "save.php",
                type: "POST",
                //pass data like this 
                data: {
                    name: e.target.name,
                    col: "val",
                    val: x
                },
                cache: false,
                success: function (data) {
                    if (data) {
                        toastr.success("อัพเดทค่า '" + e.target.name + "' เป็น " + x);
                    } else {
                        toastr.error("ไม่สามารถปรับค่าของ '" + e.target.name + "' ได้");
                    }
                }
            });
        });
        $('.switch input[type="checkbox"]').on('change', function (e) {
            var x = document.getElementById(e.target.name);
            if (x != null) {
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            console.log(e.target.checked);
            console.log(e.target.name);
            $.ajax({
                url: "save.php",
                type: "POST",
                //pass data like this 
                data: {
                    name: e.target.name,
                    col: "bool",
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
    </script>
    <footer class="d-none">
        <?php include '../global/footer.php' ?>
    </footer>
</body>

</html>