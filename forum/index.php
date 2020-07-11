<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
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
                placeholder: "เขียนการตอบกลับของคุณ...",
                minHeight: 200,
                fontNames: ['Arial', 'Courier New', 'Helvetica', 'Tahoma', 'Times New Roman', 'MorKhor',
                    'Charmonman', 'Srisakdi', 'Chonburi', 'Itim', 'Trirong', 'Niramit', 'Sarabun',
                    'Kanit', 'anakotmai'
                ],
                fontNamesIgnoreCheck: ['Arial', 'Courier New', 'Helvetica', 'Tahoma', 'Times New Roman',
                    'MorKhor',
                    'Charmonman', 'Srisakdi', 'Chonburi', 'Itim', 'Trirong', 'Niramit', 'Sarabun',
                    'Kanit', 'anakotmai'
                ],
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendPicFile(files[0], this);
                    },
                    onFileUpload: function (file) {
                        sendRawFile(file[0]);
                    },
                    onChange: function (contents) {
                        if (contents.length < 12) {
                            $(':input[type="submit"]').prop('disabled', true);
                        } else {
                            $(':input[type="submit"]').prop('disabled', false);
                        }
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
                    url: "../forum/upload.php", //Your own back-end uploader
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
                    url: "../forum/upload.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (url) {
                        $(el).summernote('editor.insertImage', url);
                    }
                });
            }

            //$('.summernote').summernote('code', '<!?php echo $article; ?>');
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <?php if (!isset($_GET['id'])) { ?>
        <?php $category = ""; if(isset($_GET['category'])) $category = $_GET['category']; ?>
        <div class="text-right">
        <a href="../threads/create" class="btn bg-smd"><i class="fas fa-plus"></i> สร้างโพสต์ใหม่!</a>
        </div>
        <table class="table table-sm table-hover bg-white" id="forumTable">
            <thead class="table table-sm thead-dark">
                <tr>
                    <th scope="col" style="width: 40%">
                        <center>หัวข้อ</center>
                    </th>
                    <th scope="col" style="width: 16%">
                        <center>ประเภท</center>
                    </th>
                    <th scope="col" style="width: 22%">
                        <center>ผู้โพสต์</center>
                    </th>
                    <th scope="col" style="width: 22%">
                        <center>ข้อความล่าสุด</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM `forum_properties` ORDER BY id DESC";
                    $result = mysqli_query($connForum, $query);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $IDD = $row['ID'];
                        $query2 = "SELECT * FROM `id_$IDD` ORDER BY id LIMIT 1";
                        $result2 = mysqli_query($connForum, $query2);
                        $title =""; $time=""; $writer= ""; $tag = $row['category']; $lastreply = null;
                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                            $title = $row2['title'];
                            $time = $row2['timestamp'];
                            $writer = $row2['writer'];
                        }

                        $query3 = "SELECT * FROM `id_$IDD` WHERE id != 1 ORDER BY id DESC LIMIT 1";
                        $result3 = mysqli_query($connForum, $query3);
                        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                            $lastreply = $row3['writer'];
                        }
                ?>
                <tr class="table-pointer" style="cursor: pointer;"
                    onclick="window.location='../threads/<?php echo $IDD;?>';">
                    <td><?php echo $title . '<br>' . $time; ?></td>
                    <td>
                        <center><h6><?php echo generateForumTopic($tag); ?></h6></center>
                    </td>
                    <td>
                        <center><?php echo getUserdata($writer, 'firstname', $conn) . ' ' . getUserdata($writer, 'lastname', $conn); ?><br>(<?php echo $writer; ?>)</center>
                    </td>
                    <td>
                        <center><?php if ($lastreply != null) echo getUserdata($lastreply, 'firstname', $conn) . ' ' . getUserdata($lastreply, 'lastname', $conn) . '<br>(' . $lastreply . ')'; else echo '-'; ?></center>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <?php
            $id = $_GET['id'];
            $title = ""; $tags = ""; $article = ""; $attached = null; $hide = false; $type = "news"; $pinned = false;
            if (isset($_GET['id']) && isValidForumID($_GET['id'], $connForum)) {
                    $postID = $_GET['id'];
                    
                    $query = "SELECT * FROM `id_$postID` INNER JOIN `forum_properties` ON $postID = `forum_properties`.id";
                    $result = mysqli_query($connForum, $query);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $writer = $row['writer'];
                        $article = $row['message'];
                        $title = $row['title'];
                        $time = $row['timestamp'];
                        $hide = $row['isHidden'];
                        $pinned = $row['isPinned'];
                        $delete = $row['isDelete'];
                        $type = $row['category'];
                        $comment_id = $row['id'];

                        $article = str_replace('%deletebyadmin%', '<div class="alert alert-danger" role="alert">ข้อความนี้ถูกลบโดยผู้ดูแลระบบ</div>', str_replace('%deletebyuser%', '<div class="alert alert-warning" role="alert">ข้อความนี้ถูกลบโดยผู้โพสต์</div>', $article))
            ?>
        <div class="card mb-4">
            <?php if ($comment_id == 1) { ?>
            <div class="card-header text-white grey darken-4">
                <h4><?php echo $title . ' ' . generateForumTopic($type); ?> </h4>
            </div>
            <?php } ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3 mb-3">
                        <div class="card">
                            <div class="row">
                                <div class="col-5 col-md-12">
                                    <img src="<?php echo getProfilePicture($writer, $conn); ?>"
                                        alt="Profile of User <?php echo $writer; ?>" class="card-img-top">
                                </div>
                                <div class="col-7 col-md-12">
                                    <div class="card-body">
                                        <a href="../profile/<?php echo $writer; ?>">
                                            <center>
                                                <?php echo getUserdata($writer, 'firstname', $conn) . ' ' . getUserdata($writer, 'lastname', $conn); ?>
                                                <br>(<?php echo $writer; ?>)
                                            </center>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="card-text">
                            <p><?php echo $article; ?></p>
                            <hr>
                            <div style="color: #949494"><?php echo $time; ?>
                                <?php if (($writer == $_SESSION['id'] || isPermission('isForumEditor', $conn)) && !$delete) { ?>
                                <a href='#' class='text-danger' onclick='
                                    swal({title: "ลบความคิดเห็นนี้หรือไม่ ?",text: "หลังจากที่ลบแล้ว จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../forum/delete.php?method=<?php if ($writer == $_SESSION["id"]) echo "user"; else if (isPermission("isForumEditor", $conn)) echo "admin"; ?>&thread=<?php echo $postID; ?>&comment=<?php echo $row["id"]; ?>";}});'><i class='fas fa-trash-alt'></i></a> <?php } ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (isLogin()) { ?>
        <form method="POST" action="../forum/reply.php?threads=<?php echo $_GET['id']; ?>"
            enctype="multipart/form-data">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-3 mb-3 order-1 order-md-0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12 d-none d-md-block">
                                        <img src="<?php echo getProfilePicture($_SESSION['id'], $conn); ?>"
                                            alt="Profile of User <?php echo $_SESSION['id']; ?>" class="card-img-top">
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <button type="submit" class="btn btn-success btn-block" name="forum_reply"
                                            id="forum_reply" disabled><i
                                                class="fas fa-reply"></i> ตอบกลับ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 order-0 order-md-1">
                            <div class="card-text">
                                <div class="form-group mb-4 mt-3"><textarea class="summernote" id="article"
                                        name="article"></textarea></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
        <?php } ?>
        <?php } ?>
    </div>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>