<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
    <?php
        $title = ""; $tags = ""; $article = ""; $attached = null; $hide = false; $type = "news"; $pinned = false;
            if (isset($_GET['id']) && isValidForumID($_GET['id'], $connForum) && isset($_GET['comment'])) {
                $postID = $_GET['id'];
                $commentID = $_GET['comment'];
                $query = "SELECT * FROM `id_$postID` INNER JOIN `forum_properties` ON $postID = `forum_properties`.id";
                $result = mysqli_query($connForum, $query);
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if ($row['id'] == 1) $title = $row['title'];
                        if ($row['id'] == $commentID){
                        $article = $row['message'];
                        $hide = $row['isHidden'];
                        $pinned = $row['isPinned'];
                        $type = $row['category'];
                        }
                    }
            }
    ?>
    <script type="text/javascript">
        $(function () {

            $.ajax({
                url: 'https://api.github.com/emojis',
                async: false
            }).then(function (data) {
                window.emojis = Object.keys(data);
                window.emojiUrls = data;
            });;
            $('.summernote').summernote({
                minHeight: 500,
                fontNames: ['Helvetica', 'Times New Roman', 'MorKhor','Charmonman','Sarabun','Kanit'],
                fontNamesIgnoreCheck: ['Helvetica', 'Times New Roman', 'MorKhor','Charmonman','Sarabun','Kanit'],

                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendPicFile(files[0], this);
                    },
                    onFileUpload: function (file) {
                        sendRawFile(file[0]);
                    }
                },
                toolbar: [
                    ['misc', ['undo', 'redo']],
                    ['style', ['style', 'height', 'fontname', 'fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                        'subscript', 'clear'
                    ]],
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
                            return item.indexOf(keyword) === 0;
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
                    xhr: function () { //Handle progress upload
                        let myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) myXhr.upload.addEventListener('progress',
                            progressHandlingFunction, false);
                        return myXhr;
                    },
                    success: function (reponse) {
                        let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif',
                            'image/svg'
                        ];
                        let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                        let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                        let elem;

                        if (listMimeImg.indexOf(file.type) > -1) {
                            //Picture
                            $('.summernote').summernote('editor.insertImage', reponse.filename);
                        } else if (listMimeAudio.indexOf(file.type) > -1) {
                            //Audio
                            elem = document.createElement("audio");
                            elem.setAttribute("src", reponse.filename);
                            elem.setAttribute("controls", "controls");
                            elem.setAttribute("preload", "metadata");
                            $('.summernote').summernote('editor.insertNode', elem);
                        } else if (listMimeVideo.indexOf(file.type) > -1) {
                            //Video
                            elem = document.createElement("video");
                            elem.setAttribute("src", reponse.filename);
                            elem.setAttribute("controls", "controls");
                            elem.setAttribute("preload", "metadata");
                            $('.summernote').summernote('editor.insertNode', elem);
                        } else {
                            //Other file type
                            elem = document.createElement("a");
                            let linkText = document.createTextNode(file.name);
                            elem.appendChild(linkText);
                            elem.title = file.name;
                            elem.href = reponse.filename;
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
                    success: function (url) {
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
    <?php needLogin();?>
    <?php if(isset($_GET['id'])) needPermission('isForumEditor', $conn); ?>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="POST"
            action="../forum/save.php<?php if (isset($_GET['id'])) echo '?topic=' . $_GET['id']; else echo "?topic=new"; ?><?php if (isset($_GET['comment'])) $comment = $_GET['comment']; else $comment = 1; echo '&comment=' . $comment; ?>"
            enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <h5 style="color: white">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-title">หัวข้อ / Title</span>
                            </div>
                            <input type='text' class='form-control' id='title' name='title' aria-label='title'
                                aria-describedby='addon-title' required value='<?php echo $title; ?>' <?php if (isset($commentID) && $commentID != 1) echo "disabled"; ?>>
                        </div>
                    </h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <?php //TODO: CHECK IF ADMIN ?>
                            <div class="switch switch-warning mb-1">
                                <label>
                                    <input type="checkbox" name="isHidden" id="isHidden" <?php if ($hide) echo "checked"; ?>>
                                    <span class="lever"></span>
                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                        title="การเปิดค่านี้จะทำให้โพสต์นี้สามารถเข้าได้ผ่าน Link โดยตรงเท่านั้น (จะไม่แสดงรวมกับโพสต์อื่น ๆ ในหน้าหลักและหน้าอื่น ๆ)">ซ่อนโพสต์</a>
                                </label>
                            </div>
                            <div class="switch switch-warning mb-1">
                                <label>
                                    <input type="checkbox" name="pinned" <?php if ($pinned) echo "checked"; ?>>
                                    <span class="lever"></span>
                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                        title="การเปิดค่านี้จะเป็นการปักหมุดโพสต์นี้ไว้บนสุด (เรียงตามลำดับการอัพเดทของโพสต์ปักหมุดด้วย)">ปักหมุดโพสต์</a>
                                </label>
                            </div>
                            <?php ?>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="select-outline">
                                <select class="mdb-select md-form type" id="type" name="type" required>
                                    <optgroup label="- ทั่วไป -">
                                        <option value="general">พูดคุยทั่วไป</option>
                                        <option value="knowledge">รอบรู้เรื่องเรียน</option>
                                        <option value="marketplace">ตลาดนัด SMD</option>
                                        <?php //TODO: CHECK ONLY ALUMNI CAN POST ?>
                                        <option value="alumni">ศิษย์เก่า</option>
                                    </optgroup>
                                    <optgroup label="- Technical -">
                                        <option value="reportbug">แจ้งปัญหาการใช้งาน</option>
                                        <option value="suggestion">เสนอแนะ</option>
                                        <?php //TODO: CHECK ONLY ADMIN CAN POST ?>
                                        <option value="updatelog">อัพเดทเว็บไซต์</option>
                                    </optgroup>
                                </select>
                                <label class="mdb-main-label">หมวดหมู่</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4 mt-3">
                        <textarea class="summernote" id="article" name="article"></textarea>
                    </div>

                    <div class="row justify-content-end">
                        <h6><a onclick="back();" class="btn btn-danger">ยกเลิก</a><input type="submit"
                                class="btn btn-success" value="บันทึก"
                                name="<?php if (isset($_GET['id'])) echo 'forum_update'; else echo 'forum_submit'; ?>"></input>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('.type option[value=<?php echo $type; ?>]').attr('selected', 'selected');
    </script>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>