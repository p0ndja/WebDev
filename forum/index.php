<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
    <script type="text/javascript">
        $(function () {
            $('.summernote').summernote({
                height: 500,
            });
            $('.summernote').summernote('code', '<?php echo $article; ?>');
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div style="padding-top:10px"></div>
        <?php if (!isset($_GET['post'])) { ?>
        <!-- Classic tabs -->
        <div class="classic-tabs mx-2 mb-3">

            <ul class="nav tabs-orange" id="tab-orange" role="tablist">
                <?php if (isLogin()) { ?>
                <li class="nav-item">
                    <a class="nav-link waves-light"
                        id="post-orange" data-toggle="tab" href="#post" role="tab" aria-controls="post"
                        aria-selected="false"><i class="fas fa-plus fa-2x pb-2" aria-hidden="true"></i><br>Post</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link waves-light active show" id="announcement-orange" data-toggle="tab"
                        href="#announcement" role="tab" aria-controls="announcement" aria-selected="true"><i
                            class="fas fa-user-tie fa-2x pb-2"></i><br>Announcement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="pupil-orange" data-toggle="tab" href="#pupil" role="tab"
                        aria-controls="pupil" aria-selected="false"><i class="fas fa-user fa-2x pb-2"
                            aria-hidden="true"></i><br>Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="alumni-orange" data-toggle="tab" href="#alumni" role="tab"
                        aria-controls="alumni" aria-selected="false"><i class="fas fa-user-graduate fa-2x pb-2"
                            aria-hidden="true"></i><br>Alumni</a>
                </li>
            </ul>

            <div class="tab-content card" id="tab-orange">
                <div class="tab-pane fade active show" id="announcement" role="tabpanel"
                    aria-labelledby="announcement-orange">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-sm table-hover">
                            <thead class="table table-sm thead-dark">
                                <tr>
                                    <th scope="col" style="width: 50%">
                                        <center>หัวข้อ</center>
                                    </th>
                                    <th scope="col" style="width: 14%">
                                        <center>ประเภท</center>
                                    </th>
                                    <th scope="col" style="width: 18%">
                                        <center>ผู้โพสต์</center>
                                    </th>
                                    <th scope="col" style="width: 18%">
                                        <center>ข้อความล่าสุด</center>
                                    </th>
                                </tr>
                            </thead>
                            <?php }?>
                            <?php
            if (isset($_GET['post'])) {
                $postID = $_GET['post'];
                $query = "SELECT * FROM `forum` WHERE id = $postID";
            } else {
                $query = "SELECT * FROM `forum` ORDER by time DESC LIMIT 10";
            }

            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $postID = $row['id'];
                $article = $row['article'];
                $title = $row['title'];
                $writer = $row['writer'];
                $time = $row['time'];
                $tags = $row['tags'];
                $pin = $row['pin'];
                $type = $row['type'];

                $querypi = "SELECT * FROM `profile` WHERE id = $writer";
                $resultpi = mysqli_query($conn, $querypi);
                while ($rowpi = mysqli_fetch_array($resultpi, MYSQLI_ASSOC)) {
                    $writer_pic = $rowpi['profile'];
                }

                $querywn = "SELECT * FROM `user` WHERE id = $writer";
                $resultwn = mysqli_query($conn, $querywn);
                while ($rowwn = mysqli_fetch_array($resultwn, MYSQLI_ASSOC)) {
                    $writer_user = $rowwn['username'];
                    $writer_name = $rowwn['firstname']  . ' ' . $rowwn['lastname'];
                }
        ?>
                            <?php if (isset($_GET['post'])) { ?>
                            <div class="card mb-4">
                                <div class="card-header bg-dark text-white">
                                    <h4 style="color: #ffffff"><?php echo $title . ' '; ?><span
                                            class="badge badge-success z-depth-0"><?php echo $tags; ?></span></h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-3 grey lighten-2">
                                            <div class="row">
                                                <div class="col-4 col-md-12">
                                                    <img src="<?php echo $writer_pic; ?>" alt="Profile"
                                                        class="img-fluid">
                                                </div>
                                                <div class="col-8 col-md-12">
                                                    <p>
                                                        <a href="../profile/<?php echo $writer; ?>">
                                                            <center>
                                                                <?php echo $writer_name . '<br>(' . $writer_user . ')'; ?>
                                                            </center>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-9 grey lighten-3">
                                            <p class="card-text"><?php echo $article; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>

                            <tbody>
                                <tr class="table-pointer" style="cursor: pointer;"
                                    onclick="window.location='./?post=<?php echo $postID;?>';">
                                    <td><?php echo $title; ?><br><?php echo $time; ?></td>
                                    <td>
                                        <center><?php echo $tags; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $writer_name . '<br>' . '(' . $writer_user . ')'; ?></center>
                                    </td>
                                    <td>
                                        <center>-</center>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            <?php } ?>
                            <?php if (!isset($_GET['post'])) { ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pupil" role="tabpanel" aria-labelledby="pupil-orange">
                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate
                        velit esse
                        quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                    </p>
                </div>
                <div class="tab-pane fade" id="alumni" role="tabpanel" aria-labelledby="alumni-orange">
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                        dolorum fuga.
                        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis
                        est
                        eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis
                        voluptas
                        assumenda est, omnis dolor repellendus. </p>
                </div>
                <?php
                    if (isLogin()) {
                        date_default_timezone_set('Asia/Bangkok'); $date = date('Y-m-d H:i:s', time());
                        $profile_name = $_SESSION['name'];
                        $profile_id = $_SESSION['id'];
                        $profile_image = getProfilePicture($profile_id, $conn);
                        $_SESSION['time'] = $date;
                    
                ?>
                <div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post-orange">
                    <form method="POST" action="../forum/save.php" enctype="multipart/form-data">
                        <h5 style="color: white">
                            <div class="input-group flex-nowrap mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-title">หัวข้อ</span>
                                </div>
                                <input type="text" class="form-control" id="title" name="title" aria-label="title"
                                    aria-describedby="addon-title" required>
                            </div>
                        </h5>
                        <div class="form-group">
                            <textarea class="summernote" id="article" name="article"></textarea>
                        </div>
                        <div class="input-group flex-nowrap">
                            <div class="md-form input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="addon-tags">แท็ก / Tags</span>
                                </div>
                                <input type="text" class="form-control" id="tags" name="tags"
                                    placeholder="ใช้สำหรับแท็กหัวข้อเรื่องของข่าว / สามารถแท็กได้มากกว่า 1 หัวข้อโดยใช้เครื่องหมาย Comma (,) คั่น"
                                    aria-label="Tags" aria-describedby="addon-tags">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <h6>เขียนโดย <?php echo $profile_name; ?> เมื่อ <?php echo $date . ' ' ?>
                                <input type="submit" class="btn btn-success" value="บันทึก"></input>
                            </h6>
                        </div>
                    </form>
                </div>
                    <?php } ?>
            </div>

        </div>
        <?php } ?>
    </div>
</body>

<?php require '../global/footer.php' ?>
<?php require '../global/popup.php'; ?>

</html>