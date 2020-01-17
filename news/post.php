<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <?php
    $title = ""; $tags = ""; $cover = ""; $article = "";
            if (isset($_GET['news'])) {
                $postID = $_GET['news'];
                $query = "SELECT * FROM `post` WHERE id = $postID";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 0) die('Could not load data');
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $article = $row['article'];
                    $title = $row['title'];
                    $cover = $row['cover'];
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
    <?php
        date_default_timezone_set('Asia/Bangkok'); $date = date('Y-m-d H:i:s', time());
        $profile_name = $_SESSION['fn'] . ' ' . $_SESSION['ln'];
        $profile_id = $_SESSION['id'];
        $profile_image = $_SESSION['pi'];
        $_SESSION['time'] = $date;
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="POST" action="../news/save.php<?php if (isset($_GET['news'])) echo '?news=' . $_GET['news']; ?>" enctype="multipart/form-data">
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
                    <div class="md-form file-field mb-5">
                        <div class="btn btn-primary btn-sm float-left">
                            <span><i class="fas fa-file-upload"></i> Browse</span>
                            <input type="file" name="cover" id="cover" class="validate" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate disabled" type="text" id="coverURL" name="coverURL"
                                placeholder="รูปปก / Cover Image" value=<?php echo $cover;?>>
                        </div>
                        <?php
                            if ($cover != null) $cover_src = $cover;
                            else $cover_src = "../assets/images/default_post.jpg";
                        ?>
                        <img src=<?php echo $cover_src; ?> class=" img-fluid w-100" id="coverThumb">
                        <hr>
                    </div>
                    <div class="form-group mb-4">
                        <label for="article">
                            <h4 class="font-weight-bold">เนื้อข่าว</h4>
                        </label>
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
                                name="<?php if (isset($_GET['news'])) echo 'post_update'; else echo 'post_submit'; ?>"></input>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById("cover").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("coverThumb").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
</body>

<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>