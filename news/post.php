<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <script type="text/javascript">
    $(function () {
      $('.summernote').summernote({
        height: 500,
      });
      //$('.summernote').summernote('code', '<-?php echo $profile_displayText; ?>');
    });
  </script>
</head>

<body>
    <?php

        date_default_timezone_set('Asia/Bangkok'); $date = date('Y-m-d H:i:s', time());

        $id = $_SESSION['id'];

        $query = "SELECT * FROM `userdatabase` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $query_profile = "SELECT * FROM `profile` WHERE id = '$id'";
        $result_profile = mysqli_query($conn, $query_profile);
        
        if (mysqli_num_rows($result) == 0) {
            die('Could not load data');
        }

        $undefined = "<i>Undefined</i>";
        $profile_name = "<i>Undefined Thai Name</i>";
        $profile_name_en = "<i>Undefined English Name</i>";
        $profile_id = $undefined;
        $profile_image = "https://d3ipks40p8ekbx.cloudfront.net/dam/jcr:3a4e5787-d665-4331-bfa2-76dd0c006c1b/user_icon.png";
       
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $profile_name = $row['firstname'] . ' ' . $row['lastname'];
            $profile_id = $row['id'];
        }

        while ($row = mysqli_fetch_array($result_profile, MYSQLI_ASSOC)) {
            if ($row['profile'] != null)
                $profile_image = $row['profile'];
        }
        
        $_SESSION['time'] = $date;
        
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="POST" action="../news/save.php">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <h5 style="color: white">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-title">หัวข้อ</span>
                            </div>
                            <input type="text" class="form-control" id="title" name="title" aria-label="title"
                                aria-describedby="addon-title" required>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                            <h6>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-cover">รูปปก (URL)</span>
                                    </div>
                                    <input type="text" class="form-control" id="cover" name="cover" aria-label="cover"
                                        aria-describedby="addon-title">
                                </div>
                            </h6>
                            <hr>
                            <div class="form-group">
                                <label for="article"><h5>Article</h5></label>
                                <textarea class="summernote" id="article" name="article"></textarea>
                            </div>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-tags">แท็ก</span>
                                </div>
                                <input type="text" class="form-control" id="tags" name="tags" aria-label="tags"
                                    aria-describedby="addon-tags">
                            </div>
                    <div class="row justify-content-end">
                        <h6>เขียนโดย <?php echo $profile_name; ?> เมื่อ <?php echo $date . ' ' ?>
                            <input type="submit" class="btn btn-success" value="บันทึก" name="post_submit"></input>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>