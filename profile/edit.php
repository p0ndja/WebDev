<?php
    require '../global/connect.php';
    if (!isset($_SESSION['id']))
        home();
?>

<!DOCTYPE html>
<html lang="th">

<head>

    <?php require '../global/head.php'; ?>
    <?php
        $id = $_SESSION['id'];

        $profile_background = getProfileData($id, 'background', $conn);
        
        if (getProfileData($id, 'background', $conn) == null) {
            if (!$_SESSION['dark_mode']) $profile_background = "../static/images/background/bg_light_pastel.jpg";
            else $profile_background = "../static/images/background/bg_dark_resize.jpg";
        }

        $profile_displayText = getProfileData($id, 'greetings', $conn);

        $_SESSION['isDarkProfile'] = getProfileData($id, 'isDark', $conn);
    ?>

    <script type="text/javascript">
        $(function () {
            $('.summernote').summernote({
                minHeight: 500,
                fontNames: ['Arial', 'Courier New', 'Helvetica', 'Tahoma', 'Times New Roman', 'MorKhor',
                    'Charmonman', 'Srisakdi', 'Chonburi', 'Itim', 'Trirong', 'Niramit', 'Sarabun',
                    'Kanit', 'anakotmai'
                ],
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                        sendFile(files[0], this);
                    }
                }
            });

            function sendFile(file, el) {
                data = new FormData();
                data.append("file", file);
                data.append("userID",'<?php echo $_SESSION['id'] ?>')
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "upload.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $(el).summernote('editor.insertImage', url);
                    }
                });
            }

            $('.summernote').summernote('code', '<?php echo $profile_displayText; ?>');
        });
    </script>

    <style>
        body {
            background: url(<?php echo $profile_background ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        @media (min-width: 960px) {
            .card-columns {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 960px) {
            .card-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <?php if (isset($_GET['id']) || (isset($_SESSION['id']))) {
            $id = $_SESSION['id'];
        
            $profile_achi = "";
                    
            $profile_image = getProfilePicture($id, $conn);

            $profile_greets = getProfileData($id, 'greetings', $conn);

    }
    ?>
    <div class="container" id="container" style="padding-top: 88px">
        <img id="bg_dump" style="display: none;">
        <form method="post" action="../profile/save.php" enctype="multipart/form-data">
            <div class="card w-100 mb-3">
                <div class="card-body">
                    <h6><b>Background Image: </b>
                        <input type="file" name="background_upload" id="background_upload"
                            class="form-control-file validate" accept="image/png, image/jpeg"></h6>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="<?php echo $profile_image; ?>" class="w-100 mb-3" alt="Profile" id="profile_preview">
                            <input type="file" name="profile_upload" id="profile_upload" class="form-control-file validate mb-3" accept="image/png, image/jpeg">
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo generateInfoCard($id, $conn); ?>
                            <?php echo generateAchievementCard($id, $conn); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card-columns">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h2>กล่องข้อมูล</h2>
                                    <textarea name="text" class="summernote" id="contents" name="contents"
                                        title="Contents"></textarea>
                                </div>
                            </div>
                        </div>
                        <?php if ($_SESSION['id'] == 604019) { ?>
                        <div class="card">
                            <div class="card-body">
                            <?php $graduation = array(); $i = 0; foreach(explode("|", getProfiledata($id, 'graduation', $conn)) as $eachgra) {  $graduation[$i] = $eachgra;  $i++; } ?>
                                <h2>ประวัติการศึกษา</h2>
                                <i>สามารถเว้นว่างไว้ได้ (การเว้นว่างจะไม่แสดงผลในรายการนั้น ๆ)</i>
                                <div class="row mt-1">
                                    <div class="col">
                                        <input type="text" class="form-control" name="grapri" id="grapri" rows="1"
                                            value="<?php echo $graduation[0]; ?>" placeholder="ระดับประถมศึกษา | สามารถเว้นว่างไว้ได้"></input>
                                        <h5><span class="badge badge-primary">ระดับประถมศึกษา</span></h5>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="grasecj" id="grasec1" rows="1"
                                            value="<?php echo $graduation[1]; ?>" placeholder="ระดับมัธยมศึกษาตอนต้น | สามารถเว้นว่างไว้ได้"></input>
                                        <h5><span class="badge badge-primary">ระดับมัธยมศึกษาตอนต้น</span></h5>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="grasecs" id="grasecs" rows="1"
                                            value="<?php echo $graduation[2]; ?>" placeholder="ระดับมัธยมศึกษาตอนปลาย | สามารถเว้นว่างไว้ได้"></input>
                                        <h5><span class="badge badge-primary">ระดับมัธยมศึกษาตอนปลาย</span></h5>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2>ประสบการณ์</h2>
                                <?php
                                    $tagPostNoSplit = getProfiledata($id, 'tagPostID', $conn);
                                    $i = 0;
                                    foreach (explode("|", $tagPostNoSplit) as $s) { 
                                        if ($s != null) { 
                                            $i++; 
                                            if ($i <= 5) { ?>
                                            <hr>
                                            <div class="d-flex flex-nowrap">
                                                <div class="flex-grow-1"><h5><a href="../post/<?php echo "$s"?>"><?php echo getPostdata($s, 'title', $conn); ?></a></h5></div>
                                                <div class="text-nowrap"><?php echo str_replace("-", "/", substr(getPostdata($s, 'time', $conn), 0, -9)); ?></div>
                                            </div>
                                            <?php if (getPostdata($s, 'cover', $conn) != null) {?><img src="<?php echo getPostdata($s, 'cover', $conn); ?>" class="img-fluid"/><?php } ?>
                                <?php       }
                                        }
                                    } 
                                    if ($i == 0) echo "<i>No Information</i>";
                                    if ($i > 5) echo "<div class='d-flex flex-row-reverse'><div class='p-2'><a class='btn btn-primary btn-md mt-3' href='../category/$-1-@" . $id. "'>ดูเพิ่มเติม</a></div></div>";
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="fixed-action-btn" style="bottom: 40px; right: 30px;">
                <input class="d-none" id="isDark" name="isDark" value="0"></input>
                <input type="submit" class="btn btn-success" align="left" name="edit_submit" value="บันทึก"></input>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("profile_upload").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("profile_preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };

        document.getElementById("background_upload").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("body").css({
                    "background": "url(" + e.target.result + ") no-repeat center center fixed",
                    "-webkit-background-size": "cover",
                    "-moz-background-size": "cover",
                    "background-size": "cover",
                    "-o-background-size": "cover"
                });
            };
            reader.readAsDataURL(this.files[0]);
            handleImages(this.files);
        };

        function addImage(file) {
            var element = document.createElement('div');
            element.className = 'row';
            element.innerHTML = '<img />';

            var img = element.querySelector('img');
            img.src = URL.createObjectURL(file);
            img.onload = function () {
                var rgb = getAverageColor(img);
                console.log(rgb.r + "," + rgb.g + "," + rgb.b);
                if ((rgb.r + rgb.g + rgb.b >= 400) || (rgb.g >= 220)) {
                    document.body.removeAttribute("data-theme");
                    console.log("bright");
                    document.getElementById("isDark").value = 0;
                } else {
                    document.body.setAttribute("data-theme", "dark");
                    console.log("dark");
                    document.getElementById("isDark").value = 1;
                }
                //document.getElementById('testto').textContent = 

            };

        }

        function getAverageColor(img) {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var width = canvas.width = img.naturalWidth;
            var height = canvas.height = img.naturalHeight;

            ctx.drawImage(img, 0, 0);

            var imageData = ctx.getImageData(0, 0, width, height);
            var data = imageData.data;
            var r = 0;
            var g = 0;
            var b = 0;

            for (var i = 0, l = data.length; i < l; i += 4) {
                r += data[i];
                g += data[i + 1];
                b += data[i + 2];
            }

            r = Math.floor(r / (data.length / 4));
            g = Math.floor(g / (data.length / 4));
            b = Math.floor(b / (data.length / 4));

            return {
                r: r,
                g: g,
                b: b
            };
        }

        function handleImages(files) {
            for (var i = 0; i < files.length; i++) {
                addImage(files[i]);
            }
        }
    </script>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>