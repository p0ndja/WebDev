<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
    <?php
        $title = ""; $tags = ""; $cover = ""; $article = ""; $attached = null; $hotlink = null; $hide = false; $type = "news"; $pinned = false;
            if (isset($_GET['id']) && isValidPostID($_GET['id'], $conn)) {
                $postID = $_GET['id'];
                    $article = getPostdata($postID, 'article', $conn);
                    $title = getPostdata($postID, 'title', $conn);
                    $cover = getPostdata($postID, 'cover', $conn);
                    $tags = getPostdata($postID, 'tags', $conn);
                    $attached = getPostdata($postID, 'attachment', $conn);
                    $hotlink = getPostdata($postID, 'hotlink', $conn);
                    $hide = getPostdata($postID, 'hide', $conn);
                    $pinned = getPostdata($postID, 'pin', $conn);
                    $type = getPostdata($postID, 'type', $conn);
                    $_SESSION['temp_cover'] = $cover;
                    $_POST['attached_before'] = $attached; 
            } else {
                $_SESSION['temp_cover'] = null;
            }
    ?>
    <script type="text/javascript">
        $(function () {

            $.ajax({
                url: 'https://api.github.com/emojis',
                async: false 
                }).then(function(data) {
                window.emojis = Object.keys(data);
                window.emojiUrls = data; 
            });;
            $('.summernote').summernote({
                minHeight: 500,
                fontNames: ['Helvetica', 'Times New Roman', 'MorKhor','Charmonman','Sarabun','Kanit'],
                fontNamesIgnoreCheck: ['Helvetica', 'Times New Roman', 'MorKhor','Charmonman','Sarabun','Kanit'],

                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                        sendPicFile(files[0], this);
                    },
                    onFileUpload: function(file) {
                        sendRawFile(file[0]);
                    }
                },
                toolbar: [
                    ['misc', ['undo', 'redo']],
                    ['style', ['style', 'height', 'fontname', 'fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript','subscript', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr', 'file']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                hint: {
                    match: /:([\-+\w]+)$/,
                    search: function (keyword, callback) {
                    callback($.grep(emojis, function (item) {
                        return item.indexOf(keyword)  === 0;
                    }));
                    },
                    template: function (item) {
                    var content = emojiUrls[item];
                    return '<img src="' + content + '" width="20" /> :' + item + ':';
                    },
                    content: function (item) {
                    var url = emojiUrls[item];
                    if (url) {
                        return $('<img />').attr('src', url).css('width', 20)[0];
                    }
                    return '';
                    }
                }
            });

            function sendRawFile(file) {
                let data = new FormData();
                data.append("file", file);
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "upload.php", //Your own back-end uploader
                    cache: false,
                    contentType: false,
                    processData: false,
                    xhr: function() { //Handle progress upload
                        let myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                        return myXhr;
                    },
                    success: function(reponse) {
                            let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
                            let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                            let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                            let elem;

                            if (listMimeImg.indexOf(file.type) > -1) {
                                //Picture
                                $('.summernote').summernote('editor.insertImage', reponse);
                            } else if (listMimeAudio.indexOf(file.type) > -1) {
                                //Audio
                                elem = document.createElement("audio");
                                elem.setAttribute("src", reponse);
                                elem.setAttribute("controls", "controls");
                                elem.setAttribute("preload", "metadata");
                                $('.summernote').summernote('editor.insertNode', elem);
                            } else if (listMimeVideo.indexOf(file.type) > -1) {
                                //Video
                                elem = document.createElement("video");
                                elem.setAttribute("src", reponse);
                                elem.setAttribute("controls", "controls");
                                elem.setAttribute("preload", "metadata");
                                $('.summernote').summernote('editor.insertNode', elem);
                            } else {
                                //Other file type
                                elem = document.createElement("a");
                                let linkText = document.createTextNode(file.name);
                                elem.appendChild(linkText);
                                elem.title = file.name;
                                elem.href = reponse;
                                $('.summernote').summernote('editor.insertNode', elem);
                            }
                        
                    }
                });
            }

            function progressHandlingFunction(e) {
                if (e.lengthComputable) {
                    //Log current progress
                    console.log((e.loaded / e.total * 100) + '%');

                    //Reset progress on complete
                    if (e.loaded === e.total) {
                        console.log("Upload finished.");
                    }
                }
            }

            function sendPicFile(file, el) {
                data = new FormData();
                data.append("file", file);
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

            $('.summernote').summernote('code', '<?php echo $article; ?>');
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <?php needLogin(); needPermission('isNewsReporter', $conn); ?>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="POST" action="../post/save.php<?php if (isset($_GET['id'])) echo '?news=' . $_GET['id']; ?>"
            enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <h5 style="color: white">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-title">หัวข้อ / Title</span>
                            </div>
                            <input type='text' class='form-control' id='title' name='title' aria-label='title'
                                aria-describedby='addon-title' required value='<?php echo $title; ?>'>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="md-form file-field">
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
                            else $cover_src = "../static/images/default/default_post.jpg";
                        ?>
                        <img src=<?php echo $cover_src; ?> class=" img-fluid w-100" id="coverThumb">
                    </div>
                    <div class="switch switch-warning">
                        <label>
                            <input type="checkbox" name="makeHotlink" id="makeHotlink" <?php if ($hotlink != null) echo "checked"; ?>>
                            <span class="lever"></span>
                            <a class="material-tooltip-main" data-toggle="tooltip"
                                title="เนื้อข่าวและ Tag จะถูกตัดออกไป เหลือเพียง หัวข้อ, รูปภาพปก และ URL สำหรับ Hotlink">ทำให้โพสต์นี้เป็น
                                Hotlink</a>
                        </label>
                    </div>
                    <div class="switch switch-warning">
                        <label>
                            <input type="checkbox" name="isHidden" id="isHidden" <?php if ($hide) echo "checked"; ?>>
                            <span class="lever"></span>
                            <a class="material-tooltip-main" data-toggle="tooltip"
                                title="การเปิดค่านี้จะทำให้โพสต์นี้สามารถเข้าได้ผ่าน Link โดยตรงเท่านั้น (จะไม่แสดงรวมกับโพสต์อื่น ๆ ในหน้าหลักและหน้าอื่น ๆ)">ซ่อนโพสต์</a>
                        </label>
                    </div>
                    <div class="switch switch-warning">
                        <label>
                            <input type="checkbox" name="pinned" <?php if ($pinned) echo "checked"; ?>>
                            <span class="lever"></span>
                            <a class="material-tooltip-main" data-toggle="tooltip"
                                title="การเปิดค่านี้จะเป็นการปักหมุดโพสต์นี้ไว้บนสุด (เรียงตามลำดับการอัพเดทของโพสต์ปักหมุดด้วย)">ปักหมุดโพสต์</a>
                        </label>
                    </div>
                    <input type="text" id="hotlinkField" name="hotlinkField"
                        class="form-control form-control-sm validate mb-4"
                        <?php if ($hotlink != null) echo 'style="display: block"'; else echo 'style="display: none"'; ?>
                        placeholder="Enter URL Here" value="<?php echo $hotlink; ?>">                    
                    <div id="hotlinkHiddenZone" name="hotlinkHiddenZone"
                        <?php if ($hotlink != null) echo 'style="display: none"'; else echo 'style="display: block"'; ?>>
                        <div class="form-group mb-4 mt-3">
                            <textarea class="summernote" id="article" name="article"></textarea>
                        </div>
                        <div class="md-form file-field mb-3">
                            <div class="btn btn-primary btn-sm float-left">
                                <span><i class="fas fa-file-upload"></i> Browse</span>
                                <input type="file" name="attachment[]" id="attachment" class="validate" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate disabled" type="text" id="attachmentURL"
                                    name="attachmentURL" placeholder="ไฟล์แนบท้าย" value="<?php echo $attached;?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="select-outline">
                                    <select class="mdb-select md-form type" id="type" name="type" required>
                                        <optgroup label="- ทั่วไป -">
                                            <option value="news">ข่าวสาร</option>
                                            <option value="order">คำสั่ง</option>
                                            <option value="announce">ประกาศ</option>
                                            <option value="subject">เอกสารประกอบการสอน</option>
                                        </optgroup>
                                        <optgroup label="- หน่วยงาน -">
                                            <option value="qa">งานแผนและประกันคุณภาพ</option>
                                            <option value="advice">งานแนะแนว</option>
                                            <option value="reg">งานทะเบียน</option>
                                            <option value="person">งานพัฒนาบุคลิกภาพและความเป็นสากล</option>
                                            <option value="lib">งานห้องสมุด</option>
                                            <option value="pta">ชมรมผู้ปกครองและครู</option>
                                        </optgroup>
                                    </select>
                                    <label class="mdb-main-label">หมวดหมู่</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="input-group flex-nowrap mb-1">
                                    <div class="md-form input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon" id="addon-tags">แท็ก / Tags</span>
                                        </div>
                                        <input type="text" class="form-control" id="tags" name="tags"
                                            placeholder="ใช้เครื่องหมาย Comma คั่น" aria-label="Tags"
                                            aria-describedby="addon-tags" value="<?php echo $tags; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row justify-content-end">
                        <h6><a onclick="back();" class="btn btn-danger">ยกเลิก</a><input type="submit"
                                class="btn btn-success" value="บันทึก"
                                name="<?php if (isset($_GET['id'])) echo 'post_update'; else echo 'post_submit'; ?>"></input>
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
                document.getElementById("coverThumb").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };

        $('.type option[value=<?php echo $type; ?>]').attr('selected', 'selected');

        document.getElementById("makeHotlink").onchange = function (e) {
            var x = document.getElementById("hotlinkHiddenZone");
            var y = document.getElementById("hotlinkField");

                if ($("#makeHotlink").is(":checked")) {
                    x.style.display = "none";
                    y.style.display = "block";
                } else {
                    x.style.display = "block";
                    y.style.display = "none";
                }
        };
    </script>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>