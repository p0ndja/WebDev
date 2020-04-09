<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <?php
        $title = ""; $tags = ""; $cover = ""; $article = ""; $attached = null; $hotlink = null;
            if (isset($_GET['id']) && isValidPostID($_GET['id'], $conn)) {
                $postID = $_GET['id'];
                    $article = getPostdata($postID, 'article', $conn);
                    $title = getPostdata($postID, 'title', $conn);
                    $cover = getPostdata($postID, 'cover', $conn);
                    $tags = getPostdata($postID, 'tags', $conn);
                    $attached = getPostdata($postID, 'attachment', $conn);
                    $hotlink = getPostdata($postID, 'hotlink', $conn);
                    $_SESSION['temp_cover'] = $cover;
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
    <?php needLogin(); needPermission('isNewsReporter', $conn); ?>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="POST" action="../news/save.php<?php if (isset($_GET['id'])) echo '?news=' . $_GET['id']; ?>"
            enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <h5 style="color: white">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-title">หัวข้อ / Title</span>
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
                            else $cover_src = "../assets/images/default/default_post.jpg";
                        ?>
                        <img src=<?php echo $cover_src; ?> class=" img-fluid w-100" id="coverThumb">
                        <hr>
                    </div>

                            <div class="switch switch-warning mb-1">
                                <label>
                                    <?php if ($hotlink != null) $b = "checked"; else $b = ""?>
                                    <input type="checkbox" name="makeHotlink" <?php echo $b; ?>>
                                    <span class="lever"></span>
                                    <a class="material-tooltip-main" data-toggle="tooltip" title="เนื้อข่าวและ Tag จะถูกตัดออกไป เหลือเพียง หัวข้อ, รูปภาพปก และ URL สำหรับ Hotlink">ทำให้โพสต์นี้เป็น Hotlink</a>
                                </label>
                            </div>

                            <input type="text" id="hotlinkField" name="hotlinkField" class="form-control form-control-sm validate mb-4" <?php if ($hotlink != null) echo 'style="display: block"'; else echo 'style="display: none"'; ?> placeholder="Enter URL Here" value="<?php echo $hotlink; ?>">
                    <div class="mb-5"></div>
                    <div id="hotlinkHiddenZone" name="hotlinkHiddenZone" <?php if ($hotlink != null) echo 'style="display: none"'; else echo 'style="display: block"'; ?>>                    
                    <div class="form-group mb-4">
                        <label for="article">
                            <h4 class="font-weight-bold">เนื้อข่าว / Article</h4>
                        </label>
                        <textarea class="summernote" id="article" name="article"></textarea>
                        <hr>
                    </div>
                    <div class="input-group flex-nowrap mb-1">
                        <div class="md-form input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon" id="addon-tags">แท็ก / Tags</span>
                            </div>
                            <input type="text" class="form-control" id="tags" name="tags"
                                placeholder="ใช้สำหรับแท็กหัวข้อเรื่องของข่าว / สามารถแท็กได้มากกว่า 1 หัวข้อโดยใช้เครื่องหมาย Comma (,) คั่น"
                                aria-label="Tags" aria-describedby="addon-tags" value="<?php echo $tags; ?>">
                        </div>
                    </div>
                    <div class="md-form file-field mb-1">
                        <div class="btn btn-primary btn-sm float-left">
                            <span><i class="fas fa-file-upload"></i> Browse</span>
                            <input type="file" name="attachment[]" id="attachment" class="validate" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate disabled" type="text" id="attachmentURL" name="attachmentURL"
                                placeholder="ไฟล์แนบท้าย" value=<?php $_POST['attached_before'] = $attached; echo $attached;?>>
                        </div>
                    </div>
                    </div>
                    <div class="row justify-content-end">
                        <h6><a onclick="back();" class="btn btn-danger">ยกเลิก</a><input type="submit" class="btn btn-success" value="บันทึก" name="<?php if (isset($_GET['id'])) echo 'post_update'; else echo 'post_submit'; ?>"></input></h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById("cover").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("coverThumb").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };

        $('.switch input[type="checkbox"]').on('change', function (e) {
            var x = document.getElementById("hotlinkHiddenZone");
            var y = document.getElementById("hotlinkField");
            if (x != null) {
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            
            if (y != null) {
                if (y.style.display === "block") {
                    y.style.display = "none";
                } else {
                    y.style.display = "block";
                }
            }
        });
    </script>
<?php include '../global/popup.php'; ?>
<?php include '../global/footer.php'; ?>
</body>

</html>