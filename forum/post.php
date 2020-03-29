<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <?php
    $title = ""; $tags = ""; $cover = ""; $article = "";
            if (isset($_GET['post'])) {
                $postID = $_GET['post'];
                $query = "SELECT * FROM `forum` WHERE id = $postID";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 0) die('Could not load data');
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $article = $row['article'];
                    $title = $row['title'];
                    $tags = $row['tags'];
                }
            }
    ?>
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
        <?php include '../global/navbar.php'; ?>
    </nav>
    <?php needLogin(); ?>
    <?php
        date_default_timezone_set('Asia/Bangkok'); $date = date('Y-m-d H:i:s', time());
        $profile_name = $_SESSION['name'];
        $profile_id = $_SESSION['id'];
        $profile_image = getProfilePicture($SESSION['id'], $conn);
        $_SESSION['time'] = $date;
    ?>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="POST" action="../forum/save.php<?php if (isset($_GET['post'])) echo '?post=' . $_GET['post']; ?>" enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <h5 style="color: white">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-title">หัวข้อ</span>
                            </div>
                            <input type="text" class="form-control" id="title" name="title" aria-label="title"
                                aria-describedby="addon-title" required value="<?php echo $title; ?>">
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <textarea class="summernote" id="article" name="article"></textarea>
                        <hr>
                    </div>
                    <div class="input-group flex-nowrap">
                        <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon" id="addon-tags">แท็ก / Tags</span>
                            </div>
                            <input type="text" class="form-control" id="tags" name="tags"
                                placeholder="ใช้สำหรับแท็กหัวข้อเรื่องของข่าว / สามารถแท็กได้มากกว่า 1 หัวข้อโดยใช้เครื่องหมาย Comma (,) คั่น"
                                aria-label="Tags" aria-describedby="addon-tags" value="<?php echo $tags; ?>">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <h6>เขียนโดย <?php echo $profile_name; ?> เมื่อ <?php echo $date . ' ' ?>
                            <input type="submit" class="btn btn-success" value="บันทึก"
                                name="<?php if (isset($_GET['post'])) echo 'post_update'; else echo 'post_submit'; ?>"></input>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>
</body>

</html>